<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'image' => 'sample1.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae unde, culpa quas dolores sint sequi.',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'user_id' => 1,
                'image' => 'sample2.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae unde, culpa quas dolores sint sequi.',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'user_id' => 1,
                'image' => 'sample5.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae unde, culpa quas dolores sint sequi.',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'user_id' => 1,
                'image' => 'sample6.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae unde, culpa quas dolores sint sequi.',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'user_id' => 2,
                'image' => 'sample3.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae unde, culpa quas dolores sint sequi.',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'user_id' => 2,
                'image' => 'sample4.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae unde, culpa quas dolores sint sequi.',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'user_id' => 3,
                'image' => 'sample5.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae unde, culpa quas dolores sint sequi.',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'user_id' => 3,
                'image' => 'sample6.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae unde, culpa quas dolores sint sequi.',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'user_id' => 4,
                'image' => 'sample7.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae unde, culpa quas dolores sint sequi.',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'user_id' => 4,
                'image' => 'sample1.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae unde, culpa quas dolores sint sequi.',
                'created_at' => '2022/01/01 11:11:11',
            ],
        ]);
    }
}
