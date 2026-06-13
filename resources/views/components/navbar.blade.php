<nav class="bg-white shadow-sm">

    <div class="w-full px-6">

        <div class="flex items-center justify-between h-24">

            <!-- Logo -->
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-auto w-40 lg:ml-40">

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex items-center justify-center gap-5 text-xl font-bold">

                <li>
                    <a href="{{ route('users.index') }}" class="hover:text-blue-600 text-[#061755]">
                        Trang chủ
                    </a>
                </li>

                <li>
                    <a href="{{ route('khachsan.index') }}" class="hover:text-blue-600 text-[#061755]">
                        Khách sạn
                    </a>
                </li>

                <li>
                    <a href="{{ route('diadiemdulich.index') }}" class="hover:text-blue-600 text-[#061755]">
                        Địa điểm du lịch
                    </a>
                </li>

                <li>
                    <a href="#" class="hover:text-blue-600 text-[#061755]">
                        Tra cứu đặt phòng
                    </a>
                </li>

                <li>
                    <a href="#" class="hover:text-blue-600 text-[#061755]">
                        Tin tức
                    </a>
                </li>

                <li>
                    <a href="#" class="hover:text-blue-600 text-[#061755]">
                        Liên hệ
                    </a>
                </li>

            </ul>

            <!-- Desktop Auth -->
            <div class="hidden lg:flex items-center gap-6 mr-10">

                @guest

                <a href="{{ route('register') }}"
                    class="px-5 py-3 rounded-full border border-[#295AB7] text-[#1040C5] font-bold hover:bg-blue-50">

                    Đăng ký

                </a>

                <a href="{{ route('login') }}"
                    class="px-5 py-3 rounded-full bg-[#1040C5] text-white font-bold hover:bg-blue-700">

                    Đăng nhập

                </a>

                @endguest

                @auth

                <div class="relative mr-20">

                    <button id="userMenuBtn"
                        class="flex items-center gap-3 hover:bg-gray-100 px-3 py-2 rounded-full transition">

                        <img src="{{ Auth::user()->anh_dai_dien ?: asset('images/default-avatar.png') }}" alt="Avatar"
                            class="w-12 h-12 rounded-full object-cover border">

                        <div class="text-left">

                            <p class="font-bold text-lg text-[#061755]">
                                {{ Auth::user()->ten }}
                            </p>

                            <p class="text-lg text-gray-500">
                                {{ Auth::user()->email }}
                            </p>

                        </div>

                    </button>

                    <div id="userDropdown"
                        class="hidden absolute right-0 mt-3 w-64 bg-white rounded-xl shadow-xl border overflow-hidden z-50">

                        <div class="p-4 border-b">

                            <p class="font-bold">
                                {{ Auth::user()->ho_va_ten_dem }}
                                {{ Auth::user()->ten }}
                            </p>

                            <p class="text-sm text-gray-500">
                                {{ Auth::user()->email }}
                            </p>

                        </div>

                        <a href="#" class="block px-5 py-3 hover:bg-gray-100">

                            Hồ sơ cá nhân

                        </a>

                        <a href="#" class="block px-5 py-3 hover:bg-gray-100">

                            Lịch sử đặt phòng

                        </a>

                        <a href="#" class="block px-5 py-3 hover:bg-gray-100">

                            Khách sạn yêu thích

                        </a>

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button type="submit" class="w-full text-left px-5 py-3 text-red-500 hover:bg-red-50 "> Đăng
                                xuất </button>

                        </form>

                    </div>

                </div>

                @endauth

            </div>

            <!-- Mobile Button -->
            <button id=" menuBtn" class="lg:hidden">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />

                </svg>

            </button>

        </div>

    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden lg:hidden border-t bg-white">

        <div class="flex flex-col p-5 gap-4">

            <a href="{{ route('users.index') }}">Trang chủ</a>

            <a href="{{ route('khachsan.index') }}">Khách sạn</a>

            <a href="{{ route('diadiemdulich.index') }}">Địa điểm du lịch</a>

            <a href="#">Tra cứu đặt phòng</a>

            <a href="#">Tin tức</a>

            <a href="#">Liên hệ</a>

            <hr>

            @guest

            <a href="{{ route('register') }}"
                class="text-center px-5 py-3 rounded-full border border-[#295AB7] text-[#1040C5] font-bold">

                Đăng ký

            </a>

            <a href="{{ route('login') }}" class="text-center px-5 py-3 rounded-full bg-[#1040C5] text-white font-bold">

                Đăng nhập

            </a>

            @endguest

            @auth

            <div class="flex items-center gap-3">

                <img src="{{ Auth::user()->anh_dai_dien ?: asset('images/default-avatar.png') }}"
                    class="w-12 h-12 rounded-full object-cover">

                <div>

                    <p class="font-bold">
                        {{ Auth::user()->ten }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ Auth::user()->email }}
                    </p>

                </div>

            </div>

            <a href="#">Hồ sơ cá nhân</a>

            <a href="#">Lịch sử đặt phòng</a>

            <a href="#">Khách sạn yêu thích</a>

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button class="text-left text-red-500">

                    Đăng xuất

                </button>

            </form>

            @endauth

        </div>

    </div>

</nav>

<script>
const btn = document.getElementById('menuBtn');
const menu = document.getElementById('mobileMenu');

if (btn) {

    btn.addEventListener('click', () => {

        menu.classList.toggle('hidden');

    });

}

const userBtn = document.getElementById('userMenuBtn');
const userDropdown = document.getElementById('userDropdown');

if (userBtn) {

    userBtn.addEventListener('click', function(e) {

        e.stopPropagation();

        userDropdown.classList.toggle('hidden');

    });

    document.addEventListener('click', function() {

        userDropdown.classList.add('hidden');

    });

}
</script>