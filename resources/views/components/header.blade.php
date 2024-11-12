@vite('resources/css/app.css')
<header class="bg-blue-50 py-4">
    <div class="container mx-auto flex items-center justify-between px-4">

        <!-- Пустой элемент для выравнивания по центру -->
        <div class="flex-1"></div>

        <!-- Ссылки и логотип посередине -->
        <div class="flex items-center space-x-6">
            <a href="{{route('services')}}" class="text-black text-sm font-medium">услуги</a>
            <a href="{{route('welcome')}}"><img src="{{asset("img/logo.png")}}" alt="Logo" class="h-8 object-contain mx-4"></a>
            <a href="{{route('specialists')}}" class="text-black text-sm font-medium">специалисты</a>
        </div>

        <!-- Пустой элемент для выравнивания по центру -->
        <div class="flex-1 flex justify-end">
            <a href="{{route('register')}}" class="bg-black p-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 12a5 5 0 100-10 5 5 0 000 10zm-7 7a7 7 0 0114 0H3z" clip-rule="evenodd" />
                </svg>
            </a>
            @auth
            @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="text-black text-sm font-medium ml-4">Админка</a>
            @endif
            @endauth
        </div>
    </div>
</header>