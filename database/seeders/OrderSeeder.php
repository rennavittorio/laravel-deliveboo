<?php

namespace Database\Seeders;

use App\Models\Dish;
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
    public function run(Faker $faker)
    {

        //ATTENTION HERE
        $dish_ids = Dish::where('restaurant_id', '1')->pluck('id')->all();
        //we need to controll restaurant_id, because
        //one order has link with many dishes from only one, specific restaurant

        //TODO
        //implement a foreach($rest_ids as $rest), each restaurant has it's own orders and related dishes
        //foreach restaurant, we need to create a for cicle of N orders

        for ($i = 0; $i < 5; $i++) {
            $newOrder = new Order();

            $newOrder->total = $faker->randomFloat(2, 5, 100); //decimals, min, max
            $newOrder->status = $faker->numberBetween(0, 1); //payment status
            $newOrder->first_name = $faker->firstName();
            $newOrder->last_name = $faker->lastName();
            $newOrder->email = $faker->email();
            $newOrder->phone = $faker->randomNumber(9, true);
            $newOrder->address = $faker->sentence(3);
            $newOrder->postal_code = $faker->randomNumber(5, true);

            $newOrder->save();

            $newOrder->dishes()->attach($faker->randomElements($dish_ids, 2));
            //attach to each order from 1 to 3 dishes

            //ATTENTION
            //somewhere here we have to attach the quantity

        }
    }
}
