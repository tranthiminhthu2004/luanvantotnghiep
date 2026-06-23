<div class="bg-white rounded-2xl shadow p-6">

    <h2 class="text-2xl font-bold mb-5">
        Thông tin khách sạn
    </h2>

    <div class="flex gap-5">

        <img src="{{ $khachSan->hinhAnh->count()
                ? asset($khachSan->hinhAnh->first()->duong_dan_anh)
                : asset('images/hotel-default.jpg') }}" class="w-40 h-32 rounded-xl object-cover">

        <div>

            <h3 class="text-xl font-bold">
                {{ $khachSan->ten_khach_san }}
            </h3>

            <div class="text-yellow-500 mt-2">
                @for($i = 1; $i <= $khachSan->so_sao_khach_san; $i++)
                    ⭐
                    @endfor
            </div>

            <div class="text-black mt-2 ">
                <i class="fa-solid fa-location-dot mr-2 text-red-700"></i>
                {{ $khachSan->dia_chi }}
            </div>

            <div class="text-gray-500 mt-1">
                {{ $khachSan->diaDiem->ten_dia_diem ?? '' }}
            </div>

        </div>

    </div>

</div>