<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-6 gap-6 mb-6">

    <!-- Tổng đơn -->
    <div class="bg-white rounded-2xl p-5 shadow">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center">

                <i class="fa-solid fa-calendar-check text-blue-600 text-2xl"></i>

            </div>

            <div>

                <p class="text-black text-base">
                    Tổng đơn đặt phòng
                </p>

                <h3 class="text-3xl font-bold mt-1">
                    {{ $tongDon }}
                </h3>

            </div>

        </div>

    </div>

    <!-- Chờ xác nhận -->
    <div class="bg-white rounded-2xl p-5 shadow">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-full bg-yellow-100 flex items-center justify-center">

                <i class="fa-solid fa-clock text-yellow-500 text-2xl"></i>

            </div>

            <div>

                <p class="text-black text-base">
                    Chờ xác nhận
                </p>

                <h3 class="text-3xl font-bold text-yellow-500 mt-1">
                    {{ $choXacNhan }}
                </h3>

            </div>

        </div>

    </div>

    <!-- Đã xác nhận -->
    <div class="bg-white rounded-2xl p-5 shadow">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">

                <i class="fa-solid fa-circle-check text-green-600 text-2xl"></i>

            </div>

            <div>

                <p class="text-black text-base">
                    Đã xác nhận
                </p>

                <h3 class="text-3xl font-bold text-green-600 mt-1">
                    {{ $daXacNhan }}
                </h3>

            </div>

        </div>

    </div>

    <!-- Hoàn thành -->
    <div class="bg-white rounded-2xl p-5 shadow">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-full bg-purple-100 flex items-center justify-center">

                <i class="fa-solid fa-check-double text-purple-600 text-2xl"></i>

            </div>

            <div>

                <p class="text-black text-base">
                    Hoàn thành
                </p>

                <h3 class="text-3xl font-bold text-purple-600 mt-1">
                    {{ $hoanThanh }}
                </h3>

            </div>

        </div>

    </div>

    <!-- Đã hủy -->
    <div class="bg-white rounded-2xl p-5 shadow">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center">

                <i class="fa-solid fa-ban text-red-600 text-2xl"></i>

            </div>

            <div>

                <p class="text-black text-base">
                    Đã hủy
                </p>

                <h3 class="text-3xl font-bold text-red-600 mt-1">
                    {{ $daHuy }}
                </h3>

            </div>

        </div>

    </div>

    <!-- Không đến -->
    <div class="bg-white rounded-2xl p-5 shadow">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-full bg-orange-100 flex items-center justify-center">

                <i class="fa-solid fa-user-xmark text-orange-600 text-2xl"></i>

            </div>

            <div>

                <p class="text-black text-base">
                    Không đến
                </p>

                <h3 class="text-3xl font-bold text-orange-600 mt-1">
                    {{ $khongDen }}
                </h3>

            </div>

        </div>

    </div>

</div>