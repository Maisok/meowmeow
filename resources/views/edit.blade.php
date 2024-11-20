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
                Редактирование профиля
            </button>
        </div>
    </section>

    <!-- Profile Edit Form -->
    <section class="flex items-center justify-center w-full mt-8 px-4 mb-24">
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-12 w-full max-w-md border border-gray-300">
            <h2 class="text-2xl font-semibold mb-6">Редактирование профиля</h2>
            <form action="{{ route('profile.update') }}" method="POST" class="flex flex-col gap-4" onsubmit="return validateForm()">
                @csrf
                <!-- Name Input -->
                <div>
                    <label class="sr-only" for="name">Имя</label>
                    <input type="text" id="name" name="name" placeholder="Имя" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Email Input -->
                <div>
                    <label class="sr-only" for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="EMAIL" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Password Input -->
                <div>
                    <label class="sr-only" for="password">Новый пароль</label>
                    <input type="password" id="password" name="password" placeholder="Новый пароль" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Confirm Password Input -->
                <div>
                    <label class="sr-only" for="password_confirmation">Подтвердите пароль</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Подтвердите пароль" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                </div>
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-100 text-blue-800 font-semibold py-2 rounded-full shadow-md hover:bg-blue-200 mt-4">
                    Сохранить изменения
                </button>
            </form>
        </div>
    </section>
    <x-footer/>

    <script>
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function validateForm() {
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const passwordConfirmationInput = document.getElementById('password_confirmation');

            // Валидация имени
            if (!/^[a-zA-Zа-яА-Я\s]+$/.test(nameInput.value)) {
                alert('Имя должно содержать только буквы и пробелы.');
                return false;
            }

            // Валидация email
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(emailInput.value)) {
                alert('Пожалуйста, введите корректный email.');
                return false;
            }

            // Валидация пароля
            if (passwordInput.value !== passwordConfirmationInput.value) {
                alert('Пароли не совпадают.');
                return false;
            }

            return true;
        }

        document.getElementById('name').addEventListener('input', function() {
            // Ограничиваем ввод только символами и пробелами
            this.value = this.value.replace(/[^a-zA-Zа-яА-Я\s]/g, '');
            // Делаем первый символ заглавным
            this.value = capitalizeFirstLetter(this.value);
        });

        document.getElementById('email').addEventListener('input', function() {
            // Ограничиваем ввод только символами, соответствующими формату email
            this.value = this.value.replace(/[^a-zA-Z0-9._@-]/g, '');
        });
    </script>
</body>
</html>