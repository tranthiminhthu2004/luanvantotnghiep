<div id="sidebar" class="fixed lg:static top-0 left-0 z-50
    w-64 min-h-screen
    bg-gradient-to-b from-[#001845] to-[#001233]
    text-white
    flex flex-col
    transform -translate-x-full lg:translate-x-0
    transition-transform duration-300 ease-in-out">

    <!-- Header -->
    <div class="border-b border-blue-900 flex justify-between">

        <div>
            <img src="{{ asset('images/logodb.png') }}" alt="Logo" class="w-52 rounded-lg">
        </div>

        <!-- Nút đóng mobile -->
        <button id="closeSidebar" class="lg:hidden text-xl p-4">
            <i class="fa-solid fa-xmark"></i>
        </button>

    </div>

    <!-- Menu -->
    <nav class="flex-1 py-6 overflow-y-auto">

        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" class="mx-3 mb-2 flex items-center gap-3 rounded-full text-lg px-4 py-3 font-medium hover:bg-blue-900 transition
    {{ request()->routeIs('dashboard') ? 'bg-blue-900' : '' }}">

            <i class="fa-solid fa-house"></i>
            Dashboard

        </a>

        <!-- Quản lý -->
        <p class="px-6 mt-6 mb-3 text-gray-400 tracking-wider text-sm">
            QUẢN LÝ
        </p>

        <!-- KHÁCH SẠN -->
        <div class="mx-2">

            <button id="khachSanMenuBtn"
                class="w-full flex items-center justify-between px-4 py-3 hover:bg-blue-900 rounded-full transition">

                <div class="flex items-center gap-3">

                    <i class="fa-solid fa-hotel w-5"></i>

                    <span>Khách sạn</span>

                </div>

                <i id="khachSanIcon" class="fa-solid fa-chevron-down text-xs transition-transform duration-300"></i>

            </button>

            <div id="khachSanSubMenu" class="
                {{ request()->routeIs('admin.khachsan.*')
                || request()->routeIs('admin.loaiphong.*')
                || request()->routeIs('admin.phong.*')
                ? ''
                : 'hidden' }}

                ml-8 mt-2 space-y-1">

                <a href="{{route('admin.khachsan.index') }}"
                    class="block px-4 py-2 rounded-full hover:bg-blue-900 transition">
                    <i class="fa-solid fa-building text-blue-300"></i>
                    Danh sách khách sạn

                </a>


                <a href="{{route('admin.loaiphong.index')}}"
                    class="block px-4 py-2 rounded-full hover:bg-blue-900 transition">
                    <i class="fa-solid fa-bed text-yellow-300"></i>
                    Loại phòng

                </a>

                <a href="{{ route('admin.phong.index')}}"
                    class="block px-4 py-2 rounded-full hover:bg-blue-900 transition">
                    <i class="fa-solid fa-door-open text-green-300"></i>
                    Phòng

                </a>

            </div>

        </div>
        <!-- Tiện nghi -->
        <a href="{{ route('admin.tiennghi.index') }}" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full
    {{ request()->routeIs('admin.tiennghi.*') ? 'bg-blue-900 rounded-full' : '' }}">

            <i class="fa-solid fa-gift w-5"></i>

            Tiện nghi

        </a>
        <!-- ĐỊA ĐIỂM -->
        <div class="mx-2">

            <button id="diaDiemMenuBtn"
                class="w-full flex items-center justify-between px-4 py-3 hover:bg-blue-900 rounded-full transition">

                <div class="flex items-center gap-3">

                    <i class="fa-solid fa-location-dot w-5"></i>

                    <span>Địa điểm</span>

                </div>

                <i id="diaDiemIcon" class="fa-solid fa-chevron-down text-xs transition-transform duration-300"></i>

            </button>

            <div id="diaDiemSubMenu" class="
        {{ request()->routeIs('admin.diadiem.*')
        || request()->routeIs('admin.diadiemdulich.*')
        ? ''
        : 'hidden' }}

        ml-8 mt-2 space-y-1">

                <a href="{{ route('admin.diadiem.index') }}"
                    class="block px-4 py-2 rounded-full hover:bg-blue-900 transition">

                    <i class="fa-solid fa-hotel text-blue-300"></i>

                    Địa điểm khách sạn

                </a>

                <a href="#" class="block px-4 py-2 rounded-full hover:bg-blue-900 transition">

                    <i class="fa-solid fa-map-location-dot text-green-300"></i>

                    Địa điểm du lịch

                </a>

            </div>

        </div>
        <!-- Đặt phòng -->
        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full">

            <i class="fa-solid fa-calendar-check w-5"></i>
            Đặt phòng

        </a>

        <!-- Người dùng -->
        <a href="{{route('admin.nguoidung.index')}}"
            class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full">

            <i class="fa-solid fa-users w-5"></i>
            Người dùng

        </a>

        <!-- Đánh giá -->
        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full">

            <i class="fa-solid fa-star w-5"></i>
            Đánh giá

        </a>

        <!-- Thống kê -->
        <p class="px-6 mt-8 mb-3 text-xs text-gray-400 uppercase tracking-wider">
            THỐNG KÊ
        </p>

        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full">

            <i class="fa-solid fa-chart-column w-5"></i>
            Báo cáo

        </a>

        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full">

            <i class="fa-solid fa-chart-line w-5"></i>
            Thống kê

        </a>

        <!-- Cài đặt -->
        <p class="px-6 mt-8 mb-3 text-xs text-gray-400 uppercase tracking-wider">
            CÀI ĐẶT
        </p>

        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full">

            <i class="fa-solid fa-gear w-5"></i>
            Cài đặt hệ thống

        </a>

        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full">

            <i class="fa-solid fa-user-shield w-5"></i>
            Phân quyền

        </a>

        <!-- Đăng xuất -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" onclick="return confirm('Bạn có muốn đăng xuất không?')"
                class="w-full flex items-center gap-3 px-6 py-3 hover:bg-red-600 hover:rounded-full transition text-left">

                <i class="fa-solid fa-right-from-bracket"></i>

                Đăng xuất

            </button>

        </form>

    </nav>

    <!-- Footer -->
    <div class="p-4 border-t border-blue-900">

        <div class="flex items-center gap-3">

            <img src="https://ui-avatars.com/api/?name=Admin" class="w-10 h-10 rounded-full">

            <div>

                <h3 class="font-semibold">
                    Admin
                </h3>

                <p class="text-xs text-gray-300">
                    Quản trị viên
                </p>

            </div>

        </div>

    </div>

</div>

<script>
const closeSidebar = document.getElementById('closeSidebar');
const sidebar = document.getElementById('sidebar');

if (closeSidebar) {

    closeSidebar.addEventListener('click', () => {

        sidebar.classList.add('-translate-x-full');

    });

}

const khachSanMenuBtn =
    document.getElementById('khachSanMenuBtn');

const khachSanSubMenu =
    document.getElementById('khachSanSubMenu');

const khachSanIcon =
    document.getElementById('khachSanIcon');

if (khachSanMenuBtn) {

    khachSanMenuBtn.addEventListener('click', () => {

        khachSanSubMenu.classList.toggle('hidden');

        khachSanIcon.classList.toggle('rotate-180');

    });

}
const diaDiemMenuBtn =
    document.getElementById('diaDiemMenuBtn');

const diaDiemSubMenu =
    document.getElementById('diaDiemSubMenu');

const diaDiemIcon =
    document.getElementById('diaDiemIcon');

if (diaDiemMenuBtn) {

    diaDiemMenuBtn.addEventListener('click', () => {

        diaDiemSubMenu.classList.toggle('hidden');

        diaDiemIcon.classList.toggle('rotate-180');

    });

}
</script>