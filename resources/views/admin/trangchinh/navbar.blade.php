<div class="h-20 bg-white border-b flex items-center justify-between px-4 md:px-6">

    <!-- Bên trái -->
    <div class="flex items-center gap-3">

        <!-- Menu Mobile -->
        <button id="menuBtn" class="lg:hidden">

            <i class="fa-solid fa-bars text-xl"></i>

        </button>

        <h2 class="text-2xl md:text-4xl font-bold text-[#061755]">
            @yield('title')
        </h2>

    </div>

    <!-- Bên phải -->
    <div class="flex items-center gap-3">



        <!-- Avatar -->
        <div class="flex items-center gap-2">

            <img src="https://ui-avatars.com/api/?name=Admin" class="w-9 h-9 rounded-full border object-cover">

            <div class="hidden md:block">

                <h4 class="font-semibold text-sm">
                    Admin
                </h4>

                <p class="text-xs text-gray-500">
                    Quản trị viên
                </p>

            </div>

        </div>

    </div>

</div>