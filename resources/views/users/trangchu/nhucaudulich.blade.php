<section class="max-w-7xl mx-auto px-4 lg:px-8 pt-10 lg:pt-10">

    <div class="mb-8">

        <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-[#061755] leading-tight">

            Chọn điểm đến theo sở thích của bạn

        </h2>

    </div>

    <form method="POST" action="{{ route('goiy.xuly') }}">

        @csrf

        <div id="danhSachNhuCau" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-3 md:gap-4">

            @foreach($nhuCaus as $index => $nhuCau)

            <label class="block cursor-pointer {{ $index >= 10 ? 'nhu-cau-an hidden' : '' }}">

                <input type="checkbox" name="nhu_cau[]" value="{{ $nhuCau->ma_nhu_cau }}" class="peer hidden"
                    {{ isset($nhuCauNguoiDung) && in_array($nhuCau->ma_nhu_cau, $nhuCauNguoiDung) ? 'checked' : '' }}>

                <div class="h-[72px] rounded-2xl border border-slate-200 bg-white px-4 flex items-center justify-center text-center shadow-sm transition
                    hover:shadow-md
                    peer-checked:border-[#1040C5]
                    peer-checked:bg-blue-50
                    peer-checked:ring-2
                    peer-checked:ring-[#1040C5]">

                    <h3 class="font-semibold text-[#061755] text-sm md:text-base leading-5">

                        {{ $nhuCau->ten_nhu_cau }}

                    </h3>

                </div>

            </label>

            @endforeach

        </div>

        @if($nhuCaus->count() > 10)

        <div class="mt-5 flex justify-center">

            <button type="button" id="btnXemTatCaNhuCau" class="text-[#1040C5] font-semibold hover:underline">

                Xem tất cả

            </button>

        </div>

        @endif

        @error('nhu_cau')

        <p class="text-red-500 mt-4 text-sm text-center">

            {{ $message }}

        </p>

        @enderror

        <div class="mt-8 flex justify-center">

            <button type="submit"
                class="bg-[#1040C5] hover:bg-blue-700 text-white px-8 py-3 rounded-full font-semibold transition">

                Gợi ý điểm đến phù hợp

            </button>

        </div>

    </form>
    @if(isset($ketQuaGoiY))

<div class="mt-14">

    <div class="mb-8">

        <p class="text-[#1040C5] font-bold uppercase tracking-wide text-sm">

            Kết quả gợi ý

        </p>

        <h2 class="text-3xl lg:text-4xl font-bold text-[#061755] mt-2">

            Điểm đến phù hợp với bạn

        </h2>

        @if(isset($nhuCauDaChon) && $nhuCauDaChon->count() > 0)

            <div class="mt-4 flex flex-wrap gap-2">

                @foreach($nhuCauDaChon as $nhuCau)

                    <span class="bg-blue-50 text-[#1040C5] px-4 py-2 rounded-full text-sm font-semibold">

                        {{ $nhuCau->ten_nhu_cau }}

                    </span>

                @endforeach

            </div>

        @endif

    </div>

    @if(count($ketQuaGoiY) > 0)

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($ketQuaGoiY as $ketQua)

                @php
                    $diaDiem = $ketQua['dia_diem'];

                    $anhDaiDien = asset('images/diadiem.png');

                    $diaDiemDuLichDauTien = $diaDiem->diaDiemDuLichs->first();

                    if (
                        $diaDiemDuLichDauTien &&
                        $diaDiemDuLichDauTien->hinhAnhs &&
                        $diaDiemDuLichDauTien->hinhAnhs->count() > 0
                    ) {
                        $duongDanAnh = $diaDiemDuLichDauTien->hinhAnhs->first()->duong_dan_anh;

                        if ($duongDanAnh) {
                            $anhDaiDien = asset($duongDanAnh);
                        }
                    }
                @endphp

                <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition">

                    <div class="h-52 bg-slate-100 overflow-hidden relative">

                        <img src="{{ $anhDaiDien }}"
                            alt="{{ $diaDiem->ten_dia_diem }}"
                            class="w-full h-full object-cover hover:scale-105 transition duration-500">

                        <div class="absolute top-4 right-4 bg-white/95 text-[#1040C5] px-4 py-2 rounded-full font-bold text-sm shadow">

                            {{ $ketQua['phan_tram'] }}% phù hợp

                        </div>

                    </div>

                    <div class="p-5">

                        <h3 class="text-2xl font-bold text-[#061755]">

                            {{ $diaDiem->ten_dia_diem }}

                        </h3>

                        <div class="mt-4 grid grid-cols-2 gap-3">

                            <div class="bg-blue-50 rounded-2xl p-3 text-center">

                                <p class="text-xl font-bold text-[#1040C5]">

                                    {{ $diaDiem->diaDiemDuLichs->count() }}

                                </p>

                                <p class="text-xs text-gray-500 mt-1">

                                    địa điểm du lịch

                                </p>

                            </div>

                            <div class="bg-blue-50 rounded-2xl p-3 text-center">

                                <p class="text-xl font-bold text-[#1040C5]">

                                    {{ $diaDiem->khachSans->count() }}

                                </p>

                                <p class="text-xs text-gray-500 mt-1">

                                    khách sạn

                                </p>

                            </div>

                        </div>

                        <a href="{{ route('timkiem.trangchu', ['ma_dia_diem' => $diaDiem->ma_dia_diem]) }}"
                            class="mt-5 inline-flex items-center justify-center gap-2 w-full bg-[#1040C5] hover:bg-blue-700 text-white rounded-xl py-3 font-semibold transition">

                            Xem địa điểm và khách sạn

                            <i class="fa-solid fa-arrow-right text-sm"></i>

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-white rounded-3xl border border-dashed border-slate-300 p-12 text-center">

            <div class="w-20 h-20 rounded-full bg-blue-50 text-[#1040C5] flex items-center justify-center mx-auto">

                <i class="fa-solid fa-map-location-dot text-3xl"></i>

            </div>

            <h3 class="text-2xl font-bold text-slate-700 mt-5">

                Chưa tìm thấy điểm đến phù hợp

            </h3>

            <p class="text-gray-500 mt-2">

                Bạn thử chọn nhu cầu khác để hệ thống gợi ý chính xác hơn.

            </p>

        </div>

    @endif

</div>

@endif

</section>

<script>
document.addEventListener('DOMContentLoaded', function() {

    const btnXemTatCa =
        document.getElementById('btnXemTatCaNhuCau');

    if (!btnXemTatCa) {
        return;
    }

    btnXemTatCa.addEventListener('click', function() {

        const danhSachAn =
            document.querySelectorAll('.nhu-cau-an');

        danhSachAn.forEach(function(item) {

            item.classList.remove('hidden');

        });

        btnXemTatCa.remove();

    });

});
</script>