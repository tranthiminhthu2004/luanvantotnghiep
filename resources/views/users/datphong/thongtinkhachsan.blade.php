{{-- THÔNG TIN KHÁCH SẠN --}}
<section>

    <h2 class="text-3xl lg:text-4xl font-bold text-[#061755] mb-6">

        Thông tin khách sạn

    </h2>

    <div class="flex flex-col sm:flex-row gap-5">

        <img src="{{ $khachSan->hinhAnh->count()
                ? asset($khachSan->hinhAnh->first()->duong_dan_anh)
                : asset('images/hotel-default.jpg') }}" alt="{{ $khachSan->ten_khach_san }}"
            class="w-full sm:w-48 lg:w-52 h-52 sm:h-36 lg:h-40 rounded-xl object-cover flex-shrink-0">

        <div class="flex-1">

            <h3 class="text-xl lg:text-2xl font-bold text-slate-800">

                {{ $khachSan->ten_khach_san }}

            </h3>

            <div class="flex items-center gap-1 text-yellow-500 mt-2">

                @for($i = 1; $i <= $khachSan->so_sao_khach_san; $i++)

                    <i class="fa-solid fa-star text-sm"></i>

                    @endfor

                    <span class="ml-2 text-sm text-slate-600">

                        {{ $khachSan->so_sao_khach_san }} sao

                    </span>

            </div>

            <div class="flex items-start gap-2 mt-4 text-slate-700">

                <i class="fa-solid fa-location-dot text-red-600 mt-1"></i>

                <div>

                    <p>

                        {{ $khachSan->dia_chi }}

                    </p>

                    <p class="text-sm text-slate-500 mt-1">

                        {{ $khachSan->diaDiem->ten_dia_diem ?? '' }}

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>