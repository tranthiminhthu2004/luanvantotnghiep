@php

$anhDaiDien = $diemDen->hinhAnhs->first();

$anhPhu = $diemDen->hinhAnhs->slice(1,4);

@endphp

<section>

    {{-- Tiêu đề --}}
    <div class="mt-8">

        <h1 class="text-4xl lg:text-5xl font-bold text-[#061755]">

            {{ $diemDen->ten_dia_diem }}

        </h1>

        <div class="mt-4 flex items-center gap-3 text-slate-600">

            <i class="fa-solid fa-location-dot text-[#1040C5]"></i>

            <span class="text-base">

                {{ $diemDen->dia_chi }}

            </span>

        </div>

    </div>

    {{-- Gallery --}}
    <div class="mt-10">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

            {{-- Ảnh lớn --}}
            <div class="lg:col-span-2">

                <div class="h-[260px] md:h-[420px] rounded-3xl overflow-hidden bg-slate-100">

                    @if($anhDaiDien)

                    <img src="{{ asset($anhDaiDien->duong_dan_anh) }}" class="w-full h-full object-cover">

                    @else

                    <div class="w-full h-full flex items-center justify-center">

                        <i class="fa-regular fa-image text-7xl text-slate-300"></i>

                    </div>

                    @endif

                </div>

            </div>

            {{-- 4 ảnh nhỏ --}}
            <div class="grid grid-cols-2 grid-rows-2 gap-4">

                @for($i = 0; $i < 4; $i++) @php $anh=$anhPhu->get($i);

                    @endphp

                    <div class="h-[122px] md:h-[202px] rounded-2xl overflow-hidden bg-slate-100">

                        @if($anh)

                        <img src="{{ asset($anh->duong_dan_anh) }}" class="w-full h-full object-cover">

                        @else

                        <div class="w-full h-full flex items-center justify-center">

                            <i class="fa-regular fa-image text-3xl text-slate-300"></i>

                        </div>

                        @endif

                    </div>

                    @endfor

            </div>

        </div>

    </div>
    {{-- Giới thiệu --}}
    <section class="mt-12">

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-5 lg:p-6">

            <h2 class="text-4xl font-bold text-[#061755]">

                Giới thiệu

            </h2>

            <div class=" text-black text-base leading-5 whitespace-pre-line text-justify">

                {{ $diemDen->mo_ta }}

            </div>

        </div>

    </section>

    <section class="mt-10">

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

            <div class="p-6 lg:p-8">

                <h2 class="text-3xl font-bold text-[#061755]">

                    Bản đồ

                </h2>

                <p class="mt-2 text-slate-500">

                    Vị trí của điểm đến trên bản đồ.

                </p>

            </div>

            <iframe width="100%" height="300" class="border-t border-slate-200" loading="lazy" allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://maps.google.com/maps?q={{ $diemDen->vi_do }},{{ $diemDen->kinh_do }}&z=15&output=embed">

            </iframe>

        </div>

    </section>
</section>