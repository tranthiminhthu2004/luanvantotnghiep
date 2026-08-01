<div
    class="bg-white rounded-2xl border overflow-hidden flex flex-col lg:flex-row shadow-sm hover:shadow-lg transition min-h-[260px]">

    {{-- Ảnh khách sạn --}}
    @if($khachSan->hinhAnh->count())

    <img src="{{ asset($khachSan->hinhAnh->first()->duong_dan_anh) }}"
        class="w-full lg:w-[350px] h-[260px] object-cover flex-shrink-0">

    @else

    <img src="{{ asset('images/no-image.jpg') }}" class="w-full lg:w-[350px] h-[260px] object-cover flex-shrink-0">

    @endif

    {{-- Nội dung --}}
    <div class="flex-1 p-5 flex flex-col">

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
            <p class="text-gray-500 mt-1 line-clamp-2">

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
        <div class="mt-auto pt-5">

            <a href="{{ route('khachsan.show', [
                'id' => $khachSan->ma_khach_san,
                'so_nguoi_truong_thanh' => request('so_nguoi_truong_thanh'),
                'so_tre_em' => request('so_tre_em'),
                'so_nguoi_cao_tuoi' => request('so_nguoi_cao_tuoi'),
                'ngay_nhan_phong' => request('ngay_nhan_phong'),
                'ngay_tra_phong' => request('ngay_tra_phong'),
                'so_luong_phong' => request('so_luong_phong'),
            ]) }}"
                class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full font-semibold transition">

                Xem chi tiết

            </a>

        </div>

    </div>

</div>