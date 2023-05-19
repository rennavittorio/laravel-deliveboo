<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order; //model
use Faker\Generator as Faker; //faker

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Ciclo
        for ($i = 0; $i < 5; $i++) {
            $newOrder = new Order(); //ordine
            $newOrder->date = $faker->dateTime(); //data
            $newOrder->status = $faker->numberBetween(0, 1); //stato
            $newOrder->first_name = $faker->firstName(); //nome del cliente
            $newOrder->last_name = $faker->lastName(); //cognome del cliente
            $newOrder->email = $faker->email(); //email del cliente
            $newOrder->phone = $faker->randomNumber(9, true); //telefono del cliente
            $newOrder->address = $faker->sentence(3); //indirizzo del cliente
            $newOrder->postal_code = $faker->randomNumber(5, true); //codice postale del cliente
            $newOrder->save(); //salvo i dati nel database
        }
    }
}
