<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clothes;
use App\Models\Colors;
use App\Models\Genres;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Facade\Storage;


class ClothesController extends Controller
{
    public function index()
    {
        /*$user = auth()->user();
        $clothes = $user->clothes; // ユーザーが登録した服の一覧
        $clothes = Clothes::getAllOrderByUpdated_at();*/

        $user = Auth::user(); // 現在のログインユーザーを取得
        $clothes = $user->clothes; // ユーザーが登録した服の一覧
        return response()->view('clothes.index', compact('clothes'));
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
            'image' => ['image', 'mimes:jpeg,png,jpg,gif'],
        ];

        // フォームデータから Clothes モデルを作成
        $clothes = new Clothes();
        $clothes->name = $request->input('name');
        $clothes->color_id = $request->input('color_id');
        $clothes->genre_id = $request->input('genre_id');

        // 画像のアップロード
        /* if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('clothes_images', 'public');
        $clothes->image = $imagePath;
    }*/
        $data = $request->all();
        $image = $request->file('image');
        // 画像がアップロードされていれば、storageに保存
        if ($request->hasFile('image')) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
        }

        $user_id = auth()->user()->id; // ログインユーザーのIDを取得

        $clothes_id = Clothes::insertGetId([
            'name' => $data['name'],
            'color_id' => $data['color_id'],
            'genre_id' => $data['genre_id'],
            'image' => $path[1],
            'user_id' => $user_id, // ユーザーIDを設定
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        // データベースに保存
        // $clothes->save();

        // リダイレクト
        return redirect()->route('clothes.index');
    }

    public function destroy($id)
    {
        $result = Clothes::find($id)->delete();
        return redirect()->route('clothes.index');
    }

    public function edit($id)
    {
        $clothe = Clothes::find($id);
        return response()->view('clothes.edit', compact('clothe'));
    }

    public function update(Request $request, $id)
    {
        // 指定した ID の服を取得
        $clothes = Clothes::find($id);

        // 服の情報を更新
        $clothes->name = $request->input('name');
        $clothes->color_id = $request->input('color_id');
        $clothes->genre_id = $request->input('genre_id');

        // 画像の更新など、必要なら他の属性も更新

        // 服を保存
        $clothes->save();

        // 更新後のビューを返すか、リダイレクトする
        return redirect()->route('clothes.index');
    }
}
