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


    <!-- Services List Section -->
    <section class="flex items-center justify-center w-full mt-8 px-4">
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-12 w-full max-w-md border border-gray-300">
            <h2 class="text-2xl font-semibold mb-6">Услуги</h2>
            <a href="{{ route('admin.services.create') }}" class="bg-blue-100 text-blue-800 font-semibold py-2 px-4 rounded-full shadow-md hover:bg-blue-200 mb-4 inline-block">
                Добавить услугу
            </a>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-left">Название</th>
                        <th class="text-left">Цена</th>
                        <th class="text-left">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->price }}</td>
                            <td>
                                <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-600 hover:underline">Редактировать</a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline">
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