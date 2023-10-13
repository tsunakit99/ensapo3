<!-- create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Clothes Registration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
                    <form method="POST" action="{{ route('clothes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <label for="name">服の名前:</label>
                        <input type="text" name="name" id="name">
                        <label for="color_id">服の色:</label>
                        <select name="color_id" id="color_id">
                            <option value="1">暖色</option>
                            <option value="2">寒色</option>
                            <option value="3">白</option>
                            <option value="4">黒</option>
                        </select>
                        <label for="genre_id">服のジャンル:</label>
                        <select name="genre_id" id="genre_id">
                            <option value="1">アウター</option>
                            <option value="2">ロンT</option>
                            <option value="3">Tシャツ</option>
                            <option value="4">ズボン</option>
                        </select>
                        <label for="image">服の画像:</label>
                        <input type="file" name="image" id="image">
                        <!--<button type="submit">登録</button>-->
                        <div class="flex items-center justify-end mt-4">
                           <x-primary-button class="ml-3">
                            {{ __('登録') }}
                           </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

