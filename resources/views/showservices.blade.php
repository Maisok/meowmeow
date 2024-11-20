<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $service->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">
    <x-header/>

    <div class="bg-blue-100 py-12 mb-24">
        <div class="relative text-center">
            <img src="{{ asset('img/7.png') }}" alt="Background Image" class="w-full h-64 object-cover">
            <button class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white text-blue-600 py-2 px-6 rounded-full shadow-lg font-bold">{{ $service->name }}</button>
        </div>

        <div class="container mx-auto mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div class="text-center bg-white p-6 rounded-lg shadow-md">
                <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" class="w-full h-48 object-cover rounded-t-lg">
                <h3 class="mt-4 text-xl font-bold">{{ $service->name }}</h3>
                <p class="mt-2 text-gray-600">{{ $service->price }}</p>
            </div>

            <div class="col-span-full bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Записаться</h2>
                <form action="{{ route('appointment.store', $service) }}" method="POST" onsubmit="return validateForm()" class="space-y-4">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Имя</label>
                        <input type="text" id="name" name="name" class="form-control w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="block text-gray-700 font-bold mb-2">Телефон</label>
                        <input type="text" id="phone" name="phone" class="form-control w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div class="form-group">
                        <label for="date" class="block text-gray-700 font-bold mb-2">Дата</label>
                        <input type="date" name="date" class="form-control w-full p-2 border border-gray-300 rounded-md" required id="appointmentDate">
                    </div>
                    <div class="form-group">
                        <label for="staff" class="block text-gray-700 font-bold mb-2">Персонал</label>
                        <select name="staff" class="form-control w-full p-2 border border-gray-300 rounded-md" required>
                            @foreach($service->specialists as $specialist)
                                @foreach($specialist->staff as $staff)
                                    <option value="{{ $staff->id }}">{{ $staff->first_name }} {{ $staff->last_name }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary bg-blue-600 text-white py-2 px-6 rounded-full shadow-lg font-bold hover:bg-blue-700 transition duration-300">Записаться</button>
                </form>
            </div>
        </div>
    </div>

    <x-footer/>

    <script>
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

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
            const nameInput = document.getElementById('name');
            const phoneInput = document.getElementById('phone');
            const dateInput = document.getElementById('appointmentDate');

            // Валидация имени
            if (!/^[a-zA-Zа-яА-Я\s]+$/.test(nameInput.value)) {
                alert('Имя должно содержать только буквы и пробелы.');
                return false;
            }

            // Валидация телефона
            const phoneNumber = phoneInput.value.replace(/\D/g, '');
            if (phoneNumber.length !== 11) {
                alert('Пожалуйста, введите корректный номер телефона в формате 8 888 888 88 88');
                return false;
            }

            // Валидация даты
            const selectedDate = new Date(dateInput.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0); // Устанавливаем время на начало дня

            if (selectedDate < today) {
                alert('Пожалуйста, выберите дату, которая не в прошлом.');
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

        document.getElementById('phone').addEventListener('input', function() {
            formatPhoneNumber(this);
        });
    </script>
</body>
</html>