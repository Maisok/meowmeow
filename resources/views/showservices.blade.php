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
                        <input type="text" name="name" class="form-control w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="block text-gray-700 font-bold mb-2">Телефон</label>
                        <input type="text" name="phone" class="form-control w-full p-2 border border-gray-300 rounded-md" required>
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
        function validateForm() {
            const dateInput = document.getElementById('appointmentDate');
            const selectedDate = new Date(dateInput.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0); // Устанавливаем время на начало дня

            if (selectedDate < today) {
                alert('Пожалуйста, выберите дату, которая не в прошлом.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>