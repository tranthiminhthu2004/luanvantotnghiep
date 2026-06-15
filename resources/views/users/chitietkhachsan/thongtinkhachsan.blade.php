<div class="bg-white rounded-xl shadow p-5 mb-5">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

        {{-- Giới thiệu --}}
        <div>

            <h2 class="font-bold text-xl mb-4">

                Giới thiệu

            </h2>

            <p class="text-gray-600 leading-8">

                {{ $khachSan->mo_ta ?: 'Khách sạn chưa cập nhật mô tả.' }}

            </p>

            <div class="mt-5 space-y-2">

                <p>

                    <i class="fa-solid fa-location-dot text-red-500"></i>

                    {{ $khachSan->dia_chi }}

                </p>

                <p>

                    <i class="fa-solid fa-city text-blue-500"></i>

                    {{ $khachSan->thanh_pho }}

                </p>

                <p>

                    <i class="fa-solid fa-phone text-green-500"></i>

                    {{ $khachSan->so_dien_thoai ?: 'Chưa cập nhật' }}

                </p>

                <p>

                    <i class="fa-solid fa-envelope text-orange-500"></i>

                    {{ $khachSan->email ?: 'Chưa cập nhật' }}

                </p>

            </div>

        </div>

        {{-- Tiện nghi --}}
        <div>

            <h2 class="font-bold text-xl mb-4">

                Tiện nghi nổi bật

            </h2>

            <div class="bg-slate-50 rounded-xl p-4 text-gray-500">

                Chưa cập nhật tiện nghi.

            </div>

        </div>

    </div>

</div>