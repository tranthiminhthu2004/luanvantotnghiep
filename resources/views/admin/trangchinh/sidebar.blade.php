<div id="sidebar" class="fixed lg:static top-0 left-0 z-50
    w-64 min-h-screen
    bg-gradient-to-b from-[#001845] to-[#001233]
    text-white
    flex flex-col
    transform -translate-x-full lg:translate-x-0
    transition-transform duration-300 ease-in-out">

    <!-- Header -->
    <div class=" border-b border-blue-900 flex  justify-between">

        <div>
            <img src="{{ asset('images/logodb.png') }}" alt="Logo" class="w-52 rounded-lg ">
        </div>

        <!-- Nút đóng mobile -->
        <button id="closeSidebar" class="lg:hidden text-xl">
            <i class="fa-solid fa-xmark"></i>
        </button>

    </div>

    <!-- Menu -->
    <nav class="flex-1 py-6 overflow-y-auto ">

        <!-- Dashboard -->
        <a href="{{route('dashboard')}}"
            class="mx-3 mb-2 flex items-center gap-3 rounded-full text-lg  px-4 py-3 font-medium">

            <i class="fa-solid fa-house"></i>
            Dashboard

        </a>

        <!-- Quản lý -->
        <p class="px-6 mt-6 mb-3 text-gray-400 tracking-wider text-sm">
            QUẢN LÝ
        </p>

        <a href="{{route('admin.khachsan.index')}}"
            class=" text-base flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full">

            <i class="fa-solid fa-hotel w-5"></i>
            Khách sạn

        </a>

        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full">

            <i class="fa-solid fa-location-dot w-5"></i>
            Địa điểm du lịch

        </a>

        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full">

            <i class="fa-solid fa-calendar-check w-5"></i>
            Đặt phòng

        </a>

        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full">

            <i class="fa-solid fa-users w-5"></i>
            Người dùng

        </a>

        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full">

            <i class="fa-solid fa-star w-5"></i>
            Đánh giá

        </a>

        <!-- Thống kê -->
        <p class="px-6 mt-8 mb-3 text-xs text-gray-400 uppercase tracking-wider">
            Thống kê
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
            Cài đặt
        </p>

        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition hover:rounded-full">

            <i class="fa-solid fa-gear w-5"></i>
            Cài đặt hệ thống

        </a>

        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-900 transition rounded-full">

            <i class="fa-solid fa-user-shield w-5"></i>
            Phân quyền

        </a>
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
</script>