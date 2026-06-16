<div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-6">

    <!-- Tổng tiện nghi -->
    <div class="bg-white rounded-3xl shadow p-5">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">

                <i class="fa-solid fa-gift text-xl"></i>

            </div>

            <div>

                <p class="text-gray-500">
                    Tổng tiện nghi
                </p>

                <h3 class="text-3xl font-bold">

                    {{ $tongTienNghi }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Hoạt động -->
    <div class="bg-white rounded-3xl shadow p-5">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-full bg-green-100 text-green-600 flex items-center justify-center">

                <i class="fa-solid fa-circle-check text-xl"></i>

            </div>

            <div>

                <p class="text-gray-500">
                    Hoạt động
                </p>

                <h3 class="text-3xl font-bold">

                    {{ $tienNghiHoatDong }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Tạm dừng -->
    <div class="bg-white rounded-3xl shadow p-5">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-full bg-red-100 text-red-600 flex items-center justify-center">

                <i class="fa-solid fa-ban text-xl"></i>

            </div>

            <div>

                <p class="text-gray-500">
                    Tạm dừng
                </p>

                <h3 class="text-3xl font-bold">

                    {{ $tienNghiTamDung }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Nút thêm -->
    <div class=" rounded-3xl  p-5 flex items-center justify-center">

        <a href="{{route('admin.tiennghi.create')}}"
            class="w-full text-lg h-14 bg-blue-600 hover:bg-blue-700 text-white rounded-full font-semibold flex items-center justify-center gap-3 transition">

            <i class="fa-solid fa-plus"></i>

            Thêm tiện nghi

        </a>


    </div>

</div>