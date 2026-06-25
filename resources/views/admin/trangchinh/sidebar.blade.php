<div id="sidebar" class="fixed lg:static top-0 left-0 z-50
    w-60 min-h-screen
    bg-gradient-to-b from-[#001845] to-[#001233]
    text-white
    flex flex-col
    transform -translate-x-full lg:translate-x-0
    transition-transform duration-300 ease-in-out">

    <!-- Header -->
    <div class="border-b border-blue-900 flex items-center justify-between px-3 py-2">

        <img src="{{ asset('images/logodb.png') }}" alt="Logo" class="w-40 mx-auto">

        <button id="closeSidebar" class="lg:hidden text-lg p-2">

            <i class="fa-solid fa-xmark"></i>

        </button>

    </div>

    <!-- Menu -->
    <nav class="flex-1 py-4 overflow-y-auto">

        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" class="mx-3 mb-2 flex items-center gap-3 rounded-full text-sm px-4 py-2 font-medium hover:bg-blue-900 transition
        {{ request()->routeIs('dashboard') ? 'bg-blue-900' : '' }}">

            <i class="fa-solid fa-house w-4"></i>

            Dashboard

        </a>

        <!-- Quản lý -->
        <p class="px-4 mt-5 mb-2 text-[11px] text-gray-400 uppercase tracking-widest">
            Quản lý
        </p>

        <!-- Khách sạn -->
        <div class="mx-2">

            <button id="khachSanMenuBtn"
                class="w-full flex items-center justify-between px-4 py-2 text-sm hover:bg-blue-900 rounded-full transition">

                <div class="flex items-center gap-3">

                    <i class="fa-solid fa-hotel w-4"></i>

                    <span>Khách sạn</span>

                </div>

                <i id="khachSanIcon" class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300"></i>

            </button>

            <div id="khachSanSubMenu" class="{{ request()->routeIs('admin.khachsan.*')
            || request()->routeIs('admin.loaiphong.*')
            || request()->routeIs('admin.phong.*')
            ? ''
            : 'hidden' }}
            ml-6 mt-1 space-y-1">

                <a href="{{ route('admin.khachsan.index') }}"
                    class="block px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

                    <i class="fa-solid fa-building text-blue-300"></i>

                    Danh sách khách sạn

                </a>

                <a href="{{ route('admin.loaiphong.index') }}"
                    class="block px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

                    <i class="fa-solid fa-bed text-yellow-300"></i>

                    Loại phòng

                </a>

                <a href="{{ route('admin.phong.index') }}"
                    class="block px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

                    <i class="fa-solid fa-door-open text-green-300"></i>

                    Phòng

                </a>

            </div>

        </div>

        <!-- Tiện nghi -->
        <a href="{{ route('admin.tiennghi.index') }}" class="mx-2 flex items-center gap-3 px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition
        {{ request()->routeIs('admin.tiennghi.*') ? 'bg-blue-900' : '' }}">

            <i class="fa-solid fa-gift w-4"></i>

            Tiện nghi

        </a>

        <!-- Địa điểm -->
        <div class="mx-2">

            <button id="diaDiemMenuBtn"
                class="w-full flex items-center justify-between px-4 py-2 text-sm hover:bg-blue-900 rounded-full transition">

                <div class="flex items-center gap-3">

                    <i class="fa-solid fa-location-dot w-4"></i>

                    <span>Địa điểm</span>

                </div>

                <i id="diaDiemIcon" class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300"></i>

            </button>

            <div id="diaDiemSubMenu" class="{{ request()->routeIs('admin.diadiem.*')
            || request()->routeIs('admin.diadiemdulich.*')
            ? ''
            : 'hidden' }}
            ml-6 mt-1 space-y-1">

                <a href="{{ route('admin.diadiem.index') }}"
                    class="block px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

                    <i class="fa-solid fa-hotel text-blue-300"></i>

                    Địa điểm khách sạn

                </a>

                <a href="#" class="block px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

                    <i class="fa-solid fa-map-location-dot text-green-300"></i>

                    Địa điểm du lịch

                </a>

            </div>

        </div>

        <!-- Đặt phòng -->
        <a href="{{ route('admin.datphong.index') }}"
            class="mx-2 flex items-center gap-3 px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

            <i class="fa-solid fa-calendar-check w-4"></i>

            Đặt phòng

        </a>

        <!-- Người dùng -->
        <a href="{{ route('admin.nguoidung.index') }}"
            class="mx-2 flex items-center gap-3 px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

            <i class="fa-solid fa-users w-4"></i>

            Người dùng

        </a>

        <!-- Đánh giá -->
        <a href="#" class="mx-2 flex items-center gap-3 px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

            <i class="fa-solid fa-star w-4"></i>

            Đánh giá

        </a>

        <!-- Thống kê -->
        <p class="px-4 mt-6 mb-2 text-[11px] text-gray-400 uppercase tracking-widest">
            Thống kê
        </p>

        <a href="#" class="mx-2 flex items-center gap-3 px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

            <i class="fa-solid fa-chart-column w-4"></i>

            Báo cáo

        </a>

        <a href="#" class="mx-2 flex items-center gap-3 px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

            <i class="fa-solid fa-chart-line w-4"></i>

            Thống kê

        </a>

        <!-- Cài đặt -->
        <p class="px-4 mt-6 mb-2 text-[11px] text-gray-400 uppercase tracking-widest">
            Cài đặt
        </p>

        <a href="#" class="mx-2 flex items-center gap-3 px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

            <i class="fa-solid fa-gear w-4"></i>

            Cài đặt hệ thống

        </a>

        <a href="#" class="mx-2 flex items-center gap-3 px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

            <i class="fa-solid fa-user-shield w-4"></i>

            Phân quyền

        </a>

        <!-- Đăng xuất -->
        <form method="POST" action="{{ route('logout') }}" class="mx-2 mt-2">

            @csrf

            <button type="submit" onclick="return confirm('Bạn có muốn đăng xuất không?')"
                class="w-full flex items-center gap-3 px-4 py-2 text-sm rounded-full hover:bg-red-600 transition text-left">

                <i class="fa-solid fa-right-from-bracket w-4"></i>

                Đăng xuất

            </button>

        </form>

    </nav>

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