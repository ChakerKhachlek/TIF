<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Coffe',
            'category_img_link'=>'https://cdn-icons.flaticon.com/png/512/3308/premium/3308395.png?token=exp=1656479521~hmac=730daee32a4e1f40c05663df678b3d7d',
            'display_order' => 1
        ]);

        DB::table('categories')->insert([
            'name' => 'Cold Drink',
            'category_img_link'=>'https://cdn-icons.flaticon.com/png/512/3368/premium/3368896.png?token=exp=1656479536~hmac=be6d110639138c0ec57746543c031729',
            'display_order' => 2
        ]);

    }
}
