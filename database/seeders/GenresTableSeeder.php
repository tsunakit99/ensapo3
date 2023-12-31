<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['name' => 'スウェット'],
            ['name' => 'ニット'],
            ['name' => 'ハーフパンツ'],
            ['name' => 'スカート'],
        ];

        // genres テーブルにデータを挿入
        DB::table('genres')->insert($genres);
    }
}
