<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $temperature = $request->input('temperature');
        $clothesColor = $request->input('clothes_color');
        $pantsColor = $request->input('pants_color');

        $user = Auth::user();
        $clothesQuery = $user->clothes(); // ユーザーが登録した服に関するクエリ
        $pantsQuery = $user->clothes(); // ユーザーが登録したパンツに関するクエリ

        if ($temperature >= 25) {
            $clothesQuery->where('genre_id', 3);
            $pantsQuery->whereIn('genre_id', [4, 7, 8]);
        } elseif ($temperature >= 18 && $temperature <= 24) {
            $clothesQuery->where('genre_id', 2);
            $pantsQuery->whereIn('genre_id', [4, 8]);
        } elseif ($temperature >= 13 && $temperature <= 17) {
            $clothesQuery->whereIn('genre_id', [5, 6]);
            $pantsQuery->whereIn('genre_id', [4, 8]);
        } elseif ($temperature <= 12) {
            $clothesQuery->where('genre_id', 1);
            $pantsQuery->where('genre_id', 4);
        }

        if (!empty($clothesColor)) {
            $clothesQuery->where('color_id', $clothesColor);
        }

        if (!empty($pantsColor)) {
            $pantsQuery->where('color_id', $pantsColor);
        }

        $pants = $pantsQuery->inRandomOrder()->first();
        if (!empty($pants)) {
            if ($pants->color_id == 1) {
                $clothesQuery->whereNotIn('color_id', [1, 6]);
            } elseif ($pants->color_id == 2) {
                $clothesQuery->whereNot('color_id', 2);
            } elseif ($pants->color_id == 3) {
                $clothesQuery->whereNot('color_id', 3);
            } elseif ($pants->color_id == 5) {
                $clothesQuery->whereNotIn('color_id', [5, 6]);
            } elseif ($pants->color_id == 6) {
                $clothesQuery->whereNotIn('color_id', [5, 6]);
            } elseif ($pants->color_id == 7) {
                $clothesQuery->whereNot('color_id', 7);
            }
        }

        $clothes = $clothesQuery->inRandomOrder()->first();

        return response()->view('search.result', compact('clothes', 'pants', 'temperature', 'clothesColor', 'pantsColor'));
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
