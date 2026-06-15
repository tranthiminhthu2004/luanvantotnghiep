<div class="bg-white rounded-2xl border overflow-hidden flex flex-col lg:flex-row shadow-sm hover:shadow-lg transition">

    {{-- Ảnh khách sạn --}}
    @if($khachSan->hinhAnh->count())

    <img src="{{ asset($khachSan->hinhAnh->first()->duong_dan_anh) }}"
        class="w-full lg:w-[350px] h-[250px] lg:h-auto object-cover">

    @else

    <img src="{{ asset('images/no-image.jpg') }}" class="w-full lg:w-[350px] h-[250px] lg:h-auto object-cover">

    @endif

    {{-- Nội dung --}}
    <div class="flex-1 p-5 flex flex-col justify-between">

        <div>

            {{-- Tên khách sạn --}}
            <h2 class="text-xl lg:text-2xl font-bold text-slate-800">

                {{ $khachSan->ten_khach_san }}

            </h2>

            {{-- Thành phố --}}
            <p class="mt-2 text-gray-600 flex items-center gap-2">

                <i class="fa-solid fa-location-dot text-red-500"></i>

                {{ $khachSan->thanh_pho }}

            </p>

            {{-- Địa chỉ --}}
            <p class="text-gray-500 mt-1">

                {{ $khachSan->dia_chi }}

            </p>

            {{-- Số sao --}}
            <div class="flex items-center gap-2 mt-3 flex-wrap">

                @for($i = 1; $i <= $khachSan->so_sao_khach_san; $i++)

                    <i class="fa-solid fa-star text-yellow-400"></i>

                    @endfor

                    <span class="text-gray-500 text-sm">

                        {{ $khachSan->so_sao_khach_san }} sao

                    </span>

            </div>

            {{-- Trạng thái --}}
            <div class="mt-3">

                @if($khachSan->trang_thai)

                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">

                    Đang hoạt động

                </span>

                @else

                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">

                    Tạm dừng

                </span>

                @endif

            </div>

        </div>

        {{-- Nút xem chi tiết --}}
        <div class="mt-5">

            <a href="{{ route('khachsan.show',$khachSan->ma_khach_san) }}"
                class="w-full lg:w-auto justify-center bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-full inline-flex items-center gap-2">

                <i class="fa-solid fa-eye"></i>

                Xem chi tiết

            </a>

        </div>

    </div>

</div>