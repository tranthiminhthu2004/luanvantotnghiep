<!DOCTYPE html>

<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-[#f5f7fb]">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('admin.trangchinh.sidebar')

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">

            {{-- Navbar --}}
            @include('admin.trangchinh.navbar')

            {{-- Nội dung --}}
            <main class="p-4 md:p-6">

                @yield('content')

            </main>

        </div>

    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {

        const menuBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');

        if (menuBtn && sidebar) {

            menuBtn.addEventListener('click', function() {

                sidebar.classList.toggle('-translate-x-full');

            });

        }

    });
    </script>

</body>

</html>