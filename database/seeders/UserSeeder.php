<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i = 0; $i < 50; $i++ ) {

            $newUser = new User(); //utente
            $newUser->name = $faker->name(); //nome
            $newUser->email = "team1@gmail.com"; //email
            $newUser->password = Hash::make("team1team1"); //password
            $newUser->save(); //invio i dati dal database
        }


        

    }
}
