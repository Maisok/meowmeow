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
                Добавить сотрудника
            </button>
        </div>
    </section>

    <!-- Create Staff Form -->
    <section class="flex items-center justify-center w-full mt-8 px-4">
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-12 w-full max-w-md border border-gray-300">
            <h2 class="text-2xl font-semibold mb-6">Добавить сотрудника</h2>
            <form action="{{ route('admin.staff.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4" onsubmit="return validateForm()">
                @csrf
                <!-- First Name Input -->
                <div>
                    <label class="sr-only" for="first_name">Имя</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Имя" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('first_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Last Name Input -->
                <div>
                    <label class="sr-only" for="last_name">Фамилия</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Фамилия" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('last_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Position Input -->
                <div>
                    <label class="sr-only" for="position">Должность</label>
                    <input type="text" id="position" name="position" placeholder="Должность" maxlength="30" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('position')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Specialist Input -->
                <div>
                    <label class="sr-only" for="specialist_id">Специалист</label>
                    <select id="specialist_id" name="specialist_id" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                        @foreach($specialists as $specialist)
                            <option value="{{ $specialist->id }}">{{ $specialist->name }}</option>
                        @endforeach
                    </select>
                    @error('specialist_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Image Input -->
                <div>
                    <label class="sr-only" for="image">Изображение</label>
                    <input type="file" id="image" name="image" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-100 text-blue-800 font-semibold py-2 rounded-full shadow-md hover:bg-blue-200 mt-4">
                    Добавить
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
            const firstNameInput = document.getElementById('first_name');
            const lastNameInput = document.getElementById('last_name');
            const positionInput = document.getElementById('position');

            // Валидация имени
            if (!/^[a-zA-Zа-яА-Я\s]+$/.test(firstNameInput.value)) {
                alert('Имя должно содержать только буквы и пробелы.');
                return false;
            }

            // Валидация фамилии
            if (!/^[a-zA-Zа-яА-Я\s]+$/.test(lastNameInput.value)) {
                alert('Фамилия должна содержать только буквы и пробелы.');
                return false;
            }

            // Валидация должности
            if (!/^[a-zA-Zа-яА-Я\s]+$/.test(positionInput.value)) {
                alert('Должность должна содержать только буквы и пробелы.');
                return false;
            }

            if (positionInput.value.length > 30) {
                alert('Должность не должна превышать 30 символов.');
                return false;
            }

            return true;
        }

        document.getElementById('first_name').addEventListener('input', function() {
            // Ограничиваем ввод только символами и пробелами
            this.value = this.value.replace(/[^a-zA-Zа-яА-Я\s]/g, '');
            // Делаем первый символ заглавным
            this.value = capitalizeFirstLetter(this.value);
        });

        document.getElementById('last_name').addEventListener('input', function() {
            // Ограничиваем ввод только символами и пробелами
            this.value = this.value.replace(/[^a-zA-Zа-яА-Я\s]/g, '');
            // Делаем первый символ заглавным
            this.value = capitalizeFirstLetter(this.value);
        });

        document.getElementById('position').addEventListener('input', function() {
            // Ограничиваем ввод только символами и пробелами
            this.value = this.value.replace(/[^a-zA-Zа-яА-Я\s]/g, '');
            // Делаем первый символ заглавным
            this.value = capitalizeFirstLetter(this.value);
            // Ограничиваем длину до 30 символов
            if (this.value.length > 30) {
                this.value = this.value.slice(0, 30);
            }
        });
    </script>
</body>
</html>