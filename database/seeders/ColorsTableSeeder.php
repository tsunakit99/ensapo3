<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['name' => '暖色'],
            ['name' => '寒色'],
            ['name' => '白'],
            ['name' => '黒'],
        ];

        // colors テーブルにデータを挿入
        DB::table('colors')->insert($colors);
    }
}
