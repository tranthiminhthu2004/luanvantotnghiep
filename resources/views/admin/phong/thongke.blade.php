<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-5 mb-6">

    <!-- Tổng phòng -->
    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-5">

        <div class="flex items-center gap-4">

            <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                <i class="fa-solid fa-bed text-blue-600 text-xl md:text-2xl"></i>

            </div>

            <div>

                <p class="text-base text-black">

                    Tổng phòng

                </p>

                <h3 class="text-2xl md:text-3xl font-bold text-[#061755] mt-1">

                    {{ $tongPhong }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Đang hoạt động -->
    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-5">

        <div class="flex items-center gap-4">

            <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                <i class="fa-solid fa-circle-check text-green-600 text-xl md:text-2xl"></i>

            </div>

            <div>

                <p class="text-base text-black">

                    Đang hoạt động

                </p>

                <h3 class="text-2xl md:text-3xl font-bold text-green-600 mt-1">

                    {{ $phongDangHoatDong }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Bảo trì -->
    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-5">

        <div class="flex items-center gap-4">

            <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-yellow-100 flex items-center justify-center">

                <i class="fa-solid fa-screwdriver-wrench text-yellow-600 text-xl md:text-2xl"></i>

            </div>

            <div>

                <p class="text-base text-black">

                    Bảo trì

                </p>

                <h3 class="text-2xl md:text-3xl font-bold text-yellow-600 mt-1">

                    {{ $phongBaoTri }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Ngưng hoạt động -->
    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-5">

        <div class="flex items-center gap-4">

            <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-red-100 flex items-center justify-center">

                <i class="fa-solid fa-ban text-red-600 text-xl md:text-2xl"></i>

            </div>

            <div>

                <p class="text-base text-black">

                    Ngưng hoạt động

                </p>

                <h3 class="text-2xl md:text-3xl font-bold text-red-600 mt-1">

                    {{ $phongNgungHoatDong }}

                </h3>

            </div>

        </div>

    </div>

</div>