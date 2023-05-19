<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Seeder
        $this->call([
            UserSeeder::class, //seeder gli utenti
            RestaurantSeeder::class, //seeder dei restaurants
            CategorySeeder::class, //seeder delle categories
            DishSeeder::class, //seeder dei piatti
            OrderSeeder::class, //seeder degli ordini
        ]);
    }
}
