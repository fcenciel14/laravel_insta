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
            [
                'name' => 'haru fukuda',
                'email' => 'test@test.com',
                'avatar' => 'sample1.jpg',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'test1',
                'email' => 'test1@test.com',
                'avatar' => 'sample2.jpg',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'test2',
                'email' => 'test2@test.com',
                'avatar' => 'sample3.jpg',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'test3',
                'email' => 'test3@test.com',
                'avatar' => 'sample4.jpg',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
