<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

    <!-- Tổng tiện nghi -->
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <div class="flex items-center gap-4">

            <div
                class="w-14 h-14 rounded-full bg-blue-100 text-[#061755] flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-gift text-xl"></i>
            </div>

            <div>
                <p class="text-base text-black">
                    Tổng tiện nghi
                </p>

                <h3 class="text-3xl font-bold text-[#061755] mt-1">
                    {{ $tongTienNghi }}
                </h3>
            </div>

        </div>
    </div>

    <!-- Hoạt động -->
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <div class="flex items-center gap-4">

            <div
                class="w-14 h-14 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-circle-check text-xl"></i>
            </div>

            <div>
                <p class="text-base text-black">
                    Hoạt động
                </p>

                <h3 class="text-3xl font-bold text-green-600 mt-1">
                    {{ $tienNghiHoatDong }}
                </h3>
            </div>

        </div>
    </div>

    <!-- Tạm dừng -->
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-full bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-ban text-xl"></i>
            </div>

            <div>
                <p class="text-base text-black">
                    Tạm dừng
                </p>

                <h3 class="text-3xl font-bold text-red-600 mt-1">
                    {{ $tienNghiTamDung }}
                </h3>
            </div>

        </div>
    </div>

    <!-- Nút thêm -->
    <div class="p-5 flex items-center justify-center">

        <a href="{{ route('admin.tiennghi.create') }}"
            class="w-full py-3 bg-blue-700 hover:bg-blue-600 text-white rounded-full text-base font-semibold flex items-center justify-center gap-2 transition">

            <i class="fa-solid fa-plus"></i>

            Thêm tiện nghi

        </a>

    </div>

</div>