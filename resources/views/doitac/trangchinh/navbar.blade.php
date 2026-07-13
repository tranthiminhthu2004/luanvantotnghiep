<div class="h-20 bg-white border-b flex items-center justify-between px-4 md:px-6">

    <!-- Bên trái -->
    <div class="flex items-center gap-3">

        <!-- Menu Mobile -->
        <button id="menuBtn" class="lg:hidden">

            <i class="fa-solid fa-bars text-xl"></i>

        </button>

        <div>

            <h2 class="text-2xl md:text-4xl font-bold text-[#061755]">

                @yield('title')

            </h2>

        </div>

    </div>

    <!-- Bên phải -->
    <div class="flex items-center gap-4">

        <!-- Search -->
        <div class="relative hidden lg:block">

            <input type="text" placeholder="Tìm kiếm đơn đặt phòng..."
                class="w-72 rounded-lg border px-4 py-2 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>

        </div>

        <!-- Notification -->
        <button class="relative text-slate-600 hover:text-slate-800 transition">

            <i class="fa-regular fa-bell text-xl"></i>

            <span
                class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-[10px] rounded-full flex items-center justify-center">

                0

            </span>

        </button>

        <!-- Avatar -->
        <div class="flex items-center gap-3">

            <img src="https://ui-avatars.com/api/?name=Partner" class="w-10 h-10 rounded-full border object-cover">

            <div class="hidden md:block">

                <h4 class="font-semibold text-sm text-slate-800">

                    Đối tác

                </h4>

                <p class="text-xs text-gray-500">

                    Chủ khách sạn

                </p>

            </div>

        </div>

    </div>

</div>