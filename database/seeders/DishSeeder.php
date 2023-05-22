<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish; //model
use App\Models\Restaurant; //model
use Faker\Generator as Faker; //faker

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurant_ids = Restaurant::all()->pluck("id")->all();

        for ($i = 0; $i < 50; $i++) {
            $newDish = new Dish();

            $newDish->name = 'piatto' . $i;
            $newDish->img = "../storage/image-not-found.png";
            $newDish->description = $faker->sentence(5);
            $newDish->price = $faker->randomFloat(2, 20, 30);
            $newDish->is_visible = $faker->numberBetween(0, 1);

            $newDish->restaurant_id = $faker->randomElement($restaurant_ids);
            //assign a rest_id to the new dish

            $newDish->save();
        }
    }
}
