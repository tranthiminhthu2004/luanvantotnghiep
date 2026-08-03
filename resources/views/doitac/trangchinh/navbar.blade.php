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
    <!-- Bên phải -->
    <div class="flex items-center gap-3">

        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->ten) }}&background=1040C5&color=fff&size=128"
            class="w-10 h-10 rounded-full border object-cover">

        <div class="hidden md:block">

            <h4 class="font-semibold text-sm text-slate-800">

                {{ auth()->user()->ho_va_ten_dem }}
                {{ auth()->user()->ten }}

            </h4>

            <p class="text-xs text-gray-500">

                Chủ khách sạn

            </p>

        </div>

    </div>

</div>