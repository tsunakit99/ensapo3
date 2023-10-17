<x-app-layout>
    <!DOCTYPE html>
<html lang="ja">
<head>
    <!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>プロフィール</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        body {
            background-color: #f0f0f0;
        }
        h2 {
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .bg-white {
            background-color: #fff;
        }
        .dark:bg-gray-800 {
            background-color: #333;
            color: #fff;
        }
        .text-gray-800 {
            color: #333;
        }
        .dark:text-gray-200 {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg p-4">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">{{ __('プロフィール') }}</h2>

            <!-- プロフィール情報を表示する部分 -->
            <div>
                <h3 class="text-xl font-semibold mt-4">{{ __('プロフィール情報') }}</h3>
                <ul class="list-disc pl-4">
                    <li>
                        <i class="fas fa-user text-gray-600 dark:text-gray-300"></i>
                        {{ __('名前: John Doe') }}
                    </li>
                    <li>
                        <i class="fas fa-envelope text-gray-600 dark:text-gray-300"></i>
                        {{ __('メールアドレス: john@example.com') }}
                    </li>
                    <li>
                        <i class="fas fa-university text-gray-600 dark:text-gray-300"></i>
                        {{ __('所属大学: 大学名') }}
                    </li>
                    <!-- 他のプロフィール情報を追加 -->
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>

</x-app-layout>