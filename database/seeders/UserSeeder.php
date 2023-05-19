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

        $users_mail = ['team1@gmail.com', 'team2@gmail.com', 'team3@gmail.com', 'team4@gmail.com', 'team5@gmail.com'];

        for ($i = 0; $i < 5; $i++) {

            $newUser = new User(); //utente
            $newUser->name = "team1"; //nome
            $newUser->email = $users_mail[$i]; //ciclo mail
            $newUser->password = Hash::make("team1team1"); //password
            $newUser->save(); //invio i dati dal database

        }
    }
}
