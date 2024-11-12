<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BB</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
</head>
<body>
    <x-header/>
    <!-- Top Section with Image and Button -->
    <section class="w-full relative flex items-center justify-center h-[300px] md:h-[400px] bg-gradient-to-r from-blue-100 to-blue-300">
        <img src="{{asset('img/6.png')}}" alt="Background" class="absolute top-0 left-0 w-full h-full object-cover opacity-70">
        <div class="relative">
            <button class="bg-blue-100 text-blue-800 font-semibold px-8 py-3 rounded-full shadow-md hover:bg-blue-200">
                Админка
            </button>
        </div>
    </section>

    <!-- Admin Dashboard Section -->
    <section class="flex items-center justify-center w-full mt-8 px-4 mb-24">
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-12 w-full max-w-md border border-gray-300">
            <h2 class="text-2xl font-semibold mb-6">Админка</h2>
            <p class="text-lg font-medium mb-4">Добро пожаловать, администратор!</p>
            <a href="{{ route('admin.services.index') }}" class="bg-blue-100 text-blue-800 font-semibold py-2 px-4 rounded-full shadow-md hover:bg-blue-200 mb-4 inline-block">
                Управление услугами
            </a>
            <a href="{{ route('admin.specialists.index') }}" class="bg-blue-100 text-blue-800 font-semibold py-2 px-4 rounded-full shadow-md hover:bg-blue-200 mb-4 inline-block">
                Управление специалистами
            </a>
            <a href="{{ route('admin.staff.index') }}" class="bg-blue-100 text-blue-800 font-semibold py-2 px-4 rounded-full shadow-md hover:bg-blue-200 mb-4 inline-block">
                Управление сотрудниками
            </a>
            <a href="{{ route('export.appointments') }}" class="bg-blue-100 text-blue-800 font-semibold py-2 px-4 rounded-full shadow-md hover:bg-blue-200 mb-4 inline-block">
                Экспорт записей
            </a>
            <a href="{{ route('export.new-appointments') }}" class="bg-blue-100 text-blue-800 font-semibold py-2 px-4 rounded-full shadow-md hover:bg-blue-200 mb-4 inline-block">
                Экспорт новых записей
            </a>
        </div>
    </section>
    <x-footer/>
</body>
</html>