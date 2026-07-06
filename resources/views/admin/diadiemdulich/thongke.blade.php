<div class="grid grid-cols-1 lg:grid-cols-4 gap-5 mb-6">

    <!-- Tổng địa điểm du lịch -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-5 flex items-center">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">

                <i class="fa-solid fa-map-location-dot text-2xl"></i>

            </div>

            <div>

                <p class="text-base text-black">

                    Tổng địa điểm du lịch

                </p>

                <h3 class="text-3xl font-bold text-[#061755] mt-1">

                    {{ $tongDiaDiemDuLich }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Nút thêm -->
    <div class="lg:col-span-2 flex items-center">

        <a href="{{ route('admin.diadiemdulich.create') }}"
            class="w-full bg-[#061755] hover:bg-[#0b277a] text-white rounded-xl py-3 text-base font-semibold flex items-center justify-center gap-3 transition">

            <i class="fa-solid fa-plus"></i>

            Thêm địa điểm du lịch

        </a>

    </div>

</div>