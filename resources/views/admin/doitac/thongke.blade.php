<div class="grid grid-cols-1 lg:grid-cols-4 gap-5 mb-6">

    <!-- Tổng khách sạn đăng ký -->
    <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">

                <i class="fa-solid fa-hotel text-2xl"></i>

            </div>

            <div>

                <p class="text-black text-base">
                    Tổng khách sạn đăng ký
                </p>

                <h3 class="text-3xl font-bold text-[#061755] mt-1">
                    {{ $tongHoSo }}
                </h3>

            </div>

        </div>

    </div>

    <!-- Chờ duyệt -->
    <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center shrink-0">

                <i class="fa-solid fa-hourglass-half text-2xl"></i>

            </div>

            <div>

                <p class="text-black text-base">
                    Chờ duyệt
                </p>

                <h3 class="text-3xl font-bold text-[#061755] mt-1">
                    {{ $choDuyet }}
                </h3>

            </div>

        </div>

    </div>

    <!-- Đã duyệt -->
    <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center shrink-0">

                <i class="fa-solid fa-circle-check text-2xl"></i>

            </div>

            <div>

                <p class="text-black text-base">
                    Đã duyệt
                </p>

                <h3 class="text-3xl font-bold text-[#061755] mt-1">
                    {{ $daDuyet }}
                </h3>

            </div>

        </div>

    </div>

    <!-- Từ chối -->
    <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center shrink-0">

                <i class="fa-solid fa-circle-xmark text-2xl"></i>

            </div>

            <div>

                <p class="text-black text-base">
                    Từ chối
                </p>

                <h3 class="text-3xl font-bold text-[#061755] mt-1">
                    {{ $tuChoi }}
                </h3>

            </div>

        </div>

    </div>

</div>