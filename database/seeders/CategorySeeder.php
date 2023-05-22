<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = ['Italiano', 'Cinese', 'Giapponese', 'Indiano', 'Messicano', 'Internazionale', 'Pesce', 'Carne', 'Pizza'];

        foreach($categories as $category_name) {

            $new_category = new category();
            $new_category->name = $category_name;
            $new_category->save();
        }
    }
}
