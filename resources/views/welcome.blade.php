<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BB</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
</head>
<body>
    <x-header/>
    <div class="bg-gray-50">
        <!-- Hero Section -->
        <section class="relative">
            <img src="{{asset("img/main.png")}}" alt="Hero Image" class="w-full h-[400px] object-cover">
            <div class="absolute top-10 right-10 text-right text-white max-w-sm">
                <h1 class="text-2xl md:text-3xl font-semibold leading-tight text-black">совершенный подход к вашей красоте</h1>
            </div>
        </section>

        <!-- Services Section -->
        <section class="text-center py-8">
            <h2 class="text-lg font-semibold mb-6">наши услуги</h2>
            <div class="flex justify-center space-x-4 flex-wrap">
                <div class="w-24 sm:w-32 md:w-48">
                    <img src="{{asset("img/1.png")}}" alt="Процедуры для лица" class="rounded-lg w-full h-32 object-cover">
                    <p class="mt-2 text-sm">процедуры для лица</p>
                </div>
                <div class="w-24 sm:w-32 md:w-48">
                    <img src="{{asset("img/2.png")}}" alt="Массаж" class="rounded-lg w-full h-32 object-cover">
                    <p class="mt-2 text-sm">массаж</p>
                </div>
                <div class="w-24 sm:w-32 md:w-48">
                    <img src="{{asset("img/3.png")}}" alt="Процедуры по телу" class="rounded-lg w-full h-32 object-cover">
                    <p class="mt-2 text-sm">процедуры по телу</p>
                </div>
            </div>
        </section>

        <!-- Form Section -->
        <section class="bg-blue-100 py-8">
            <div class="max-w-md mx-auto text-center">
                <!-- Отображение флеш-сообщения -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <p class="text-lg font-medium mb-4">
                    Оставьте заявку, мы перезвоним вам и подберем удобное время для приема
                </p>
                <form action="{{ route('appointments.store') }}" method="POST" class="space-y-4" onsubmit="return validateForm()">
                    @csrf
                    <div>
                        <input type="text" name="name" placeholder="ваше имя*" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-400">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="tel" id="phone" name="phone" placeholder="телефон*" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-400">
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-600 transition">
                        оставить заявку
                    </button>
                </form>
                <p class="text-xs text-gray-500 mt-2">
                    нажимая на кнопку "Оставить заявку", я даю согласие на обработку персональных данных
                </p>
            </div>
        </section>

        <!-- Additional Sections -->
        <section class="py-8 flex justify-center space-x-4 mb-20">
            <div class="w-32 sm:w-48 text-center">
                <img src="{{asset("img/4.png")}}" alt="Специалисты" class="rounded-lg w-full h-32 object-cover mb-2">
                <a href="{{route('specialists')}}" class="text-blue-600 text-sm font-medium">специалисты</a>
            </div>
            <div class="w-32 sm:w-48 text-center">
                <img src="{{asset("img/5.png")}}" alt="Акции" class="rounded-lg w-full h-32 object-cover mb-2">
                <a href="{{route('services')}}" class="text-blue-600 text-sm font-medium">услуги</a>
            </div>
        </section>
    </div>
    <x-footer/>

    <script>
        function formatPhoneNumber(input) {
            // Удаляем все нецифровые символы
            let phoneNumber = input.value.replace(/\D/g, '');

            // Форматируем номер телефона
            if (phoneNumber.length > 0) {
                phoneNumber = '8 ' + phoneNumber.slice(1, 4) + ' ' + phoneNumber.slice(4, 7) + ' ' + phoneNumber.slice(7, 9) + ' ' + phoneNumber.slice(9, 11);
            }

            // Обновляем значение ввода
            input.value = phoneNumber;
        }

        function validateForm() {
            const phoneInput = document.getElementById('phone');
            const phoneNumber = phoneInput.value.replace(/\D/g, '');

            if (phoneNumber.length !== 11) {
                alert('Пожалуйста, введите корректный номер телефона в формате 8 888 888 88 88');
                return false;
            }

            return true;
        }

        document.getElementById('phone').addEventListener('input', function() {
            formatPhoneNumber(this);
        });
    </script>
</body>
</html>