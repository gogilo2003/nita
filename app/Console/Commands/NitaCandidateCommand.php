<?php

namespace App\Console\Commands;

use App\Models\Candidate;
use App\Models\Trade;
use DOMXPath;
use DOMDocument;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class NitaCandidateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nita:candidates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $candidates = array();

        $dom = new DOMDocument();

        $html = \Illuminate\Support\Facades\Storage::get('public/data.html');

        @$dom->loadHTML($html);

        $xpath = new DOMXPath($dom);

        $nodes = $xpath->query('//table/tbody/tr');

        $headers = collect([
            "Photo",
            "CANDIDATE NAME",
            "ID Number",
            "Series",
            "Trade",
            "Grade",
            "Testing Centre",
            "Status",
            "Uploaded by",
        ])->map(fn ($item) => Str::camel(Str::lower($item)))->toArray();

        foreach ($nodes as $node) {
            // $row = array();
            $candidate = new Candidate();

            foreach ($xpath->query('.//td', $node) as $key => $cell) {
                if ($key == 1) {
                    $img = $xpath->query('.//img', $cell)[0];
                    $candidate->photo = 'https://portal.nita.go.ke/booking/' . $img->getAttribute('src');
                }
                if ($key == 2) {
                    $candidate->candidateName = $cell->textContent;
                }
                if ($key == 3) {
                    $candidate->idNumber = $cell->textContent;
                }
                if ($key == 4) {
                    $candidate->series = $cell->textContent;
                }
                if ($key == 5) {
                    $this->info($cell->textContent);
                    $trade = Trade::where('code', $cell->textContent)->first();
                    $candidate->trade_id = $trade->id;
                }
                if ($key == 6) {
                    $candidate->grade = $cell->textContent;
                }
                if ($key == 7) {
                    $candidate->testingCentre = $cell->textContent;
                }
                if ($key == 8) {
                    $candidate->status = $cell->textContent;
                }
                if ($key == 9) {
                    $candidate->uploadedBy = $cell->textContent;
                }

                // if ($key == 5) {
                //     if ($key == 1) {
                //         $img = $xpath->query('.//img', $cell)[0];
                //         array_push($row, $img->getAttribute('src'));
                //     } else {
                //         array_push($row, $cell->textContent);
                //     }
                // }
            }
            $candidate->save();
            // array_push($candidates, $row);
        }
        // $candidates = collect($candidates)->unique()->toArray();
        // $this->table($headers, $candidates);
        // $this->comment(implode(", ", $headers));
        $this->comment('Candidates added to database');
    }
}
