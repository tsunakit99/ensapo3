<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clothes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ClothesController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // 現在のログインユーザーを取得
        $clothes = $user->clothes; // ユーザーが登録した服の一覧
        return response()->view('clothes.index', compact('clothes'));
    }

    public function create()
    {
        return response()->view('clothes.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'color_id' => 'required|in:1,2,3,4,5,6,7', // 1: 暖色, 2: 寒色, 3: 白, 4: 黒, 5: 緑, 6: 紫, 7: グレー
            'genre_id' => 'required|in:1,2,3,4,5,6,7,8', // 1: アウター, 2: ロンT, 3: Tシャツ, 4: ズボン, 5: スウェット, 6: ニット, 7: ハーフパンツ, 8: スカート
            'image' => ['image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('clothes.create')
                ->withInput()
                ->withErrors($validator);
        }

        $image = $request->file('image');
        // 画像がアップロードされていれば、storageに保存
        if ($request->hasFile('image')) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
        }

        $clothes = $request->all();
        $user = Auth::user()->id;        // ログインユーザーのIDを取得
        $clothes['user_id'] = $user;
        $clothes['image'] = $path[1];
        Clothes::create($clothes);

        /*$clothes_id = Clothes::insertGetId([
            'name' => $data['name'],
            'color_id' => $data['color_id'],
            'genre_id' => $data['genre_id'],
            'image' => $path[1],
            'user_id' => $user_id, // ユーザーIDを設定
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);*/

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
        $clothes = Clothes::find($id);
        return response()->view('clothes.edit', compact('clothes'));
    }

    public function update(Request $request, $id)
    {
        //データ更新処理
        $result = Clothes::find($id)->update($request->all());
        return redirect()->route('clothes.index');
    }
}
