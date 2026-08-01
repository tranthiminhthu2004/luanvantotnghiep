<section class="mt-12">

    <div class="flex items-center justify-between mb-6">

        <div>

            <h2 class="text-3xl font-bold text-[#061755]">

                Khách sạn gần đây

            </h2>

            <p class="text-gray-500 mt-2">

                Danh sách các khách sạn gần điểm du lịch này.

            </p>

        </div>

    </div>

    @if($khachSans->isEmpty())

    <div class="bg-white rounded-3xl border border-dashed border-slate-300 p-10 text-center">

        <div class="w-20 h-20 rounded-full bg-blue-50 text-[#1040C5] flex items-center justify-center mx-auto">

            <i class="fa-solid fa-hotel text-3xl"></i>

        </div>

        <h3 class="text-2xl font-bold text-slate-700 mt-5">

            Chưa có khách sạn

        </h3>

        <p class="text-gray-500 mt-2">

            Hiện tại chưa có khách sạn nào gần điểm du lịch này.

        </p>

    </div>

    @else

    <div class="swiper khachSanGanDaySwiper">

        <div class="swiper-wrapper">

            @foreach($khachSans as $khachSan)

            @php

            $anhKhachSan = asset('images/khachsan.jpg');

            if (
            $khachSan->hinhAnh &&
            $khachSan->hinhAnh->count() > 0 &&
            $khachSan->hinhAnh->first()->duong_dan_anh
            ) {

            $anhKhachSan = asset(
            $khachSan->hinhAnh->first()->duong_dan_anh
            );

            }

            $giaThapNhat = $khachSan->loaiPhongs->min('gia_co_ban');

            @endphp

            <div class="swiper-slide h-full">

                <div
                    class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-lg transition flex flex-col h-full">

                    <div class="h-56 overflow-hidden">

                        <img src="{{ $anhKhachSan }}" alt="{{ $khachSan->ten_khach_san }}"
                            class="w-full h-full object-cover hover:scale-105 transition duration-500">

                    </div>

                    <div class="p-5 flex flex-col flex-1">

                        <div class="flex justify-between items-start">

                            <h3 class="text-xl font-bold text-[#061755] line-clamp-2">

                                {{ $khachSan->ten_khach_san }}

                            </h3>

                            <span class="text-yellow-500 text-sm whitespace-nowrap">

                                {{ $khachSan->so_sao_khach_san }}

                                <i class="fa-solid fa-star"></i>

                            </span>

                        </div>

                        <p class="text-gray-500 text-sm mt-3 flex items-start gap-2 line-clamp-2 min-h-[48px]">

                            <i class="fa-solid fa-location-dot text-[#1040C5] mt-1"></i>

                            <span>

                                {{ $khachSan->dia_chi }}

                            </span>

                        </p>

                        <p class="text-sm text-[#1040C5] mt-3 font-medium">

                            <i class="fa-solid fa-route"></i>

                            Cách điểm du lịch

                            <strong>

                                {{ number_format($khachSan->khoang_cach_km,2) }} km

                            </strong>

                        </p>

                        <div class="mt-auto pt-5">

                            <span class="text-sm text-gray-500">

                                Giá từ

                            </span>

                            <div class="text-2xl font-bold text-red-600">

                                @if($giaThapNhat)

                                {{ number_format($giaThapNhat) }} đ

                                @else

                                Liên hệ

                                @endif

                            </div>

                        </div>

                        <a href="{{ route('khachsan.show', $khachSan->ma_khach_san) }}"
                            class="mt-5 inline-flex items-center justify-center w-full bg-[#1040C5] hover:bg-blue-700 text-white rounded-xl py-3 font-semibold transition">

                            Xem chi tiết

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        <div class="swiper-button-prev khachSanGanDayPrev"></div>

        <div class="swiper-button-next khachSanGanDayNext"></div>

    </div>

    @endif

</section>