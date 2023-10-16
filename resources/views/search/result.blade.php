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
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>