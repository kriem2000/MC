<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\OfferSeeder;
use Database\Seeders\PaymentSeeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\SpecialitySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            OfferSeeder::class,
            PaymentSeeder::class,
            RolesSeeder::class,
            SpecialitySeeder::class,
            UserSeeder::class,
        ]);
    }
}
