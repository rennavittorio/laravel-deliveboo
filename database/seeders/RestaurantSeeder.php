<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Category;
use App\Models\User;
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

        $user_ids = User::all()->pluck('id')->all();

        foreach ($user_ids as $user) {
            $restaurant = new Restaurant();

            $restaurant->name = $faker->name();
            $restaurant->img = $picsum_img;
            $restaurant->address = $faker->address();
            $restaurant->slug = Str::slug($restaurant->name . $restaurant->address);
            $restaurant->vat =  $faker->bothify('#######-###-#');
            $restaurant->user_id = $user;

            $restaurant->save();

            $restaurant->categories()->attach($faker->randomElements($category_ids, rand(1, 2)));
            //pivot table seeding - attach 1/2 categories to restaurant
        }
    }
}
