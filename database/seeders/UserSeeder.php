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

        //create 1 user for each fake-email, psw would be team+key number
        foreach ($users_mail as $key => $mail) {
            $newUser = new User(); //utente
            $newUser->name = "team" . ($key + 1); //nome
            $newUser->email = $mail; //ciclo mail
            $newUser->password = Hash::make("team" . ($key + 1) . "team" . ($key + 1)); //password
            $newUser->save(); //invio i dati dal database
        }
    }
}
