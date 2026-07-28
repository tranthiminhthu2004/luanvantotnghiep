<section class="mt-12">

    {{-- Tiêu đề --}}
    <div class="mb-8">

        <h2 class="text-4xl font-bold text-[#061755]">

            Địa điểm du lịch

        </h2>

        <p class="mt-2 text-slate-500">

            Khám phá các địa điểm du lịch tại {{ $diaDiem->ten_dia_diem }}.

        </p>

    </div>

    @if($diaDiem->diaDiemDuLichs->count())

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

        @foreach($diaDiem->diaDiemDuLichs as $diem)

        @php

        $anh = $diem->hinhAnhs->first();

        @endphp

        <div
            class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-lg transition duration-300">

            {{-- Ảnh --}}
            <div class="h-44 bg-slate-100 overflow-hidden">

                @if($anh)

                <img src="{{ asset($anh->duong_dan_anh) }}" class="w-full h-full object-cover object-center">

                @else

                <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">

                    <i class="fa-regular fa-image text-5xl"></i>

                    <span class="mt-2 text-sm">

                        Chưa có hình ảnh

                    </span>

                </div>

                @endif

            </div>

            {{-- Nội dung --}}
            <div class="p-5">

                <h3 class="text-lg font-bold text-[#061755]">

                    {{ $diem->ten_dia_diem }}

                </h3>

                <p class="mt-3 text-sm text-slate-600 leading-6 line-clamp-3">

                    {{ $diem->mo_ta }}

                </p>

                <div class="mt-5">

                    <a href="{{ route('diemden.show', $diem->ma_dia_diem_du_lich) }}" class="inline-flex items-center
                        gap-2 text-[#1040C5] font-semibold hover:underline">

                        Xem chi tiết

                        <i class="fa-solid fa-arrow-right text-sm"></i>

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    @else

    <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center">

        <i class="fa-regular fa-map text-6xl text-slate-300"></i>

        <p class="mt-5 text-slate-500">

            Chưa có địa điểm du lịch.

        </p>

    </div>

    @endif

</section>