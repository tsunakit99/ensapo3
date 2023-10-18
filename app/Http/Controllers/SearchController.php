<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clothes;
use App\Models\User;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /* リクエストから気温を取得
        $temperature = $request->input('temperature');

        // 気温に応じてgenre_idを設定
        $genre_id = 4; // デフォルト値

        if ($temperature >= 25) {
            $genre_id = 3; // 25度以上ならジャンル3
        } elseif ($temperature >= 16 && $temperature <= 24) {
            $genre_id = 2; // 16度から24度の間ならジャンル2
        } elseif ($temperature <= 15) {
            $genre_id = 1; // 15度以下ならジャンル1
        }

        // Clothesテーブルから条件に合った服を取得
        // コントローラ内でのランダム選択
        $clothes = Clothes::where('genre_id', $genre_id)->inRandomOrder()->first(); // ランダムに1つの服を取得
        $pants = Clothes::where('genre_id', 4)->inRandomOrder()->first(); // ランダムに1つのパンツを取得



        // 検索結果をビューに渡す
        return view('search.result', compact('clothes', 'pants', 'temperature')); */

        $user = auth()->user();

        $temperature = $request->input('temperature');
        $clothesColor = $request->input('clothes_color');
        $pantsColor = $request->input('pants_color');

        $clothesQuery = $user->clothes(); // ユーザーが登録した服に関するクエリ
        $pantsQuery = $user->clothes(); // ユーザーが登録したパンツに関するクエリ

        if ($temperature >= 25) {
            $clothesQuery->where('genre_id', 3);
            $pantsQuery->where('genre_id', 4);
        } elseif ($temperature >= 16 && $temperature <= 24) {
            $clothesQuery->where('genre_id', 2);
            $pantsQuery->where('genre_id', 4);
        } elseif ($temperature <= 15) {
            $clothesQuery->where('genre_id', 1);
            $pantsQuery->where('genre_id', 4);
        }

        if (!empty($clothesColor)) {
            $clothesQuery->where('color_id', $clothesColor);
        }

        if (!empty($pantsColor)) {
            $pantsQuery->where('color_id', $pantsColor);
        }

        $clothes = $clothesQuery->inRandomOrder()->first();
        $pants = $pantsQuery->inRandomOrder()->first();

        return view('search.result', compact('clothes', 'pants', 'temperature', 'clothesColor', 'pantsColor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('search.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
