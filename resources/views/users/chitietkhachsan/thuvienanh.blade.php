<div>

    {{-- Tên khách sạn --}}
    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-3 text-[#061755]">

        {{ $khachSan->ten_khach_san }}

    </h1>

    {{-- Thông tin --}}
    <div class="flex flex-col lg:flex-row lg:items-center gap-3 lg:gap-5 mb-5">

        <div class="flex">

            @for($i = 1; $i <= $khachSan->so_sao_khach_san; $i++)

                <i class="fa-solid fa-star text-yellow-400"></i>

                @endfor

        </div>

        <span class="text-gray-500">

            {{ $khachSan->thanh_pho }}

        </span>

        <span class="text-gray-500">

            <i class="fa-solid fa-location-dot text-red-500"></i>

            {{ $khachSan->dia_chi }}

        </span>

    </div>

    {{-- Thư viện ảnh --}}
    @if($khachSan->hinhAnh->count())

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-3">

        {{-- Ảnh lớn --}}
        <div class="lg:col-span-6">

            <img src="{{ asset($khachSan->hinhAnh->first()->duong_dan_anh) }}"
                class="w-full h-[250px] md:h-[350px] lg:h-[420px] rounded-xl object-cover">

        </div>

        {{-- Ảnh nhỏ --}}
        <div class="lg:col-span-6 grid grid-cols-2 gap-3">

            @foreach($khachSan->hinhAnh->skip(1)->take(4) as $anh)

            <img src="{{ asset($anh->duong_dan_anh) }}"
                class="w-full h-[150px] md:h-[180px] lg:h-[200px] rounded-xl object-cover">

            @endforeach

        </div>

    </div>

    @else

    <img src="{{ asset('images/no-image.jpg') }}" class="w-full h-[350px] rounded-xl object-cover">

    @endif

</div>