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

            UserSeeder::class,
            CategorySeeder::class,
            //first users and categs, rest need both
            RestaurantSeeder::class,

            DishSeeder::class,
            OrderSeeder::class,
            //order after dish, in order we seed the pivot table
        ]);
    }
}
