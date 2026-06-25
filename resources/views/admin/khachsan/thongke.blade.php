<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">

    <!-- Tổng khách sạn -->
    <div class="bg-white rounded-2xl p-4 shadow-sm">

        <div class="flex items-center gap-3">

            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">

                <i class="fa-solid fa-hotel text-blue-600 text-xl"></i>

            </div>

            <div>

                <p class="text-black text-sm">
                    Tổng khách sạn
                </p>

                <h3 class="text-2xl font-bold mt-1">
                    {{ $tongKhachSan }}
                </h3>

            </div>

        </div>

    </div>

    <!-- Đang hoạt động -->
    <div class="bg-white rounded-2xl p-4 shadow-sm">

        <div class="flex items-center gap-3">

            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">

                <i class="fa-solid fa-circle-check text-green-600 text-xl"></i>

            </div>

            <div>

                <p class="text-black text-sm">
                    Đang hoạt động
                </p>

                <h3 class="text-2xl font-bold text-green-600 mt-1">
                    {{ $dangHoatDong }}
                </h3>

            </div>

        </div>

    </div>

    <!-- Tạm dừng -->
    <div class="bg-white rounded-2xl p-4 shadow-sm">

        <div class="flex items-center gap-3">

            <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">

                <i class="fa-solid fa-pause text-yellow-500 text-xl"></i>

            </div>

            <div>

                <p class="text-black text-sm">
                    Tạm dừng hoạt động
                </p>

                <h3 class="text-2xl font-bold text-yellow-500 mt-1">
                    {{ $tamDung }}
                </h3>

            </div>

        </div>

    </div>

    <!-- Nút thêm -->
    <div class="flex items-center">

        <a href="{{ route('admin.khachsan.create') }}"
            class="w-full h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full font-semibold text-sm flex items-center justify-center gap-2 transition">

            <i class="fa-solid fa-plus"></i>

            Thêm khách sạn

        </a>

    </div>

</div>