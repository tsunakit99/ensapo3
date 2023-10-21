<!-- create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('服登録') }}
        </h2>
    </x-slot>


    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800"> <!--enctype="multipart/form-data": ファイルのアップロードが含まれている場合、フォームがファイルデータを含むことをサーバーに伝えるために使用-->
                    <form method="POST" action="{{ route('clothes.store') }}" enctype="multipart/form-data"> <!--このフォームがサブミットされたときにClothesControllerのstoreが実行-->
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="text-gray-700 dark:text-gray-300">服の名前:</label>
                            <input type="text" name="name" id="name" class="form-input" placeholder="服の名前を入力してください" required>
                        </div>

                        <div class="mb-4">
                            <label for="color_id" class="text-gray-700 dark:text-gray-300">服の色:</label>
                            <select name="color_id" id="color_id" class="form-select" required>
                                <option value="1">暖色</option>
                                <option value="2">寒色</option>
                                <option value="3">白</option>
                                <option value="4">黒</option>
                                <option value="5">緑</option>
                                <option value="6">紫</option>
                                <option value="7">グレー</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="genre_id" class="text-gray-700 dark:text-gray-300">服のジャンル:</label>
                            <select name="genre_id" id="genre_id" class="form-select" required>
                                <option value="1">アウター</option>
                                <option value="2">ロンT</option>
                                <option value="3">Tシャツ</option>
                                <option value="4">ズボン</option>
                                <option value="5">スウェット</option>
                                <option value="6">ニット</option>
                                <option value="7">ハーフパンツ</option>
                                <option value="8">スカート</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="text-gray-700 dark:text-gray-300">服の画像:</label>
                            <input type="file" name="image" id="image" class="form-input" placeholder="画像をアップロードしてください" required>
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <x-primary-button>
                                {{ __('登録') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>