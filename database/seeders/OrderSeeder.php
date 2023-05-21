<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order; //model
use App\Models\Restaurant;
use Faker\Generator as Faker; //faker
use Illuminate\Support\Facades\DB;

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
        $restaurant_ids = Restaurant::all()->pluck("id")->all();
        //we need to controll restaurant_id, because
        //one order has link with many dishes from only one, specific restaurant

        foreach ($restaurant_ids as $id) {
            //implement a foreach($rest_ids as $rest), each restaurant has it's own orders and related dishes
            //foreach restaurant, we need to create a for cicle of N orders

            $dish_ids = Dish::where('restaurant_id', $id)->pluck('id')->all();
            //we need to recal only the restaurant_id related dishes

            for ($i = 0; $i < 2; $i++) {
                //we create 2 order for each restaurant_id
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

                for ($i = 0; $i < 2; $i++) {
                    //we attach 2 dishes to order, related to each rest
                    // $newOrder->dishes()->attach($faker->randomElement($dish_ids));
                    DB::table('dish_order')->insert([
                        //we use DB:: facades to insert also related quantity
                        'dish_id' => $faker->randomElement($dish_ids),
                        'order_id' => $newOrder->id,
                        'quantity' => rand(1, 3),
                    ]);
                }
            }
        }
    }
}
