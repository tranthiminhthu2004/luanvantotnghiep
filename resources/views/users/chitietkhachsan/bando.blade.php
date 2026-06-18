<div class="bg-white rounded-xl shadow p-5">

    <h2 class="font-bold text-xl mb-4">

        Vị trí khách sạn

    </h2>

    @if($khachSan->vi_do && $khachSan->kinh_do)

    <iframe src="https://maps.google.com/maps?q={{ $khachSan->vi_do }},{{ $khachSan->kinh_do }}&z=15&output=embed"
        class="w-full h-[350px] rounded-xl" style="border:0;" loading="lazy">
    </iframe>

    <div class="mt-4 text-sm text-gray-500">

        <i class="fa-solid fa-location-dot text-red-500"></i>

        {{ $khachSan->dia_chi }}

    </div>

    @else

    <div class="h-[350px] flex items-center justify-center text-gray-500">

        Khách sạn chưa cập nhật tọa độ

    </div>

    @endif

</div>