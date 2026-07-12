<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <div id="sidebar"
            class="fixed lg:static top-0 left-0 z-50 w-60 min-h-screen bg-gradient-to-b from-[#001845] to-[#001233] text-white flex flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300">

            {{-- Logo --}}
            <div class="border-b border-blue-900 flex items-center justify-between px-3 py-2">

                <img src="{{ asset('images/logodb.png') }}" class="w-40 mx-auto">

                <button id="closeSidebar" class="lg:hidden text-lg p-2">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>

            {{-- Menu --}}
            <nav class="flex-1 py-4 overflow-y-auto">

                <p class="px-4 mb-3 text-[11px] text-gray-400 uppercase tracking-widest">

                    Quản lý

                </p>

                {{-- Khách sạn --}}
                <a href="{{ route('doitac.khachsan.index') }}" class="mx-2 mb-2 flex items-center gap-3 rounded-full px-4 py-2 text-sm transition
                {{ request()->routeIs('doitac.khachsan.*') ? 'bg-blue-800' : 'hover:bg-blue-900' }}">

                    <i class="fa-solid fa-hotel w-4"></i>

                    Khách sạn của tôi

                </a>

                {{-- Đơn đặt phòng --}}
                <a href="{{ route('doitac.datphong.index') }}" class="mx-2 mb-2 flex items-center gap-3 rounded-full px-4 py-2 text-sm transition
                {{ request()->routeIs('doitac.datphong.*') ? 'bg-blue-800' : 'hover:bg-blue-900' }}">

                    <i class="fa-solid fa-calendar-check w-4"></i>

                    Đơn đặt phòng

                </a>

                <p class="px-4 mt-6 mb-3 text-[11px] text-gray-400 uppercase tracking-widest">

                    Tài khoản

                </p>

                {{-- Hồ sơ --}}
                <a href="#"
                    class="mx-2 mb-2 flex items-center gap-3 rounded-full px-4 py-2 text-sm hover:bg-blue-900 transition">

                    <i class="fa-solid fa-user w-4"></i>

                    Hồ sơ

                </a>

                {{-- Đăng xuất --}}
                <form method="POST" action="{{ route('logout') }}" class="mx-2">

                    @csrf

                    <button onclick="return confirm('Bạn có muốn đăng xuất không?')"
                        class="w-full flex items-center gap-3 rounded-full px-4 py-2 text-sm hover:bg-red-600 transition">

                        <i class="fa-solid fa-right-from-bracket w-4"></i>

                        Đăng xuất

                    </button>

                </form>

            </nav>

        </div>

        {{-- Nội dung --}}
        <div class="flex-1 flex flex-col">

            {{-- Header --}}
            <div class="h-20 bg-white border-b flex items-center justify-between px-6">

                <div class="flex items-center gap-3">

                    <button id="menuBtn" class="lg:hidden">

                        <i class="fa-solid fa-bars text-xl"></i>

                    </button>

                    <h2 class="text-3xl font-bold text-[#061755]">

                        @yield('title')

                    </h2>

                </div>

                <div class="flex items-center gap-3">

                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->hoTen) }}"
                        class="w-10 h-10 rounded-full border">

                    <div>

                        <p class="font-semibold">

                            {{ auth()->user()->hoTen }}

                        </p>

                        <p class="text-sm text-gray-500">

                            Đối tác

                        </p>

                    </div>

                </div>

            </div>

            <div class="p-6">

                @yield('content')

            </div>

        </div>

    </div>

    <script>
    const menuBtn = document.getElementById('menuBtn');

    const sidebar = document.getElementById('sidebar');

    const closeSidebar = document.getElementById('closeSidebar');

    menuBtn?.addEventListener('click', () => {

        sidebar.classList.remove('-translate-x-full');

    });

    closeSidebar?.addEventListener('click', () => {

        sidebar.classList.add('-translate-x-full');

    });
    </script>

</body>

</html>