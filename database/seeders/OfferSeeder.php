<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Offer;
class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      Offer::create([
           "name" => "Standard Package",
            "price" => "150",
            "description" => " ",
            "consultation_number" => "15",

        ]);

       Offer::create([
            "name" => "Silver Package",
            "price" => "250",
            "description" => " ",
            "consultation_number" => "25",

        ]);

        Offer::create([
            "name" => "Golden Package",
            "price" => "350",
            "description" => "  ",
            "consultation_number" => "35",
            ]);
    }
}
