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
        //Utenti
        $users = [
            [
                'name' => 'Francesco',
                'email' => 'francesco@gmail.com',
                'password' => Hash::make('francesco')
            ],
            [
                'name' => 'Vittorio',
                'email' => 'vittorio@gmail.com',
                'password' => Hash::make('vittorio')
            ],
            [
                'name' => 'Lapo',
                'email' => 'lapo@gmail.com',
                'password' => Hash::make('lapo')
            ],
            [
                'name' => 'Bernardo',
                'email' => 'bernardo@gmail.com',
                'password' => Hash::make('bernardo')
            ],
            [
                'name' => 'Stefano',
                'email' => 'stefano@gmail.com',
                'password' => Hash::make('stefano')
            ]
        ];
        //Ciclo
        foreach ($users as $user) {
            $newUser = new User(); //nuovo utente
            $newUser->name = $user['name']; //nome dell'utente
            $newUser->email = $user['email']; //email dell'utente
            $newUser->password = $user['password']; //password dell'utente
            $newUser->save(); //invio i dati al database
        }
    }
}
