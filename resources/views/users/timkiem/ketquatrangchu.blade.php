<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <div class="pt-24">
        @include('users.trangchu.search')
    </div>

    {{-- NỘI DUNG KẾT QUẢ --}}
    <main>

        <section class="max-w-7xl mx-auto px-4 lg:px-8 py-4">

            {{-- ĐỊA ĐIỂM DU LỊCH --}}
            <div class="mb-14">

                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-6">

                    <div>

                        <h2 class="text-3xl lg:text-4xl font-bold text-[#061755] mt-2">
                            Địa điểm du lịch tại khu vực này
                        </h2>

                    </div>

                    <p class="text-gray-500 font-semibold whitespace-nowrap">

                        {{ isset($diaDiemDuLichs) ? $diaDiemDuLichs->count() : 0 }} địa điểm

                    </p>

                </div>

                @if(isset($diaDiemDuLichs) && $diaDiemDuLichs->count() > 0)

                <div id="danhSachDiaDiemDuLich"
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

                    @foreach($diaDiemDuLichs as $index => $diaDiemDuLich)

                    @php
                    $anhDiaDiem = asset('images/diadiemdulich.png');

                    if (
                    $diaDiemDuLich->hinhAnhs &&
                    $diaDiemDuLich->hinhAnhs->count() > 0
                    ) {
                    $duongDanAnh = $diaDiemDuLich->hinhAnhs->first()->duong_dan_anh;

                    if ($duongDanAnh) {
                    $anhDiaDiem = asset($duongDanAnh);
                    }
                    }
                    @endphp

                    <div
                        class="dia-diem-du-lich-item {{ $index >= 4 ? 'hidden' : '' }} bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition">

                        <div class="h-44 overflow-hidden bg-slate-100">

                            <img src="{{ $anhDiaDiem }}" alt="{{ $diaDiemDuLich->ten_dia_diem }}"
                                class="w-full h-full object-cover hover:scale-105 transition duration-500">

                        </div>

                        <div class="p-4">

                            <div class="flex items-center gap-2 text-xs text-[#1040C5] font-semibold mb-2">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    {{ $diaDiemDuLich->diaDiem->ten_dia_diem ?? '' }}
                                </span>

                            </div>

                            <h3 class="text-lg font-bold text-[#061755] line-clamp-1">

                                {{ $diaDiemDuLich->ten_dia_diem }}

                            </h3>

                            <p class="text-gray-500 text-sm mt-2 leading-6 line-clamp-2">

                                {{ $diaDiemDuLich->mo_ta ?? 'Địa điểm du lịch phù hợp để tham quan trong chuyến đi của bạn.' }}

                            </p>

                            @if(!empty($diaDiemDuLich->dia_chi))

                            <p class="text-sm text-gray-500 mt-3 flex items-start gap-2 line-clamp-1">

                                <i class="fa-solid fa-map-pin mt-1 text-[#1040C5]"></i>

                                <span>
                                    {{ $diaDiemDuLich->dia_chi }}
                                </span>

                            </p>

                            @endif
                            <div class="mt-4">

                                <a href="{{ route('diemden.show', $diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                    class="inline-flex items-center justify-center gap-2 w-full bg-[#1040C5] hover:bg-blue-700 text-white rounded-xl py-2.5 text-sm font-semibold transition">

                                    Xem chi tiết



                                </a>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

                @if($diaDiemDuLichs->count() > 4)

                <div class="mt-6 flex justify-center">

                    <button type="button" id="btnXemTatCaDiaDiemDuLich"
                        class="inline-flex items-center gap-2 text-[#1040C5] font-bold hover:underline">

                        Xem tất cả địa điểm

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>

                </div>

                @endif

                @else

                <div class="bg-white rounded-3xl border border-dashed border-slate-300 p-10 text-center">

                    <div
                        class="w-20 h-20 rounded-full bg-blue-50 text-[#1040C5] flex items-center justify-center mx-auto">

                        <i class="fa-solid fa-map-location-dot text-3xl"></i>

                    </div>

                    <h3 class="text-2xl font-bold text-slate-700 mt-5">

                        Chưa có địa điểm du lịch phù hợp

                    </h3>

                    <p class="text-gray-500 mt-2">

                        Điểm đến này hiện chưa có dữ liệu địa điểm du lịch trong hệ thống.

                    </p>

                </div>

                @endif

            </div>
            {{-- KHÁCH SẠN --}}
            <div>

                <div class="flex items-end justify-between gap-4 mb-6">

                    <div>


                        <h2 class="text-3xl lg:text-4xl font-bold text-[#061755] mt-2">

                            Khách sạn ở khu vực này

                        </h2>


                    </div>

                    <p class="text-gray-500 font-semibold whitespace-nowrap">

                        Tìm thấy {{ isset($khachSans) ? $khachSans->total() : 0 }} khách sạn

                    </p>

                </div>

                @if(isset($khachSans) && $khachSans->count() > 0)

                <div class="flex gap-5 overflow-x-auto pb-4 scroll-smooth">

                    @foreach($khachSans as $khachSan)

                    @php
                    $anhKhachSan = null;

                    if ($khachSan->hinhAnh && $khachSan->hinhAnh->count() > 0) {
                    $tenAnh = $khachSan->hinhAnh->first()->duong_dan_anh;

                    if ($tenAnh) {
                    if (filter_var($tenAnh, FILTER_VALIDATE_URL)) {
                    $anhKhachSan = $tenAnh;
                    } elseif (str_starts_with($tenAnh, 'images/')) {
                    $anhKhachSan = asset($tenAnh);
                    } else {
                    $anhKhachSan = asset('images/khachsan/' . $tenAnh);
                    }
                    }
                    }

                    $giaThapNhat = $khachSan->loaiPhongs->min('gia_co_ban');
                    @endphp

                    <a href="{{ route('khachsan.show', [ $khachSan->ma_khach_san, 'ngay_nhan_phong' => request('ngay_nhan_phong'), 'ngay_tra_phong' => request('ngay_tra_phong'), 'so_nguoi_truong_thanh' => request('so_nguoi_truong_thanh'), 'so_tre_em' => request('so_tre_em'), 'so_nguoi_cao_tuoi' => request('so_nguoi_cao_tuoi'), ]) }}"
                        class="min-w-[260px] md:min-w-[310px] bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition block">

                        <div class="h-44 overflow-hidden bg-slate-100 relative">

                            @if($anhKhachSan)

                            <img src="{{ $anhKhachSan }}" alt="{{ $khachSan->ten_khach_san }}"
                                class="w-full h-full object-cover hover:scale-105 transition duration-500">

                            @else

                            <div class="w-full h-full flex items-center justify-center text-gray-400">

                                <i class="fa-solid fa-hotel text-4xl"></i>

                            </div>

                            @endif

                        </div>

                        <div class="p-4">

                            <h3 class="text-lg font-bold text-[#061755] line-clamp-1">

                                {{ $khachSan->ten_khach_san }}

                            </h3>

                            <p class="text-sm text-gray-500 mt-2 line-clamp-1">

                                <i class="fa-solid fa-location-dot text-red-500 mr-1"></i>

                                {{ $khachSan->dia_chi }}

                            </p>

                            <div class="mt-3 flex items-center gap-1 text-yellow-400">

                                @for($i = 1; $i <= (int) $khachSan->so_sao_khach_san; $i++)

                                    <i class="fa-solid fa-star text-sm"></i>

                                    @endfor

                            </div>

                            <div class="mt-4 flex items-end justify-between gap-3">

                                <div>

                                    <p class="text-xs text-gray-400">

                                        Giá từ

                                    </p>

                                    <p class="text-[#061755] font-bold text-lg">

                                        @if($giaThapNhat)

                                        {{ number_format($giaThapNhat, 0, ',', '.') }}đ

                                        @else

                                        Đang cập nhật

                                        @endif

                                    </p>

                                </div>

                                <span class="bg-[#1040C5] text-white px-4 py-2 rounded-full text-sm font-semibold">

                                    Xem chi tiết

                                </span>

                            </div>

                        </div>

                    </a>

                    @endforeach

                </div>

                @else

                <div class="bg-white rounded-3xl border border-dashed border-slate-300 p-10 text-center">

                    <div
                        class="w-20 h-20 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">

                        <i class="fa-solid fa-hotel text-3xl"></i>

                    </div>

                    <h3 class="text-2xl font-bold text-slate-700 mt-5">

                        Chưa tìm thấy khách sạn phù hợp

                    </h3>

                    <p class="text-gray-500 mt-2">

                        Bạn có thể thử chọn điểm đến khác hoặc thay đổi điều kiện tìm kiếm.

                    </p>

                </div>

                @endif

            </div>

        </section>

    </main>
    @include('components.footer')

</body>

</html>