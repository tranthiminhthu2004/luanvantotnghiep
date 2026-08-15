<div id="sidebar"
    class="fixed lg:static top-0 left-0 z-50 w-64 min-h-screen bg-gradient-to-b from-[#001845] to-[#001233] text-white flex flex-col overflow-x-hidden transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

    <!-- Header -->
    <div class="border-b border-blue-900 flex items-center justify-between px-3 py-2">

        <img src="{{ asset('images/logodb.png') }}" alt="Logo" class="w-40 mx-auto">

        <button id="closeSidebar" class="lg:hidden text-lg p-2">

            <i class="fa-solid fa-xmark"></i>

        </button>

    </div>

    <!-- Menu -->
    <nav class="flex-1 py-4 overflow-y-auto overflow-x-hidden">

        <!-- Quản lý -->
        <p class="px-4 mt-5 mb-2 text-[11px] uppercase tracking-widest text-gray-400">

            Quản lý

        </p>

        <!-- Khách sạn -->
        <a href="{{ route('doitac.khachsan.index') }}" class="mx-3 flex items-center gap-3 rounded-full px-4 py-2 text-sm transition
            {{ request()->routeIs('doitac.khachsan.*') ? 'bg-blue-800' : 'hover:bg-blue-900' }}">

            <i class="fa-solid fa-hotel w-4"></i>

            Khách sạn của tôi

        </a>

        <!-- Tài khoản -->
        <p class="px-4 mt-6 mb-2 text-[11px] uppercase tracking-widest text-gray-400">

            Tài khoản

        </p>

        <!-- Hồ sơ -->
        <a href="{{ route('doitac.hoso.index') }}" class="mx-3 flex items-center gap-3 rounded-full px-4 py-2 text-sm transition
    {{ request()->routeIs('doitac.hoso.*') ? 'bg-blue-800' : 'hover:bg-blue-900' }}">

            <i class="fa-solid fa-user w-4"></i>

            Hồ sơ

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
</script>