<!-- resources/views/search/result.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('検索結果') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800">
                    <!-- ここに検索結果を表示するコードを追加 -->
                  <div class="container">
    <h1>検索結果</h1>
    <h2>Clothes:</h2>
    @if ($clothes->count() > 0)
    <ul>
        @foreach ($clothes as $clothe)
        <li>{{ $clothe->name }}</li>
        <!-- 他の服の情報も表示 -->
        @endforeach
    </ul>
    @else
    <p>条件に合致する服が見つかりませんでした。</p>
    @endif

    <h2>Pants:</h2>
    @if ($pants->count() > 0)
    <ul>
        @foreach ($pants as $pant)
        <li>{{ $pant->name }}</li>
        <!-- 他のパンツの情報も表示 -->
        @endforeach
    </ul>
    @else
    <p>条件に合致するパンツが見つかりませんでした。</p>
    @endif
</div>

                 </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
