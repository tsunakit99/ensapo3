<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clothes;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     // リクエストから気温を取得
    $temperature = $request->input('temperature');

    // 気温に応じてgenre_idを設定
    $genre_id = 1; // デフォルト値

    if ($temperature >= 26) {
        $genre_id = 2;
    } elseif ($temperature >= 16 && $temperature <= 25) {
        $genre_id = 3;
    }

    // Clothesテーブルから条件に合った服を取得
    $clothes = Clothes::where('genre_id', $genre_id)->get();

    // Pantsテーブルから条件に合ったパンツを取得
    $pants = Clothes::where('genre_id', 4)->get();

    // 検索結果をビューに渡す
    return view('search.result', compact('clothes', 'pants'));
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
