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
            ],
            [
                'name' => 'Sara',
                'email' => 'sara@gmail.com',
                'password' => Hash::make('sara')
            ],
            [
                'name' => 'Chiara',
                'email' => 'chiara@gmail.com',
                'password' => Hash::make('chiara')
            ],
            [
                'name' => 'Lisa',
                'email' => 'lisa@gmail.com',
                'password' => Hash::make('lisa')
            ],
            [
                'name' => 'Angela',
                'email' => 'angela@gmail.com',
                'password' => Hash::make('angela')
            ],
            [
                'name' => 'Maria',
                'email' => 'maria@gmail.com',
                'password' => Hash::make('maria')
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
