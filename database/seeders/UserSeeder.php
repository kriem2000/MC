<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;
use App\Models\SpecialityUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialities = Speciality::all();
        foreach($specialities as $speciality) {
            User::factory()->count(10)->create()->each(function($user) use ($speciality)
            {
                UserRole::create(['role_id' => 3, 'user_id' => $user->id]);
                SpecialityUser::create(['speciality_id'=> $speciality->id ,'user_id' => $user->id]);
            });
        }
    }
}
