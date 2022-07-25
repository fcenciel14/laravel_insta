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
            [
                'name' => 'Travel',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'name' => 'Food',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'name' => 'Music',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'name' => 'Movie',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'name' => 'Drive',
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'name' => 'Cafe',
                'created_at' => '2022/01/01 11:11:11',
            ],
        ]);
    }
}
