<!-- resources/views/clothes/edit.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('編集') }}
    </h2>
  </x-slot>

  <div class="py-12 flex justify-center">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
          <form class="mb-6" action="{{ route('clothes.update', $clothes->id) }}" method="POST" enctype="multipart/form-data">

            @method('put')
            @csrf
            <div class="mb-4">
              <label for="name" class="text-gray-700 dark:text-gray-300">服の名前:</label>
              <input type="text" name="name" id="name" class="form-input" placeholder="服の名前を入力してください" required>
            </div>
            <div class="flex items-center justify-end mt-4">
              <a href="{{ url()->previous() }}">
                <x-secondary-button class="ml-3">
                  {{ __('戻る') }}
                  </x-primary-button>
              </a>
              <x-primary-button class="ml-3">
                {{ __('更新') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>