<section class="mt-14">

    <div class="mb-8">

        <h2 class="text-4xl font-bold text-[#061755]">

            Khách sạn tại {{ $diaDiem->ten_dia_diem }}

        </h2>

        <p class="mt-2 text-slate-500">

            Danh sách khách sạn đang hoạt động tại địa điểm này.

        </p>

    </div>

    @if($diaDiem->khachSans->count())

    <div class="swiper khachSanSwiper">

        <div class="swiper-wrapper">

            @foreach($diaDiem->khachSans as $khachSan)

            @php

            $anh = $khachSan->hinhAnh->first();

            $giaThapNhat = $khachSan->loaiPhongs->min('gia_co_ban');

            @endphp

            <div
                class="swiper-slide bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-lg transition">

                {{-- Ảnh --}}
                <div class="h-44 bg-slate-100 overflow-hidden">

                    @if($anh)

                    <img src="{{ asset($anh->duong_dan_anh) }}" class="w-full h-full object-cover">

                    @else

                    <div class="w-full h-full flex items-center justify-center">

                        <i class="fa-regular fa-image text-5xl text-slate-300"></i>

                    </div>

                    @endif

                </div>

                {{-- Nội dung --}}
                <div class="p-5">

                    <h3 class="text-lg font-bold text-[#061755]">

                        {{ $khachSan->ten_khach_san }}

                    </h3>

                    {{-- Sao --}}
                    <div class="mt-3">

                        @for($i = 1; $i <= 5; $i++) @if($i <=$khachSan->so_sao_khach_san)

                            <i class="fa-solid fa-star text-yellow-400"></i>

                            @else

                            <i class="fa-regular fa-star text-slate-300"></i>

                            @endif

                            @endfor

                    </div>

                    {{-- Giá --}}
                    <div class="mt-4">

                        @if($giaThapNhat)

                        <p class="text-[#1040C5] font-bold text-lg">

                            Từ {{ number_format($giaThapNhat,0,',','.') }} đ / đêm

                        </p>

                        @else

                        <p class="text-slate-400">

                            Chưa cập nhật giá

                        </p>

                        @endif

                    </div>

                    {{-- Button --}}
                    <div class="mt-6">

                        <a href="{{ route('khachsan.show', [
                            'id' => $khachSan->ma_khach_san,
                            'so_nguoi_truong_thanh' => request('so_nguoi_truong_thanh'),
                            'so_tre_em' => request('so_tre_em'),
                            'so_nguoi_cao_tuoi' => request('so_nguoi_cao_tuoi'),
                            'ngay_nhan_phong' => request('ngay_nhan_phong'),
                            'ngay_tra_phong' => request('ngay_tra_phong'),
                            'so_luong_phong' => request('so_luong_phong'),
                        ]) }}"
                            class="w-full inline-flex justify-center items-center bg-[#1040C5] hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">

                            Xem chi tiết

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        <div class="swiper-button-prev"></div>

        <div class="swiper-button-next"></div>

    </div>

    @else

    <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center">

        <i class="fa-solid fa-hotel text-6xl text-slate-300"></i>

        <p class="mt-5 text-slate-500">

            Hiện chưa có khách sạn.

        </p>

    </div>

    @endif

</section>