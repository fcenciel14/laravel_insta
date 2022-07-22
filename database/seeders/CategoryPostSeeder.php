<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_post')->insert([
            [
                'post_id' => '1',
                'category_id' => '1'
            ],
            [
                'post_id' => '1',
                'category_id' => '2'
            ],
            [
                'post_id' => '1',
                'category_id' => '3'
            ],
            [
                'post_id' => '2',
                'category_id' => '1'
            ],
            [
                'post_id' => '2',
                'category_id' => '2'
            ],
            [
                'post_id' => '2',
                'category_id' => '3'
            ],
            [
                'post_id' => '3',
                'category_id' => '1'
            ],
            [
                'post_id' => '3',
                'category_id' => '2'
            ],
            [
                'post_id' => '3',
                'category_id' => '4'
            ],
            [
                'post_id' => '4',
                'category_id' => '4'
            ],
            [
                'post_id' => '4',
                'category_id' => '2'
            ],
            [
                'post_id' => '4',
                'category_id' => '3'
            ],
            [
                'post_id' => '5',
                'category_id' => '5'
            ],
            [
                'post_id' => '5',
                'category_id' => '3'
            ],
            [
                'post_id' => '5',
                'category_id' => '6'
            ],
            [
                'post_id' => '6',
                'category_id' => '6'
            ],
            [
                'post_id' => '6',
                'category_id' => '2'
            ],
            [
                'post_id' => '6',
                'category_id' => '3'
            ],
            [
                'post_id' => '7',
                'category_id' => '1'
            ],
            [
                'post_id' => '7',
                'category_id' => '2'
            ],
            [
                'post_id' => '7',
                'category_id' => '3'
            ],
            [
                'post_id' => '8',
                'category_id' => '2'
            ],
            [
                'post_id' => '8',
                'category_id' => '4'
            ],
            [
                'post_id' => '8',
                'category_id' => '5'
            ],
            [
                'post_id' => '9',
                'category_id' => '1'
            ],
            [
                'post_id' => '9',
                'category_id' => '3'
            ],
            [
                'post_id' => '9',
                'category_id' => '6'
            ],
            [
                'post_id' => '10',
                'category_id' => '1'
            ],
            [
                'post_id' => '10',
                'category_id' => '2'
            ],
            [
                'post_id' => '10',
                'category_id' => '3'
            ],
        ]);
    }
}
