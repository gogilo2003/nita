<?php

namespace Database\Seeders;

use App\Models\Trade;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trades = collect([
            "T-EWM" => "Electrical Wireman",
            "T-PPF" => "Plumber Pipe Fitter",
            "T-BT" => "Beauty Therapy",
            "T-HD" => "Hairdressing",
            "T-FBP" => "Food and Beverage Production",
            "T-GRD" => "Graphic Design",
        ]);

        foreach ($trades as $key => $value) {
            $trade = new Trade();
            $trade->code = $key;
            $trade->name = $value;
            $trade->save();
        }
    }
}
