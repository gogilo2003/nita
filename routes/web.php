<?php

use App\Models\Candidate;
use App\Models\Trade;
use Inertia\Inertia;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $trade = request()->input('trade');
    $search = request()->input('search');
    $trades = Trade::all()->map(fn ($tr) => [
        "id" => $tr->id,
        "code" => $tr->code,
        "name" => $tr->name,
    ]);

    $candidates = Candidate::with('trade')->orderBy('trade_id', 'ASC')
        ->when($trade, function ($query) use ($trade) {
            $query->where('trade_id', $trade);
        })
        ->when($search, function ($query) use ($search) {
            $str = sprintf("%%%s%%", $search);
            $query->where('candidateName', 'LIKE', $str);
        })
        ->get();

    if (request()->input('download')) {
        $html = view('pdf.download', ['candidates' => $candidates])->render();

        $pdf = \Illuminate\Support\Facades\App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html);
        return $pdf->inline();
    }

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'candidates' => $candidates,
        'trades' => $trades,
        'trade' => $trade,
        'search' => $search,
    ]);
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
