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
                Личный кабинет
            </button>
        </div>
    </section>

    <!-- User Information Section -->
    <section class="flex items-center justify-center w-full mt-8 px-4 mb-24">
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-12 w-full max-w-md border border-gray-300">
            <h2 class="text-2xl font-semibold mb-6">Ваши данные</h2>
            <div class="flex flex-col gap-4">
                <div>
                    <label class="font-semibold">Имя:</label>
                    <p>{{ $user->name }}</p>
                </div>
                <div>
                    <label class="font-semibold">Email:</label>
                    <p>{{ $user->email }}</p>
                </div>
            </div>
          
            <form action="{{ route('logout') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="w-full bg-red-500 text-white py-2 rounded-full shadow-md hover:bg-red-600">
                    Выйти
                </button>
            </form>

            <form action="{{ route('profile.edit') }}" method="GET" class="mt-6">
                @csrf
                <button type="submit" class="w-full bg-blue-100 text-white py-2 rounded-full text-blue-800 shadow-md hover:bg-blue-200">
                    Редактирование данных
                </button>
            </form>
            
    
        </div>
    </section>
    <x-footer/>
</body>
</html>