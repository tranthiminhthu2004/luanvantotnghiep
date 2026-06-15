<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

    <!-- Tổng phòng -->
    <div class="bg-white rounded-3xl shadow p-5">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

                <i class="fa-solid fa-bed text-2xl"></i>

            </div>

            <div>

                <h3 class="text-gray-500">
                    Tổng phòng
                </h3>

                <p class="text-3xl font-bold text-[#061755] mt-1">
                    {{ $tongPhong }}
                </p>

            </div>

        </div>

    </div>

    <!-- Đang hoạt động -->
    <div class="bg-white rounded-3xl shadow p-5">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">

                <i class="fa-solid fa-circle-check text-2xl"></i>

            </div>

            <div>

                <h3 class="text-gray-500">
                    Đang hoạt động
                </h3>

                <p class="text-3xl font-bold text-green-600 mt-1">
                    {{ $phongDangHoatDong }}
                </p>

            </div>

        </div>

    </div>

    <!-- Bảo trì -->
    <div class="bg-white rounded-3xl shadow p-5">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center">

                <i class="fa-solid fa-screwdriver-wrench text-2xl"></i>

            </div>

            <div>

                <h3 class="text-gray-500">
                    Bảo trì
                </h3>

                <p class="text-3xl font-bold text-yellow-600 mt-1">
                    {{ $phongBaoTri }}
                </p>

            </div>

        </div>

    </div>

    <!-- Ngưng hoạt động -->
    <div class="bg-white rounded-3xl shadow p-5">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">

                <i class="fa-solid fa-ban text-2xl"></i>

            </div>

            <div>

                <h3 class="text-gray-500">
                    Ngưng hoạt động
                </h3>

                <p class="text-3xl font-bold text-red-600 mt-1">
                    {{ $phongNgungHoatDong }}
                </p>

            </div>

        </div>

    </div>

</div>