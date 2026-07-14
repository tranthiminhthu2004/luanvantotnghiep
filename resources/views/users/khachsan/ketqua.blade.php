<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm khách sạn</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <div class="pt-24">

        {{-- Search --}}
        @include('users.khachsan.search')

        <section class="max-w-7xl mx-auto px-4 py-8">

            <div class="flex flex-col lg:flex-row gap-6">

                {{-- Sidebar --}}
                @include('users.khachsan.boloc')

                {{-- Nội dung --}}
                <div class="flex-1 min-w-0">

                    {{-- Kết quả khách sạn --}}
                    <div class="mb-10">

                        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-5">

                            <div>

                                <h1 class="text-3xl font-bold text-[#061755] mt-2">

                                    Tìm thấy {{ $khachSans->total() }} khách sạn phù hợp

                                </h1>

                            </div>

                        </div>

                        {{-- Danh sách khách sạn --}}
                        <div class="space-y-5">

                            @forelse($khachSans as $khachSan)

                            @include('users.khachsan.thekhachsan')

                            @empty

                            <div class="bg-white rounded-3xl border shadow-sm p-12 text-center">

                                <div
                                    class="w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center mx-auto">

                                    <i class="fa-solid fa-hotel text-3xl text-slate-400"></i>

                                </div>

                                <h3 class="text-2xl font-bold text-slate-700 mt-5">

                                    Không tìm thấy khách sạn

                                </h3>

                                <p class="text-gray-500 mt-2">

                                    Vui lòng thử địa điểm khác hoặc thay đổi điều kiện tìm kiếm.

                                </p>

                            </div>

                            @endforelse

                        </div>

                        {{-- Phân trang --}}
                        @if($khachSans->hasPages())

                        <div class="mt-8">

                            {{ $khachSans->links() }}

                        </div>

                        @endif

                    </div>

                    {{-- ĐỊA ĐIỂM DU LỊCH --}}
                    @if(isset($diaDiemDuLichs))

                    <div class="mb-6">

                        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-6">

                            <div>

                                <h2 class="text-2xl lg:text-3xl font-bold text-[#061755] mt-2">

                                    Địa điểm du lịch

                                </h2>


                            </div>

                            <p class="text-gray-500 font-semibold whitespace-nowrap">

                                {{ $diaDiemDuLichs->count() }} địa điểm

                            </p>

                        </div>

                        @if($diaDiemDuLichs->count() > 0)

                        <div id="danhSachDiaDiemDuLichKhachSan"
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-3 gap-5">

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
                                class="dia-diem-du-lich-khach-san-item {{ $index >= 4 ? 'hidden' : '' }} bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition">

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

                                        <a href="#"
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

                            <button type="button" id="btnXemTatCaDiaDiemDuLichKhachSan"
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

                    @endif

                </div>

            </div>

        </section>

    </div>
    @include('components.footer')

    <script>
    document.addEventListener('DOMContentLoaded', function() {

        const btnXemTatCa =
            document.getElementById('btnXemTatCaDiaDiemDuLichKhachSan');

        if (!btnXemTatCa) {
            return;
        }

        btnXemTatCa.addEventListener('click', function() {

            document
                .querySelectorAll('.dia-diem-du-lich-khach-san-item.hidden')
                .forEach(function(item) {

                    item.classList.remove('hidden');

                });

            btnXemTatCa.remove();

        });

    });
    </script>

</body>

</html>