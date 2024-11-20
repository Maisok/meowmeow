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
        <img src="https://via.placeholder.com/1920x600" alt="Background" class="absolute top-0 left-0 w-full h-full object-cover opacity-70">
        <div class="relative">
            <button class="bg-blue-100 text-blue-800 font-semibold px-8 py-3 rounded-full shadow-md hover:bg-blue-200">
                Войдите в личный кабинет
            </button>
        </div>
    </section>

    <!-- Login Form -->
    <section class="flex items-center justify-center w-full mt-8 px-4">
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-12 w-full max-w-md border border-gray-300">
            <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4" onsubmit="return validateForm()">
                @csrf
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
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-100 text-blue-800 font-semibold py-2 rounded-full shadow-md hover:bg-blue-200 mt-4">
                    войти
                </button>
            </form>
        </div>
    </section>
    <x-footer/>

    <script>
        function validateForm() {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');

            // Валидация email
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(emailInput.value)) {
                alert('Пожалуйста, введите корректный email.');
                return false;
            }

            // Простая проверка на пустое поле пароля
            if (passwordInput.value.trim() === '') {
                alert('Пожалуйста, введите пароль.');
                return false;
            }

            return true;
        }

        document.getElementById('email').addEventListener('input', function() {
            // Ограничиваем ввод только символами, соответствующими формату email
            this.value = this.value.replace(/[^a-zA-Z0-9._@-]/g, '');
        });
    </script>
</body>
</html>