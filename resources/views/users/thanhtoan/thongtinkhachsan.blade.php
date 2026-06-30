{{-- THÔNG TIN KHÁCH SẠN --}}

<section>

    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-6">

        Thông tin khách sạn

    </h2>

    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] gap-y-5">

        {{-- Tên khách sạn --}}
        <div class="font-semibold text-slate-700">

            Tên khách sạn :

        </div>

        <div class="text-slate-900">

            {{ $khachSan->ten_khach_san }}

        </div>

        {{-- Địa chỉ --}}
        <div class="font-semibold text-slate-700">

            Địa chỉ :

        </div>

        <div class="text-slate-900">

            {{ $khachSan->dia_chi }}

        </div>

        {{-- Địa điểm --}}
        <div class="font-semibold text-slate-700">

            Địa điểm :

        </div>

        <div class="text-slate-900">

            {{ $khachSan->diaDiem->ten_dia_diem ?? 'Không có' }}

        </div>

        {{-- Số sao --}}
        <div class="font-semibold text-slate-700">

            Số sao:

        </div>

        <div class="text-yellow-500">

            @for ($i = 1; $i <= $khachSan->so_sao_khach_san; $i++)

                <i class="fa-solid fa-star"></i>

                @endfor

        </div>

    </div>

</section>