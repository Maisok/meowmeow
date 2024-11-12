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
            Сотрудники
        </button>
    </div>
</section>

<!-- Staff List Section -->
<section class="flex items-center justify-center w-full mt-8 px-4">
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-12 w-full max-w-md border border-gray-300">
        <h2 class="text-2xl font-semibold mb-6">Сотрудники</h2>
        <a href="{{ route('admin.staff.create') }}" class="bg-blue-100 text-blue-800 font-semibold py-2 px-4 rounded-full shadow-md hover:bg-blue-200 mb-4 inline-block">
            Добавить сотрудника
        </a>
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left">Имя</th>
                    <th class="text-left">Фамилия</th>
                    <th class="text-left">Должность</th>
                    <th class="text-left">Специалист</th>
                    <th class="text-left">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->specialist->name }}</td>
                        <td>
                            <a href="{{ route('admin.staff.edit', $employee) }}" class="text-blue-600 hover:underline">Редактировать</a>
                            <form action="{{ route('admin.staff.destroy', $employee) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline ml-4">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<x-footer/>
</body>
</html>