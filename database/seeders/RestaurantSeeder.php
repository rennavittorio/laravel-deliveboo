<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $picsum_img = 'https://picsum.photos/200';

        $category_ids = Category::all()->pluck('id')->all();

        for($i = 0; $i < 50; $i++ ) {

            $restaurant = new Restaurant();

            $restaurant->name = $faker->name();
            $restaurant->img = $picsum_img;
            $restaurant->address = $faker->address();
            $restaurant->slug = Str::slug($restaurant->name . $restaurant->address);
            $restaurant->vat =  $faker->bothify('#######-###-#');
            $restaurant->user_id = 1;

            $restaurant->save();
        }
    }
}
