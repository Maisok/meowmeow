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
                Редактировать специалиста
            </button>
        </div>
    </section>

    <!-- Edit Specialist Form -->
    <section class="flex items-center justify-center w-full mt-8 px-4 mb-24">
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-12 w-full max-w-md border border-gray-300">
            <h2 class="text-2xl font-semibold mb-6">Редактировать сотрудника</h2>
            <form action="{{ route('admin.staff.update', $staff) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf
                @method('PUT')
                <!-- Name Input -->
                <div>
                    <label class="sr-only" for="name">Имя</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Имя" value="{{ old('name', $staff->first_name) }}" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('first_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="sr-only" for="name">Имя</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Имя" value="{{ old('name', $staff->last_name) }}" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('last_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="sr-only" for="name">Имя</label>
                    <input type="text" id="position" name="position" placeholder="Имя" value="{{ old('name', $staff->position) }}" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    @error('position')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Service Input -->
                <div>
                    <label class="sr-only" for="service_id">Услуга</label>
                    <select id="specialist_id" name="specialist_id" class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                        @foreach($specialists as $specialist)
                            <option value="{{ $specialist->id }}" {{ $specialist->id == $specialist->service_id ? 'selected' : '' }}>{{ $specialist->name }}</option>
                        @endforeach
                    </select>
                    @error('service_id')
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
</body>
</html>