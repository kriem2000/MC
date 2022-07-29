<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;
class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        Payment::create([
            "name" => "ادفع لي"
        ]);

        Payment::create([
            "name" => "موبي كاش"
        ]);

        Payment::create([
            "name" => "فيزا"
        ]);
    }
}
