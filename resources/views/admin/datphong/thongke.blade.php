<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-6 gap-2 mb-6">

    <!-- Tổng đơn -->
    <div class="bg-white rounded-2xl shadow-sm p-4 min-h-[110px]">

        <div class="flex items-center gap-3 h-full">

            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center shrink-0">

                <i class="fa-solid fa-calendar-check text-blue-600 text-xl"></i>

            </div>

            <div class="min-w-0">

                <p class="text-sm text-black leading-4">

                    Tổng đơn đặt phòng

                </p>

                <h3 class="text-2xl font-bold mt-1">

                    {{ $tongDon }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Đã xác nhận -->
    <div class="bg-white rounded-2xl shadow-sm p-4 min-h-[110px]">

        <div class="flex items-center gap-3 h-full">

            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center shrink-0">

                <i class="fa-solid fa-circle-check text-green-600 text-xl"></i>

            </div>

            <div class="min-w-0">

                <p class="text-sm text-black leading-4">

                    Đã xác nhận

                </p>

                <h3 class="text-2xl font-bold text-green-600 mt-1">

                    {{ $daXacNhan }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Đã nhận phòng -->
    <div class="bg-white rounded-2xl shadow-sm p-4 min-h-[110px]">

        <div class="flex items-center gap-3 h-full">

            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center shrink-0">

                <i class="fa-solid fa-bed text-blue-600 text-xl"></i>

            </div>

            <div class="min-w-0">

                <p class="text-sm text-black leading-4">

                    Đã nhận phòng

                </p>

                <h3 class="text-2xl font-bold text-blue-600 mt-1">

                    {{ $daNhanPhong }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Đã trả phòng -->
    <div class="bg-white rounded-2xl shadow-sm p-4 min-h-[110px]">

        <div class="flex items-center gap-3 h-full">

            <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center shrink-0">

                <i class="fa-solid fa-person-walking-luggage text-indigo-600 text-xl"></i>

            </div>

            <div class="min-w-0">

                <p class="text-sm text-black leading-4">

                    Đã trả phòng

                </p>

                <h3 class="text-2xl font-bold text-indigo-600 mt-1">

                    {{ $daTraPhong }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Đã hủy -->
    <div class="bg-white rounded-2xl shadow-sm p-4 min-h-[110px]">

        <div class="flex items-center gap-3 h-full">

            <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center shrink-0">

                <i class="fa-solid fa-ban text-red-600 text-xl"></i>

            </div>

            <div class="min-w-0">

                <p class="text-sm text-black leading-4">

                    Đã hủy

                </p>

                <h3 class="text-2xl font-bold text-red-600 mt-1">

                    {{ $daHuy }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Không đến -->
    <div class="bg-white rounded-2xl shadow-sm p-4 min-h-[110px]">

        <div class="flex items-center gap-3 h-full">

            <div class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center shrink-0">

                <i class="fa-solid fa-user-xmark text-orange-600 text-xl"></i>

            </div>

            <div class="min-w-0">

                <p class="text-sm text-black leading-4">

                    Không đến

                </p>

                <h3 class="text-2xl font-bold text-orange-600 mt-1">

                    {{ $khongDen }}

                </h3>

            </div>

        </div>

    </div>

</div>