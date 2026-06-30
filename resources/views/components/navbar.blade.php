<nav class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-24">

            <!-- Logo -->
            <a href="{{ route('users.index') }}" class="flex-shrink-0">

                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-14 w-auto">

            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex flex-1 justify-center">

                <ul class="flex items-center gap-8 text-[17px] font-semibold text-[#061755]">

                    <li>

                        <a href="{{ route('users.index') }}" class="hover:text-blue-600 transition">

                            Trang chủ

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('khachsan.index') }}" class="hover:text-blue-600 transition">

                            Khách sạn

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('diadiemdulich.index') }}" class="hover:text-blue-600 transition">

                            Địa điểm du lịch

                        </a>

                    </li>

                    <li>

                        <a href="#" class="hover:text-blue-600 transition">

                            Tra cứu đặt phòng

                        </a>

                    </li>

                    <li>

                        <a href="#" class="hover:text-blue-600 transition">

                            Tin tức

                        </a>

                    </li>

                    <li>

                        <a href="#" class="hover:text-blue-600 transition">

                            Liên hệ

                        </a>

                    </li>

                </ul>

            </div>

            <!-- Desktop Auth -->
            <div class="hidden lg:flex items-center gap-4 flex-shrink-0">

                @guest

                <a href="{{ route('register') }}"
                    class="px-5 py-2.5 rounded-full border border-[#295AB7] text-[#1040C5] font-semibold hover:bg-blue-50 transition">

                    Đăng ký

                </a>

                <a href="{{ route('login') }}"
                    class="px-5 py-2.5 rounded-full bg-[#1040C5] text-white font-semibold hover:bg-blue-700 transition">

                    Đăng nhập

                </a>

                @endguest

                @auth

                <div class="relative">

                    <button id="userMenuBtn"
                        class="flex items-center gap-3 rounded-full px-3 py-2 hover:bg-slate-100 transition">

                        <img src="{{ Auth::user()->anh_dai_dien ?: asset('images/default-avatar.png') }}"
                            class="w-11 h-11 rounded-full object-cover border">

                        <div class="text-left leading-tight">

                            <p class="font-semibold text-[#061755]">

                                {{ Auth::user()->ten }}

                            </p>

                            <p class="text-sm text-gray-500 truncate max-w-[170px]">

                                {{ Auth::user()->email }}

                            </p>

                        </div>

                        <i class="fa-solid fa-chevron-down text-gray-400 text-xs"></i>

                    </button>

                    <!-- Dropdown -->
                    <div id="userDropdown"
                        class="hidden absolute right-0 mt-3 w-80 bg-white rounded-2xl shadow-xl border overflow-hidden">
                        <div class="p-5 border-b bg-slate-50">

                            <div class="flex items-center gap-3">

                                <img src="{{ Auth::user()->anh_dai_dien ?: asset('images/default-avatar.png') }}"
                                    class="w-14 h-14 rounded-full object-cover border">

                                <div>

                                    <p class="font-semibold text-[#061755]">

                                        {{ Auth::user()->ho_va_ten_dem }}
                                        {{ Auth::user()->ten }}

                                    </p>

                                    <p class="text-sm text-gray-500 break-all">

                                        {{ Auth::user()->email }}

                                    </p>

                                </div>

                            </div>

                        </div>

                        <div class="py-2">

                            <a href="#" class="flex items-center gap-3 px-5 py-3 hover:bg-slate-100 transition">

                                <i class="fa-solid fa-user w-5 text-blue-600"></i>

                                Hồ sơ cá nhân

                            </a>

                            <a href="#" class="flex items-center gap-3 px-5 py-3 hover:bg-slate-100 transition">

                                <i class="fa-solid fa-calendar-check w-5 text-green-600"></i>

                                Lịch sử đặt phòng

                            </a>


                        </div>

                        <div class="border-t">

                            <form method="POST" action="{{ route('logout') }}">

                                @csrf

                                <button type="submit"
                                    class="w-full flex items-center gap-3 px-5 py-3 text-red-500 hover:bg-red-50 transition">

                                    <i class="fa-solid fa-right-from-bracket w-5"></i>

                                    Đăng xuất

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

                @endauth

            </div>

            <!-- Mobile Menu Button -->
            <button id="menuBtn"
                class="lg:hidden flex items-center justify-center w-11 h-11 rounded-lg hover:bg-slate-100 transition">

                <i class="fa-solid fa-bars text-2xl text-[#061755]"></i>

            </button>

        </div>

    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden lg:hidden border-t bg-white shadow-lg">

        <div class="px-6 py-5 space-y-4">

            <a href="{{ route('users.index') }}" class="block font-semibold text-[#061755] hover:text-blue-600">

                Trang chủ

            </a>

            <a href="{{ route('khachsan.index') }}" class="block font-semibold text-[#061755] hover:text-blue-600">

                Khách sạn

            </a>

            <a href="{{ route('diadiemdulich.index') }}" class="block font-semibold text-[#061755] hover:text-blue-600">

                Địa điểm du lịch

            </a>

            <a href="#" class="block font-semibold text-[#061755] hover:text-blue-600">

                Tra cứu đặt phòng

            </a>

            <a href="#" class="block font-semibold text-[#061755] hover:text-blue-600">

                Tin tức

            </a>

            <a href="#" class="block font-semibold text-[#061755] hover:text-blue-600">

                Liên hệ

            </a>

            <hr>
            @guest

            <div class="pt-4 space-y-3">

                <a href="{{ route('register') }}"
                    class="block text-center py-3 rounded-full border border-[#295AB7] text-[#1040C5] font-semibold hover:bg-blue-50 transition">

                    Đăng ký

                </a>

                <a href="{{ route('login') }}"
                    class="block text-center py-3 rounded-full bg-[#1040C5] text-white font-semibold hover:bg-blue-700 transition">

                    Đăng nhập

                </a>

            </div>

            @endguest

            @auth

            <div class="border-t pt-5">

                <div class="flex items-center gap-3 mb-5">

                    <img src="{{ Auth::user()->anh_dai_dien ?: asset('images/default-avatar.png') }}"
                        class="w-14 h-14 rounded-full object-cover border">

                    <div>

                        <p class="font-semibold text-[#061755]">

                            {{ Auth::user()->ho_va_ten_dem }}
                            {{ Auth::user()->ten }}

                        </p>

                        <p class="text-sm text-gray-500 break-all">

                            {{ Auth::user()->email }}

                        </p>

                    </div>

                </div>

                <div class="space-y-3">

                    <a href="#" class="flex items-center gap-3 text-[#061755] hover:text-blue-600">

                        <i class="fa-solid fa-user w-5"></i>

                        Hồ sơ cá nhân

                    </a>

                    <a href="#" class="flex items-center gap-3 text-[#061755] hover:text-blue-600">

                        <i class="fa-solid fa-calendar-check w-5"></i>

                        Lịch sử đặt phòng

                    </a>

                    <a href="#" class="flex items-center gap-3 text-[#061755] hover:text-blue-600">

                        <i class="fa-solid fa-heart w-5"></i>

                        Khách sạn yêu thích

                    </a>

                </div>

                <form method="POST" action="{{ route('logout') }}" class="mt-6">

                    @csrf

                    <button type="submit"
                        class="w-full rounded-full bg-red-50 text-red-600 py-3 font-semibold hover:bg-red-100 transition">

                        Đăng xuất

                    </button>

                </form>

            </div>

            @endauth

        </div>

    </div>

</nav>

<script>
const menuBtn = document.getElementById('menuBtn');
const mobileMenu = document.getElementById('mobileMenu');

if (menuBtn) {

    menuBtn.addEventListener('click', function(e) {

        e.stopPropagation();

        mobileMenu.classList.toggle('hidden');

    });

}

const userMenuBtn = document.getElementById('userMenuBtn');
const userDropdown = document.getElementById('userDropdown');

if (userMenuBtn) {

    userMenuBtn.addEventListener('click', function(e) {

        e.stopPropagation();

        userDropdown.classList.toggle('hidden');

    });

}

document.addEventListener('click', function() {

    if (userDropdown) {

        userDropdown.classList.add('hidden');

    }

    if (window.innerWidth < 1024) {

        mobileMenu.classList.add('hidden');

    }

});

mobileMenu?.addEventListener('click', function(e) {

    e.stopPropagation();

});

userDropdown?.addEventListener('click', function(e) {

    e.stopPropagation();

});

window.addEventListener('resize', function() {

    if (window.innerWidth >= 1024) {

        mobileMenu.classList.add('hidden');

    }

});
</script>