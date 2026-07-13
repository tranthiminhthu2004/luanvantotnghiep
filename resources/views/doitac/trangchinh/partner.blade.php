<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title')
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-[#f8fafc] overflow-x-hidden">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('doitac.trangchinh.sidebar')

        {{-- Overlay Mobile --}}
        <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>

        {{-- Content --}}
        <div class="flex-1 flex flex-col min-w-0 h-screen">

            {{-- Navbar --}}
            @include('doitac.trangchinh.navbar')

            {{-- Nội dung --}}
            <main class="flex-1 overflow-y-auto p-3 sm:p-4 md:p-6 w-full max-w-[1600px] mx-auto">

                @yield('content')

            </main>

        </div>

    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {

        const menuBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const closeBtn = document.getElementById('closeSidebar');

        function openSidebar() {

            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');

        }

        function closeSidebar() {

            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');

        }

        menuBtn?.addEventListener('click', openSidebar);
        closeBtn?.addEventListener('click', closeSidebar);
        overlay?.addEventListener('click', closeSidebar);

    });
    </script>

</body>

</html>