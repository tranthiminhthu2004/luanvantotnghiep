<div id="sidebar"
    class="fixed lg:static top-0 left-0 z-50 w-60 min-h-screen bg-gradient-to-b from-[#001845] to-[#001233] text-white flex flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

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
        <a href="{{ route('dashboard') }}" class="mx-3 mb-2 flex items-center gap-3 rounded-full text-sm px-4 py-2 font-medium transition
            {{ request()->routeIs('dashboard') ? 'bg-blue-800' : 'hover:bg-blue-900' }}">

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
                class="w-full flex items-center justify-between px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

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

                <!-- Danh sách khách sạn -->
                <a href="{{ route('admin.khachsan.index') }}" class="block px-4 py-2 text-sm rounded-full transition
                    {{ request()->routeIs('admin.khachsan.*')
                    ? 'bg-blue-800'
                    : 'hover:bg-blue-900' }}">

                    <i class="fa-solid fa-building text-blue-300"></i>

                    Danh sách khách sạn

                </a>

                <!-- Loại phòng -->
                <a href="{{ route('admin.loaiphong.index') }}" class="block px-4 py-2 text-sm rounded-full transition
                    {{ request()->routeIs('admin.loaiphong.*')
                    ? 'bg-blue-800'
                    : 'hover:bg-blue-900' }}">

                    <i class="fa-solid fa-bed text-yellow-300"></i>

                    Loại phòng

                </a>

                <!-- Phòng -->
                <a href="{{ route('admin.phong.index') }}" class="block px-4 py-2 text-sm rounded-full transition
                    {{ request()->routeIs('admin.phong.*')
                    ? 'bg-blue-800'
                    : 'hover:bg-blue-900' }}">

                    <i class="fa-solid fa-door-open text-green-300"></i>

                    Phòng

                </a>

            </div>

        </div>
        <!-- Đối tác -->
        <div class="mx-2">

            <button id="doiTacMenuBtn"
                class="w-full flex items-center justify-between px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-handshake w-4"></i>
                    <span>Đối tác</span>
                </div>

                <i id="doiTacIcon" class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300"></i>

            </button>

            <div id="doiTacSubMenu" class="{{ request()->routeIs('admin.doitac.*') ? '' : 'hidden' }}
        ml-6 mt-1 space-y-1">

                <a href="{{ route('admin.doitac.index') }}" class="block px-4 py-2 text-sm rounded-full transition
            {{ request()->routeIs('admin.doitac.*')
                ? 'bg-blue-800'
                : 'hover:bg-blue-900' }}">

                    <i class="fa-solid fa-file-signature text-cyan-300"></i>

                    Hồ sơ gửi duyệt

                </a>

            </div>

        </div>
        <!-- Tiện nghi -->
        <a href="{{ route('admin.tiennghi.index') }}" class="mx-2 flex items-center gap-3 px-4 py-2 text-sm rounded-full transition
            {{ request()->routeIs('admin.tiennghi.*')
            ? 'bg-blue-800'
            : 'hover:bg-blue-900' }}">

            <i class="fa-solid fa-gift w-4"></i>

            Tiện nghi

        </a>

        <!-- Địa điểm -->
        <div class="mx-2">

            <button id="diaDiemMenuBtn"
                class="w-full flex items-center justify-between px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

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

                <!-- Địa điểm khách sạn -->
                <a href="{{ route('admin.diadiem.index') }}" class="block px-4 py-2 text-sm rounded-full transition
                    {{ request()->routeIs('admin.diadiem.*')
                    ? 'bg-blue-800'
                    : 'hover:bg-blue-900' }}">

                    <i class="fa-solid fa-hotel text-blue-300"></i>

                    Địa điểm khách sạn

                </a>

                <!-- Địa điểm du lịch -->
                <a href="{{ route('admin.diadiemdulich.index') }}" class="block px-4 py-2 text-sm rounded-full transition
                    {{ request()->routeIs('admin.diadiemdulich.*')
                    ? 'bg-blue-800'
                    : 'hover:bg-blue-900' }}">

                    <i class="fa-solid fa-map-location-dot text-green-300"></i>

                    Địa điểm du lịch

                </a>

            </div>

        </div>

        <!-- Nhu cầu -->
        <div class="mx-2">

            <button id="nhuCauMenuBtn"
                class="w-full flex items-center justify-between px-4 py-2 text-sm rounded-full hover:bg-blue-900 transition">

                <div class="flex items-center gap-3">

                    <i class="fa-solid fa-compass w-4"></i>

                    <span>Nhu cầu</span>

                </div>

                <i id="nhuCauIcon" class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300"></i>

            </button>

            <div id="nhuCauSubMenu" class="{{ request()->routeIs('admin.nhucaudulich.*')
                || request()->routeIs('admin.diadiemnhucau.*')
                ? ''
                : 'hidden' }}
                ml-6 mt-1 space-y-1">

                <!-- Nhu cầu du lịch -->
                <a href="{{ route('admin.nhucaudulich.index') }}" class="block px-4 py-2 text-sm rounded-full transition
                    {{ request()->routeIs('admin.nhucaudulich.*')
                    ? 'bg-blue-800'
                    : 'hover:bg-blue-900' }}">

                    <i class="fa-solid fa-heart text-pink-300"></i>

                    Nhu cầu du lịch

                </a>

                <!-- Gán nhu cầu cho điểm đến -->
                <a href="{{ route('admin.diadiemnhucau.index') }}" class="block px-4 py-2 text-sm rounded-full transition
                    {{ request()->routeIs('admin.diadiemnhucau.*')
                    ? 'bg-blue-800'
                    : 'hover:bg-blue-900' }}">

                    <i class="fa-solid fa-link text-green-300"></i>

                    Gán nhu cầu cho điểm đến

                </a>

            </div>

        </div>
        <!-- Đặt phòng -->
        <a href="{{ route('admin.datphong.index') }}" class="mx-2 flex items-center gap-3 px-4 py-2 text-sm rounded-full transition
            {{ request()->routeIs('admin.datphong.*')
            ? 'bg-blue-800'
            : 'hover:bg-blue-900' }}">

            <i class="fa-solid fa-calendar-check w-4"></i>

            Đặt phòng

        </a>

        <!-- Người dùng -->
        <a href="{{ route('admin.nguoidung.index') }}" class="mx-2 flex items-center gap-3 px-4 py-2 text-sm rounded-full transition
            {{ request()->routeIs('admin.nguoidung.*')
            ? 'bg-blue-800'
            : 'hover:bg-blue-900' }}">

            <i class="fa-solid fa-users w-4"></i>

            Người dùng

        </a>

        <!-- Cài đặt -->
        <p class="px-4 mt-6 mb-2 text-[11px] text-gray-400 uppercase tracking-widest">
            Cài đặt
        </p>

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

function toggleMenu(buttonId, menuId, iconId) {

    const button = document.getElementById(buttonId);
    const menu = document.getElementById(menuId);
    const icon = document.getElementById(iconId);

    if (!button || !menu || !icon) return;

    button.addEventListener('click', () => {

        menu.classList.toggle('hidden');

        icon.classList.toggle('rotate-180');

    });

}

toggleMenu(
    'khachSanMenuBtn',
    'khachSanSubMenu',
    'khachSanIcon'
);

toggleMenu(
    'diaDiemMenuBtn',
    'diaDiemSubMenu',
    'diaDiemIcon'
);

toggleMenu(
    'nhuCauMenuBtn',
    'nhuCauSubMenu',
    'nhuCauIcon'
);

toggleMenu(
    'doiTacMenuBtn',
    'doiTacSubMenu',
    'doiTacIcon'
);
</script>