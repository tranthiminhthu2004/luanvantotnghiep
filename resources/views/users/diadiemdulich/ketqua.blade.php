@if(isset($ketQuaGoiY) && count($ketQuaGoiY))

<section class="mt-12">

    {{-- Tiêu đề --}}
    <div class="mb-8">

        <h2 class="text-4xl font-bold text-[#061755]">

            Kết quả gợi ý

        </h2>

        <p class="mt-2 text-slate-500">

            Những địa điểm dưới đây được hệ thống đánh giá phù hợp nhất với sở thích du lịch của bạn.

        </p>

    </div>

    {{-- Danh sách địa điểm --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

        @foreach($ketQuaGoiY as $item)

        @php

        $diaDiem = $item['dia_diem'];

        @endphp

        <div
            class="bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-7 flex flex-col">

            {{-- Tên địa điểm --}}
            <div>

                <h3 class="text-2xl font-bold text-[#061755]">

                    {{ $diaDiem->ten_dia_diem }}

                </h3>

            </div>

            {{-- Phần trăm --}}
            <div class="mt-5">

                <span
                    class="inline-flex items-center bg-blue-100 text-[#1040C5] px-4 py-2 rounded-full text-sm font-bold">

                    {{ $item['phan_tram'] }}% phù hợp

                </span>

            </div>

            {{-- Mô tả --}}
            <div class="mt-6 flex-1">

                <p class="text-slate-600 leading-7 line-clamp-3 whitespace-pre-line">

                    {{ $diaDiem->mo_ta }}

                </p>

            </div>
            {{-- Nút --}}
            <div class="mt-8">

                <a href="{{ route('diadiem.show', $diaDiem->ma_dia_diem) }}" class=" w-full inline-flex items-center justify-center gap-2 bg-[#1040C5] hover:bg-blue-700
                    text-white py-3 rounded-xl font-semibold transition">

                    Xem chi tiết

                </a>

            </div>

        </div>

        @endforeach

    </div>

</section>

@endif