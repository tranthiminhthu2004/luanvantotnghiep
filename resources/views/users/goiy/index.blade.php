<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gợi ý điểm đến</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <div class="pt-24">

        <section class="max-w-7xl mx-auto px-4 lg:px-8 pt-10 pb-16">

            <div class="mb-8">

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#061755] leading-tight">

                    Chọn điểm đến theo sở thích của bạn

                </h1>

            </div>

            <form method="POST" action="{{ route('goiy.xuly') }}">

                @csrf

                <div id="danhSachNhuCau" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-3 md:gap-4">

                    @foreach($nhuCaus as $index => $nhuCau)

                    @php
                    $daChon = isset($nhuCauNguoiDung)
                    && in_array($nhuCau->ma_nhu_cau, $nhuCauNguoiDung);
                    @endphp

                    <div class="block {{ $index >= 10 ? 'nhu-cau-an hidden' : '' }}">

                        <input type="checkbox" name="nhu_cau[]" value="{{ $nhuCau->ma_nhu_cau }}"
                            class="hidden inputNhuCau" {{ $daChon ? 'checked' : '' }}>

                        <div
                            class="cardNhuCau h-[72px] rounded-2xl border px-4 flex items-center justify-center text-center shadow-sm transition cursor-pointer
            {{ $daChon ? 'border-[#1040C5] bg-blue-50 ring-2 ring-[#1040C5]' : 'border-slate-200 bg-white hover:shadow-md' }}">

                            <h3 class="font-semibold text-[#061755] text-sm md:text-base leading-5">

                                {{ $nhuCau->ten_nhu_cau }}

                            </h3>

                        </div>

                    </div>

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

            {{-- KẾT QUẢ GỢI Ý --}}
            @if(isset($ketQuaGoiY))

            <div class="mt-16">

                <div class="mb-8">

                    <h2 class="text-3xl lg:text-4xl font-bold text-[#061755] mt-2">

                        Điểm đến phù hợp với sở thích của bạn

                    </h2>

                    @if(isset($nhuCauDaChon) && $nhuCauDaChon->count() > 0)

                    <div class="mt-5 flex flex-wrap gap-2">

                        @foreach($nhuCauDaChon as $nhuCau)

                        <span class="bg-blue-50 text-[#1040C5] px-4 py-2 rounded-full text-sm font-semibold">

                            {{ $nhuCau->ten_nhu_cau }}

                        </span>

                        @endforeach

                    </div>

                    @endif

                </div>

                @if(count($ketQuaGoiY) > 0)

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                    @foreach($ketQuaGoiY as $ketQua)

                    @php
                    $diaDiem = $ketQua['dia_diem'];
                    @endphp

                    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-lg transition p-6">

                        <div class="flex items-start justify-between gap-4">

                            <div
                                class="w-12 h-12 rounded-2xl bg-blue-50 text-[#1040C5] flex items-center justify-center shrink-0">

                                <i class="fa-solid fa-location-dot text-xl"></i>

                            </div>

                            <div class="bg-emerald-50 text-emerald-600 px-3 py-2 rounded-xl text-center shrink-0">

                                <p class="text-xl font-bold leading-none">

                                    {{ $ketQua['phan_tram'] }}%

                                </p>

                                <p class="text-xs font-semibold mt-1">

                                    Phù hợp

                                </p>

                            </div>

                        </div>

                        <div class="mt-5">

                            <h3 class="text-xl font-bold text-[#061755] line-clamp-2 min-h-[56px]">

                                {{ $diaDiem->ten_dia_diem }}

                            </h3>

                            <p class="text-sm text-gray-500 mt-3 leading-6">

                                Điểm đến được hệ thống gợi ý dựa trên mức độ tương đồng
                                với các nhu cầu du lịch bạn đã chọn.

                            </p>

                        </div>

                        <a href="{{ route('timkiem.trangchu', ['ma_dia_diem' => $diaDiem->ma_dia_diem]) }}"
                            class="mt-6 inline-flex items-center justify-center gap-2 w-full bg-[#1040C5] hover:bg-blue-700 text-white rounded-xl py-3 font-semibold transition">

                            Xem địa điểm và khách sạn

                            <i class="fa-solid fa-arrow-right text-sm"></i>

                        </a>

                    </div>

                    @endforeach

                </div>

                @else

                <div class="bg-white rounded-3xl border border-dashed border-slate-300 p-12 text-center">

                    <div
                        class="w-20 h-20 rounded-full bg-blue-50 text-[#1040C5] flex items-center justify-center mx-auto">

                        <i class="fa-solid fa-map-location-dot text-3xl"></i>

                    </div>

                    <h3 class="text-2xl font-bold text-slate-700 mt-5">

                        Chưa tìm thấy điểm đến phù hợp

                    </h3>

                    <p class="text-gray-500 mt-2">

                        Bạn thử chọn thêm hoặc thay đổi nhu cầu du lịch để hệ thống gợi ý chính xác hơn.

                    </p>

                </div>

                @endif

            </div>

            @endif

        </section>

    </div>

    @include('components.footer')

    <script>
    document.addEventListener('DOMContentLoaded', function() {


        const btnXemTatCa =
            document.getElementById('btnXemTatCaNhuCau');

        if (btnXemTatCa) {

            btnXemTatCa.addEventListener('click', function() {

                const danhSachAn =
                    document.querySelectorAll('.nhu-cau-an');

                danhSachAn.forEach(function(item) {

                    item.classList.remove('hidden');

                });

                btnXemTatCa.remove();

            });

        }


        document
            .querySelectorAll('.cardNhuCau')
            .forEach(function(card) {

                card.addEventListener('click', function() {

                    const box =
                        card.closest('div').querySelector('.inputNhuCau');

                    if (!box) {
                        return;
                    }

                    box.checked = !box.checked;

                    if (box.checked) {

                        card.classList.remove(
                            'border-slate-200',
                            'bg-white',
                            'hover:shadow-md'
                        );

                        card.classList.add(
                            'border-[#1040C5]',
                            'bg-blue-50',
                            'ring-2',
                            'ring-[#1040C5]'
                        );

                    } else {

                        card.classList.remove(
                            'border-[#1040C5]',
                            'bg-blue-50',
                            'ring-2',
                            'ring-[#1040C5]'
                        );

                        card.classList.add(
                            'border-slate-200',
                            'bg-white',
                            'hover:shadow-md'
                        );

                    }

                });

            });

    });
    </script>

</body>

</html>