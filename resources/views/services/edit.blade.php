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

    <!-- Edit Service Form -->
    <section class="flex items-center justify-center w-full mt-8 px-4">
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-12 w-full max-w-md border border-gray-300">
            <h2 class="text-2xl font-semibold mb-6">Редактировать услугу</h2>
            <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4" onsubmit="return validateForm()">
                @csrf
                @method('PUT')
                <!-- Name Input -->
                <div>
                    <label class="sr-only" for="name">Название</label>
                    <input type="text" id="name" name="name" placeholder="Название" maxlength="50" value="{{ old('name', $service->name) }}" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Price Input -->
                <div>
                    <label class="sr-only" for="price">Цена</label>
                    <input type="text" id="price" name="price" placeholder="Цена" value="{{ old('price', $service->price) }}" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('price')
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
                    Сохранить
                </button>
            </form>
        </div>
    </section>
    <x-footer/>

    <script>
        function validateForm() {
            const nameInput = document.getElementById('name');
            const priceInput = document.getElementById('price');

            // Валидация названия
            if (!/^[a-zA-Zа-яА-Я\s]+$/.test(nameInput.value)) {
                alert('Название должно содержать только буквы и пробелы.');
                return false;
            }

            // Валидация цены
            if (!/^\d{1,5}$/.test(priceInput.value)) {
                alert('Цена должна содержать только цифры и не превышать 5 символов.');
                return false;
            }

            return true;
        }

        document.getElementById('name').addEventListener('input', function() {
            // Ограничиваем ввод только символами и пробелами
            this.value = this.value.replace(/[^a-zA-Zа-яА-Я\s]/g, '');
        });

        document.getElementById('price').addEventListener('input', function() {
            // Ограничиваем ввод только цифрами и длиной до 5 символов
            this.value = this.value.replace(/\D/g, '').slice(0, 5);
        });
    </script>
</body>
</html>