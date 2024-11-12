<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BB</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <!-- Добавляем скрипт Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <x-header/>
    
    <section class="w-full relative flex items-center justify-center h-[300px] md:h-[400px] bg-gradient-to-r from-blue-100 to-blue-300">
        <img src="{{asset('img/6.png')}}" alt="Background" class="absolute top-0 left-0 w-full h-full object-cover opacity-70">
        <div class="relative">
            <button class="bg-blue-100 text-blue-800 font-semibold px-8 py-3 rounded-full shadow-md hover:bg-blue-200">
                Зарегистрируйтесь
            </button>
        </div>
    </section>

    <!-- Registration Form -->
    <section class="flex items-center justify-center w-full mt-8 mb-24 px-4">
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-12 w-full max-w-md border border-gray-300">
            <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <!-- Name Input -->
                <div>
                    <label class="sr-only" for="name">Имя</label>
                    <input type="text" id="name" name="name" placeholder="Имя" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Email Input -->
                <div>
                    <label class="sr-only" for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="EMAIL" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Password Input -->
                <div>
                    <label class="sr-only" for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="введите пароль" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Confirm Password Input -->
                <div>
                    <label class="sr-only" for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="введите пароль еще раз" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                </div>
                <!-- Google reCAPTCHA -->
                <div class="g-recaptcha" data-sitekey="6LcjLHwqAAAAAHKmQUlnvdo79rwYYsvmdFq695HU"></div>
                @error('g-recaptcha-response')
                    <p class="text-red-500 text-xs mt-1">Пожалуйста, подтвердите, что вы не робот.</p>
                @enderror
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-100 text-blue-800 font-semibold py-2 rounded-full shadow-md hover:bg-blue-200 mt-4">
                    зарегистрироваться
                </button>
                
                <a href="{{route('login')}}">Есть аккаунт</a>
            </form>
        </div>
    </section>
    <x-footer/>
</body>
</html>