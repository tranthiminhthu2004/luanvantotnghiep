<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <div class="pt-24">
        @include('users.trangchu.search')
    </div>

    {{-- NỘI DUNG KẾT QUẢ --}}
    <main>

        <section class="max-w-7xl mx-auto px-4 lg:px-8 py-8">

            {{-- ==================== ĐỊA ĐIỂM DU LỊCH ==================== --}}
            <div class="mb-14">

                <div class="flex items-center justify-between mb-6">

                    <div>

                        <h2 class="text-3xl font-bold text-[#061755]">

                            Địa điểm du lịch tại khu vực này

                        </h2>

                        <p class="text-gray-500 mt-2">

                            Danh sách các địa điểm du lịch thuộc khu vực bạn đang tìm kiếm.

                        </p>

                    </div>

                </div>

                @if(isset($diaDiemDuLichs) && $diaDiemDuLichs->count() > 0)

                <div class="swiper diaDiemDuLichSwiper">

                    <div class="swiper-wrapper">

                        @foreach($diaDiemDuLichs as $diaDiemDuLich)

                        @php

                        $anhDiaDiem = asset('images/diadiemdulich.png');

                        if (
                        $diaDiemDuLich->hinhAnhs &&
                        $diaDiemDuLich->hinhAnhs->count() > 0 &&
                        $diaDiemDuLich->hinhAnhs->first()->duong_dan_anh
                        ) {

                        $anhDiaDiem = asset(
                        $diaDiemDuLich->hinhAnhs->first()->duong_dan_anh
                        );

                        }

                        @endphp

                        <div class="swiper-slide h-full">

                            <div
                                class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-lg transition flex flex-col h-full">

                                <div class="h-56 overflow-hidden">

                                    <img src="{{ $anhDiaDiem }}" alt="{{ $diaDiemDuLich->ten_dia_diem }}"
                                        class="w-full h-full object-cover hover:scale-105 transition duration-500">

                                </div>

                                <div class="p-5 flex flex-col flex-1">

                                    <div class="flex items-center gap-2 text-sm text-[#1040C5] font-medium">

                                        <i class="fa-solid fa-location-dot"></i>

                                        <span>

                                            {{ $diaDiemDuLich->diaDiem->ten_dia_diem ?? '' }}

                                        </span>

                                    </div>

                                    <h3 class="text-xl font-bold text-[#061755] mt-3 line-clamp-2">

                                        {{ $diaDiemDuLich->ten_dia_diem }}

                                    </h3>

                                    <p class="text-gray-500 text-sm mt-3 leading-7 line-clamp-3">

                                        {{ $diaDiemDuLich->mo_ta ?? 'Địa điểm du lịch phù hợp để tham quan trong chuyến đi của bạn.' }}

                                    </p>

                                    @if(!empty($diaDiemDuLich->dia_chi))

                                    <p class="text-sm text-gray-500 mt-3 flex items-start gap-2 line-clamp-2 mb-2">

                                        <i class="fa-solid fa-map-pin text-[#1040C5] mt-1"></i>

                                        <span>

                                            {{ $diaDiemDuLich->dia_chi }}

                                        </span>

                                    </p>

                                    @endif

                                    <a href="{{ route('diemden.show',$diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                        class="mt-auto inline-flex items-center justify-center w-full bg-[#1040C5] hover:bg-blue-700 text-white rounded-xl py-3 font-semibold transition">

                                        Xem chi tiết

                                    </a>

                                </div>

                            </div>

                        </div>

                        @endforeach

                    </div>

                    <div class="swiper-button-prev diaDiemDuLichPrev"></div>

                    <div class="swiper-button-next diaDiemDuLichNext"></div>

                </div>

                @else

                <div class="bg-white rounded-3xl border border-dashed border-slate-300 p-10 text-center">

                    <div
                        class="w-20 h-20 rounded-full bg-blue-50 text-[#1040C5] flex items-center justify-center mx-auto">

                        <i class="fa-solid fa-map-location-dot text-3xl"></i>

                    </div>

                    <h3 class="text-2xl font-bold text-slate-700 mt-5">

                        Chưa có địa điểm du lịch

                    </h3>

                    <p class="text-gray-500 mt-2">

                        Hiện tại chưa có địa điểm du lịch nào thuộc khu vực này.

                    </p>

                </div>

                @endif

            </div>

            {{-- ==================== KHÁCH SẠN ==================== --}}
            <div>

                <div class="flex items-center justify-between mb-6">

                    <div>

                        <h2 class="text-3xl font-bold text-[#061755]">

                            Khách sạn ở khu vực này

                        </h2>

                        <p class="text-gray-500 mt-2">

                            Danh sách các khách sạn phù hợp với điểm đến bạn đã chọn.

                        </p>

                    </div>

                </div>

                @if(isset($khachSans) && $khachSans->count() > 0)

                <div class="swiper khachSanSwiper">

                    <div class="swiper-wrapper">

                        @foreach($khachSans as $khachSan)

                        @php

                        $anhKhachSan = asset('images/khachsan.jpg');

                        if (
                        $khachSan->hinhAnh &&
                        $khachSan->hinhAnh->count() > 0 &&
                        $khachSan->hinhAnh->first()->duong_dan_anh
                        ) {

                        $tenAnh = $khachSan->hinhAnh->first()->duong_dan_anh;

                        if (filter_var($tenAnh, FILTER_VALIDATE_URL)) {

                        $anhKhachSan = $tenAnh;

                        } elseif (str_starts_with($tenAnh,'images/')) {

                        $anhKhachSan = asset($tenAnh);

                        } else {

                        $anhKhachSan = asset('images/khachsan/'.$tenAnh);

                        }

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

                                    <p
                                        class="text-gray-500 text-sm mt-3 flex items-start gap-2 line-clamp-2 min-h-[48px]">

                                        <i class="fa-solid fa-location-dot text-[#1040C5] mt-1"></i>

                                        <span>

                                            {{ $khachSan->dia_chi }}

                                        </span>

                                    </p>

                                    <div class="mt-auto pt-5">

                                        <span class="text-sm text-gray-500">

                                            Giá từ

                                        </span>

                                        <div class="text-2xl font-bold text-red-600">

                                            @if($giaThapNhat)

                                            {{ number_format($giaThapNhat,0,',','.') }} đ

                                            @else

                                            Liên hệ

                                            @endif

                                        </div>

                                    </div>

                                    <a href="{{ route('khachsan.show',[
                            $khachSan->ma_khach_san,
                            'ngay_nhan_phong'=>request('ngay_nhan_phong'),
                            'ngay_tra_phong'=>request('ngay_tra_phong'),
                            'so_nguoi_truong_thanh'=>request('so_nguoi_truong_thanh'),
                            'so_tre_em'=>request('so_tre_em'),
                            'so_nguoi_cao_tuoi'=>request('so_nguoi_cao_tuoi')
                        ]) }}" class="mt-5 inline-flex items-center justify-center w-full bg-[#1040C5] hover:bg-blue-700 text-white rounded-xl py-3 font-semibold transition">

                                        Xem chi tiết

                                    </a>

                                </div>

                            </div>

                        </div>

                        @endforeach

                    </div>

                    <div class="swiper-button-prev khachSanPrev"></div>

                    <div class="swiper-button-next khachSanNext"></div>

                </div>

                @else

                <div class="bg-white rounded-3xl border border-dashed border-slate-300 p-10 text-center">

                    <div
                        class="w-20 h-20 rounded-full bg-blue-50 text-[#1040C5] flex items-center justify-center mx-auto">

                        <i class="fa-solid fa-hotel text-3xl"></i>

                    </div>

                    <h3 class="text-2xl font-bold text-slate-700 mt-5">

                        Chưa có khách sạn

                    </h3>

                    <p class="text-gray-500 mt-2">

                        Hiện tại chưa có khách sạn phù hợp trong khu vực này.

                    </p>

                </div>

                @endif

            </div>

        </section>

    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
    new Swiper(".diaDiemDuLichSwiper", {

        slidesPerView: 1,

        spaceBetween: 24,

        navigation: {

            nextEl: ".diaDiemDuLichNext",

            prevEl: ".diaDiemDuLichPrev",

        },

        breakpoints: {

            640: {

                slidesPerView: 1,

            },

            768: {

                slidesPerView: 2,

            },

            1024: {

                slidesPerView: 3,

            }

        }

    });

    new Swiper(".khachSanSwiper", {

        slidesPerView: 1,

        spaceBetween: 24,

        navigation: {

            nextEl: ".khachSanNext",

            prevEl: ".khachSanPrev",

        },

        breakpoints: {

            640: {

                slidesPerView: 1,

            },

            768: {

                slidesPerView: 2,

            },

            1024: {

                slidesPerView: 3,

            }

        }

    });
    </script>

</body>

</html>