<div class="h-20 bg-white border-b flex items-center justify-between px-4 md:px-8">
    <!-- Bên trái -->
    <div class="flex items-center gap-4">

        <!-- Menu Mobile -->
        <button id="menuBtn" class="lg:hidden">

            <i class="fa-solid fa-bars text-2xl"></i>

        </button>

        <h2 class="text-xl md:text-4xl font-bold">
            @yield('title')
        </h2>

    </div>

    <!-- Bên phải -->
    <div class="flex items-center gap-3 md:gap-5">

        <!-- Search -->
        <div class="relative hidden md:block">

            <input type="text" placeholder="Tìm kiếm nhanh..."
                class="w-72 lg:w-80 rounded-xl border px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-gray-400"></i>

        </div>

        <!-- Notification -->
        <button class="relative">

            <i class="fa-regular fa-bell text-xl md:text-2xl"></i>

            <span
                class="absolute -top-2 -right-2 w-5 h-5 text-white text-xs rounded-full flex items-center justify-center">

            </span>

        </button>

        <!-- Avatar -->
        <div class="flex items-center gap-3">

            <img src="https://ui-avatars.com/api/?name=Admin" class="w-10 h-10 rounded-full border object-cover">

            <div class="hidden md:block">

                <h4 class="font-semibold">
                    Admin
                </h4>

                <p class="text-xs text-gray-500">
                    Quản trị viên
                </p>

            </div>

        </div>

    </div>

</div>