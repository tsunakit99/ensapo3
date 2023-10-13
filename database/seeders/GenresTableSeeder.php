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
            ['name' => 'アウター'],
            ['name' => 'ロンT'],
            ['name' => 'Tシャ�?'],
            ['name' => 'ズボン'],
        ];

        // genres �?ーブルに�?ータを挿入
        DB::table('genres')->insert($genres);
    }
}
