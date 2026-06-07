<nav class="bg-white shadow-sm">

    <div class="max-w-7xl mx-auto px-0">

        <div class="flex items-center justify-between h-24">

            <!-- Logo -->
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-auto w-40 -ml-64 ">

            <ul class="hidden lg:flex items-center justify-center gap-5 text-xl font-bold">

                <li class="gap-4">
                    <a href="#" class="hover:text-blue-600 text-[#061755]">
                        Trang chủ
                    </a>
                </li>

                <li class="gap-4">
                    <a href="#" class="hover:text-blue-600 target:">
                        Khách sạn
                    </a>
                </li>

                <li class="gap-4">
                    <a href="#" class="hover:text-blue-600 text-[#061755]">
                        Địa điểm du lịch
                    </a>
                </li>

                <li class="gap-4">
                    <a href="#" class="hover:text-blue-600 text-[#061755]">
                        Ưu đãi
                    </a>
                </li>

                <li class="gap-4">
                    <a href="#" class="hover:text-blue-600 text-[#061755]">
                        Tra cứu đặt phòng
                    </a>
                </li>

                <li class="gap-4">
                    <a href="#" class="hover:text-blue-600 text-[#061755]">
                        Tin tức
                    </a>
                </li>

                <li class="gap-4">
                    <a href="#" class="hover:text-blue-600 text-[#061755]">
                        Liên hệ
                    </a>
                </li>

            </ul>

            <!-- Desktop Buttons -->
            <div class="hidden lg:flex items-center gap-8 -mr-64">

                <button
                    class="px-5 py-3 rounded-full border text-xl border-[#295AB7] text-[#1040C5] font-bold hover:bg-blue-50">

                    <a href="{{ route('register') }}"> Đăng ký</a>

                </button>

                <button class="px-5 py-3 rounded-full text-xl bg-[#1040C5] text-white font-bold  hover:bg-blue-700">

                    <a href="{{ route('login') }}">Đăng nhập</a>

                </button>

            </div>

            <!-- Mobile Menu Icon -->
            <button id="menuBtn" class="lg:hidden">

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

            <a href="#">Trang chủ</a>

            <a href="#">Khách sạn</a>

            <a href="#">Địa điểm du lịch</a>

            <a href="#">Ưu đãi</a>

            <a href="#">Tra cứu đặt phòng</a>

            <a href="#">Tin tức</a>

            <a href="#">Liên hệ</a>

            <hr>

            <button
                class="px-5 py-3 rounded-full border text-xl border-[#295AB7] text-[#1040C5] font-bold hover:bg-blue-50">

                <a href="{{ route('register') }}"> Đăng ký</a>

            </button>

            <button class="px-5 py-3 rounded-full text-xl bg-[#1040C5] text-white font-bold  hover:bg-blue-700">

                <a href="{{ route('login') }}">Đăng nhập</a>

            </button>

        </div>

    </div>

</nav>

<script>
const btn = document.getElementById('menuBtn');
const menu = document.getElementById('mobileMenu');

btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
});
</script>