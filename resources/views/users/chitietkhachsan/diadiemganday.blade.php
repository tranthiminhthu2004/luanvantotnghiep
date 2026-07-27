<div class="bg-white rounded-xl shadow p-5 mb-5">

    <div class="flex items-end justify-between mb-5">

        <h2 class="text-2xl font-bold text-[#061755]">

            Địa điểm gần đây

        </h2>

        <p class="text-gray-500 font-semibold">

            {{ $diaDiemDuLichs->count() }} địa điểm

        </p>

    </div>

    @if($diaDiemDuLichs->count() > 0)

    <div id="danhSachDiaDiemGanDay" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

        @foreach($diaDiemDuLichs as $index => $diaDiem)

        @php

        $anhDiaDiem = asset('images/diadiemdulich.png');

        if (
        $diaDiem->hinhAnhs &&
        $diaDiem->hinhAnhs->count() > 0
        ) {

        $duongDanAnh =
        $diaDiem
        ->hinhAnhs
        ->first()
        ->duong_dan_anh;

        if ($duongDanAnh) {

        $anhDiaDiem =
        asset($duongDanAnh);

        }

        }

        @endphp

        <div class="dia-diem-item {{ $index >= 6 ? 'hidden' : '' }}
                    bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition">

            <div class="h-44 overflow-hidden bg-slate-100">

                <img src="{{ $anhDiaDiem }}" alt="{{ $diaDiem->ten_dia_diem }}"
                    class="w-full h-full object-cover hover:scale-105 transition duration-500">

            </div>

            <div class="p-4">

                <div class="flex items-center justify-between mb-2">

                    <span class="flex items-center gap-2 text-xs font-semibold text-[#1040C5]">

                        <i class="fa-solid fa-location-dot"></i>

                        {{ $diaDiem->diaDiem->ten_dia_diem ?? '' }}

                    </span>

                    <span class="text-xs font-bold text-green-600">

                        {{ number_format($diaDiem->khoang_cach_km,1) }}
                        km

                    </span>

                </div>

                <h3 class="text-lg font-bold text-[#061755] line-clamp-1">

                    {{ $diaDiem->ten_dia_diem }}

                </h3>

                <p class="text-gray-500 text-sm mt-2 leading-6 line-clamp-2">

                    {{ $diaDiem->mo_ta ?? 'Địa điểm du lịch phù hợp để tham quan.' }}

                </p>

                @if(!empty($diaDiem->dia_chi))

                <p class="text-sm text-gray-500 mt-3 flex items-start gap-2 line-clamp-1">

                    <i class="fa-solid fa-map-pin mt-1 text-[#1040C5]"></i>

                    <span>

                        {{ $diaDiem->dia_chi }}

                    </span>

                </p>

                @endif

                <div class="mt-4">

                    <a href="{{ route('diemden.show',$diaDiem->ma_dia_diem_du_lich) }}"
                        class="inline-flex items-center justify-center w-full bg-[#1040C5] hover:bg-blue-700 text-white rounded-xl py-2.5 text-sm font-semibold transition">

                        Xem chi tiết

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    @if($diaDiemDuLichs->count() > 6)

    <div class="mt-6 flex justify-center">

        <button type="button" id="btnXemTatCaDiaDiemGanDay"
            class="inline-flex items-center gap-2 text-[#1040C5] font-bold hover:underline">

            Xem tất cả địa điểm

            <i class="fa-solid fa-arrow-right"></i>

        </button>

    </div>

    @endif

    @else

    <div class="bg-white rounded-3xl border border-dashed border-slate-300 p-10 text-center">

        <div class="w-20 h-20 rounded-full bg-blue-50 text-[#1040C5] flex items-center justify-center mx-auto">

            <i class="fa-solid fa-map-location-dot text-3xl"></i>

        </div>

        <h3 class="text-2xl font-bold text-slate-700 mt-5">

            Chưa có địa điểm gần khách sạn

        </h3>

        <p class="text-gray-500 mt-2">

            Hiện tại chưa có địa điểm du lịch nào gần khách sạn này.

        </p>

    </div>

    @endif

</div>