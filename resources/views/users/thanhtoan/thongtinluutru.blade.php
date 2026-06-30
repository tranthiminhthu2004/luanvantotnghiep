{{-- THÔNG TIN LƯU TRÚ --}}

<section>

    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-6">

        Thông tin lưu trú

    </h2>

    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] gap-y-5">

        {{-- Ngày nhận phòng --}}
        <div class="font-semibold text-slate-700">

            Ngày nhận phòng :

        </div>

        <div class="text-slate-900">

            {{ $ngayNhanPhong }}

        </div>

        {{-- Ngày trả phòng --}}
        <div class="font-semibold text-slate-700">

            Ngày trả phòng :

        </div>

        <div class="text-slate-900">

            {{ $ngayTraPhong }}

        </div>

        {{-- Số đêm --}}
        <div class="font-semibold text-slate-700">

            Số đêm :

        </div>

        <div class="text-slate-900">

            {{ $soDem }} đêm

        </div>

        {{-- Số khách --}}
        <div class="font-semibold text-slate-700">

            Số khách :

        </div>

        <div class="text-slate-900">

            {{ $tongNguoi }} khách

        </div>

    </div>

</section>