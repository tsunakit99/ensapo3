<!-- resources/views/search/input.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('コーデ検索') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800">
          <form class="mb-6" action="{{ route('search.result') }}" method="GET">
            @csrf

            <div class="mb-4">
              <label for="temperature" class="text-gray-700 dark:text-gray-300">気温：</label>
              <input type="number" name="temperature" id="temperature" class="form-input" placeholder="気温を入力してください" min="-10" max="40" required>
            </div>

            <div class="mb-4">
              <label for="clothes_color" class="text-gray-700 dark:text-gray-300">服の色(任意)：</label>
              <select name="clothes_color" id="clothes_color" class="form-select">
                <option value="">-- 服の色を選択 --</option>
                <option value="1">暖色</option>
                <option value="2">寒色</option>
                <option value="3">白</option>
                <option value="4">黒</option>
              </select>
            </div>

            <div class="mb-4">
              <label for="pants_color" class="text-gray-700 dark:text-gray-300">パンツの色(任意)：</label>
              <select name="pants_color" id="pants_color" class="form-select">
                <option value="">-- パンツの色を選択 --</option>
                <option value="1">暖色</option>
                <option value="2">寒色</option>
                <option value="3">白</option>
                <option value="4">黒</option>
              </select>
            </div>

            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-3">
                {{ __('検索') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>