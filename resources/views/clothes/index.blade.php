<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Clothes Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800">
                    <table class="text-center w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-gray-lightest dark:bg-gray-darkest font-bold uppercase text-lg text-gray-dark dark:text-gray-200 border-b border-grey-light dark:border-grey-dark">服の名前</th>
                                <th class="py-4 px-6 bg-gray-lightest dark:bg-gray-darkest font-bold uppercase text-lg text-gray-dark dark:text-gray-200 border-b border-grey-light dark:border-grey-dark">色</th>
                                <th class="py-4 px-6 bg-gray-lightest dark:bg-gray-darkest font-bold uppercase text-lg text-gray-dark dark:text-gray-200 border-b border-grey-light dark:border-grey-dark"white-space: nowrap>ジャンル</th>
                                <th class="py-4 px-6 bg-gray-lightest dark:bg-gray-darkest font-bold uppercase text-lg text-gray-dark dark:text-gray-200 border-b border-grey-light dark:border-grey-dark">画像</th>
                                <th class="py-4 px-6 bg-gray-lightest dark:bg-gray-darkest font-bold uppercase text-lg text-gray-dark dark:text-gray-200 border-b border-grey-light dark:border-grey-dark">更新日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clothes as $clothe)
                            <tr class="hover:bg-gray-lighter">
                                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600"white-space: nowrap>{{$clothe->name}}</td>
                                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600"white-space: nowrap>{{$clothe->color->name}}</td>
                                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600"white-space: nowrap>{{$clothe->genre->name}}</td>
                                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                                    <!--<img src="{{ asset('storage/' . $clothe->image) }}" alt="Clothe Image" class="w-16 h-16">-->
                                     <img src="{{ Storage::url($clothe->image) }}" style="display: block; margin: auto;" width="25%">
                                </td>
                                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">{{$clothe->updated_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
