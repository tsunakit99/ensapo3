<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('検索結果') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800">
                    <p>検索条件: {{ $temperature }} 度</p>
                    <table class="w-full">
                        <tbody>
                            @if ($clothes)
                            <tr>
                                <td class="py-2 px-3 w-1/4">
                                    <img src="{{ Storage::url($clothes->image) }}" alt="Clothe Image" class="w-32 h-32 object-cover">
                                </td>
                                <td class="py-2 px-3 w-3/4">
                                    <h2 class="font-bold text-lg text-gray-dark dark:text-gray-200">{{$clothes->name}}</h2>
                                </td>
                            </tr>
                            @else
                            <p>条件に合致する服が見つかりませんでした。</p>
                            @endif

                            @if ($pants)
                            <tr>
                                <td class="py-2 px-3 w-1/4">
                                    <img src="{{ Storage::url($pants->image) }}" alt="Pant Image" class="w-32 h-32 object-cover">
                                </td>
                                <td class="py-2 px-3 w-3/4">
                                    <h2 class="font-bold text-lg text-gray-dark dark:text-gray-200">{{$pants->name}}</h2>
                                </td>
                            </tr>
                            @else
                            <p>条件に合致するパンツが見つかりませんでした。</p>
                            @endif
                        </tbody>
                    </table>
                    <div class="flex items-center justify-end mt-4">
                        <a onclick="window.location.reload(true);">
                            <i class="fa fa-refresh" aria-hidden="true">
                             <x-secondary-button class="ml-3">
                            {{ __('検索結果を更新') }}
                            </x-primary-button>
                            </i>
                        </a>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{route('search.input')}}">
                            <x-secondary-button class="ml-3">
                            {{ __('検索画面へ戻る') }}
                            </x-primary-button>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>