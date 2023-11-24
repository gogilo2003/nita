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
            "T-BT" => "BEAUTY THERAPY",
            "T-CMA" => "CABINET MAKER",
            "T-CAJ" => "CARPENTER/JOINER",
            "T-ICT" => "COMPUTER OPERATOR",
            "T-DM" => "DRESS MAKER",
            "T-ELF" => "ELECTRICAL FITTER",
            "T-EWM" => "ELECTRICAL WIREMAN",
            "T-ELM" => "ELECTRONIC MECHANIC",
            "T-EMR" => "ELECTRIC MOTOR REWINDING",
            "T-FTL" => "FLOOR TILING",
            "T-FBP" => "FOOD AND BEVERAGE PRODUCTION",
            "T-FBS" => "FOOD AND BEVERAGE SERVICES",
            "T-FTG" => "GENERAL FITTER",
            "T-GRD" => "GRAPHIC DESIGN",
            "T-HD" => "HAIR DRESSING",
            "T-HKA" => "HOUSE KEEPER",
            "T-LWOR" => "LEATHER WORK",
            "T-LVM" => "LIGHT VEHICLE MECHANICS",
            "T-KNIT" => "MACHINE KNITTER",
            "T-MAS" => "MASON",
            "T-MVE" => "MOTOR VEHICLE ELECTRICIAN",
            "T-MOU" => "MOULDER",
            "T-PAD" => "PAINTER/DECORATOR",
            "T-PAB" => "PANEL BEATER",
            "T-PGP" => "PHOTOGRAPHY",
            "T-PLM" => "PLANT MECHANIC",
            "T-PPF" => "PLUMBER PIPE FITTER",
            "T-POL" => "POLISHER",
            "T-RAC" => "REFRIGERATION AND AIRCONDITIONING",
            "T-SCF" => "SCAFFOLD FITTER",
            "T-SMT" => "SHEET METAL WORK",
            "T-SMAK" => "SHOE MAKER",
            "T-SWRI" => "SIGN WRITER",
            "T-SPV" => "SOLAR PHOTOVOLTAIC",
            "T-SPAI" => "SPRAY PAINTER",
            "T-TAIL" => "TAILORING",
            "T-TURN" => "TURNER",
            "T-TDE" => "TIE AND DYE",
            "T-UPHO" => "UPHOLSTERER",
            "T-VGP" => "VIDEOGRAPHY",
            "T-AWEL" => "WELDER (ELECTRIC)",
            "T-GWEL" => "WELDER (GAS)",
            "T-WCAR" => "WOOD CARVER",
            "T-WOM" => "WOOD MACHINIST",
            "T-MCM" => "MOTOR CYCLE MECHANIC",
            "P-SPR" => "SCREEN PRINTING",
            "T-BAP" => "BAKERY AND PASTRY",
            "T-BP" => "BAKING AND PASTERY",
        ]);

        foreach ($trades as $key => $value) {
            $trade = new Trade();
            $trade->code = $key;
            $trade->name = $value;
            $trade->save();
        }
    }
}
