<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-6">

    <!-- Tổng người dùng -->
    <div class="bg-white rounded-2xl shadow p-5">

        <div class="flex items-center gap-4">

            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">

                <i class="fa-solid fa-users text-blue-600 text-xl"></i>

            </div>

            <div>

                <p class="text-gray-500 text-sm">

                    Tổng người dùng

                </p>

                <h3 class="text-2xl font-bold mt-1">

                    {{ $tongNguoiDung }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Đang hoạt động -->
    <div class="bg-white rounded-2xl shadow p-5">

        <div class="flex items-center gap-4">

            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">

                <i class="fa-solid fa-user-check text-green-600 text-xl"></i>

            </div>

            <div>

                <p class="text-gray-500 text-sm">

                    Đang hoạt động

                </p>

                <h3 class="text-2xl font-bold text-green-600 mt-1">

                    {{ $dangHoatDong }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Đã khóa -->
    <div class="bg-white rounded-2xl shadow p-5">

        <div class="flex items-center gap-4">

            <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">

                <i class="fa-solid fa-user-lock text-red-600 text-xl"></i>

            </div>

            <div>

                <p class="text-gray-500 text-sm">

                    Đã khóa

                </p>

                <h3 class="text-2xl font-bold text-red-600 mt-1">

                    {{ $biKhoa }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Nút thêm -->
    <div class="flex items-center h-full">

        <a href="{{ route('admin.nguoidung.create') }}"
            class="w-full h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full text-sm font-semibold flex items-center justify-center gap-2 transition">

            <i class="fa-solid fa-plus"></i>

            Thêm người dùng

        </a>

    </div>

</div>