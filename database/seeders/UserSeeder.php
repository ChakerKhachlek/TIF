<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'TIF Admin',
            'email' => 'imagination.factory.2022@gmail.com',
            'password' => Hash::make('ImaginationFactory@2022'),
        ]);
    }
}
