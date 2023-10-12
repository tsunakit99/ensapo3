<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clothes;
use App\Models\Colors;
use App\Models\Genres;

class ClothesController extends Controller
{
    public function index()
    {
        $clothes = Clothes::getAllOrderByUpdated_at();
  return response()->view('clothes.index',compact('clothes'));
    }

    public function create()
    {
        $colors = Colors::all(); // カラー情報を取得
        $genres = Genres::all(); // ジャンル情報を取得

        return view('clothes.create', compact('colors', 'genres'));
    }
    public function store(Request $request)
    {

    // バリデーションルール
    $rules = [
        'name' => 'required',
        'color_id' => 'required|in:1,2,3,4', // 1: 暖色, 2: 寒色, 3: 白, 4: 黒
        'genre_id' => 'required|in:1,2,3,4', // 1: アウター, 2: ロンT, 3: Tシャツ, 4: ズボン
        'image' => 'image|nullable',
    ];

    // フォームデータから Clothes モデルを作成
    $clothes = new Clothes();
    $clothes->name = $request->input('name');
    $clothes->color_id = $request->input('color_id');
    $clothes->genre_id = $request->input('genre_id');

    // 画像のアップロード
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('clothes_images', 'public');
        $clothes->image = $imagePath;
    }

    // データベースに保存
    $clothes->save();

    // リダイレクト
    return redirect()->route('clothes.index');
}
}