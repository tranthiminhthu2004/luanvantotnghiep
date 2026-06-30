{{-- DANH SÁCH PHÒNG ĐÃ CHỌN --}}

<section>

    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-6">

        Danh sách phòng đã chọn

    </h2>

    @foreach($phongsDaChon as $phong)

    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] gap-y-5">

        {{-- Loại phòng --}}
        <div class="font-semibold text-slate-700">

            Loại phòng :

        </div>

        <div class="text-slate-900">

            {{ $phong['ten'] }}

        </div>

        {{-- Số lượng --}}
        <div class="font-semibold text-slate-700">

            Số lượng :

        </div>

        <div class="text-slate-900">

            {{ $phong['so_luong'] }} phòng

        </div>

        {{-- Đơn giá --}}
        <div class="font-semibold text-slate-700">

            Đơn giá :

        </div>

        <div class="text-slate-900">

            {{ number_format($phong['gia'],0,',','.') }}đ / đêm

        </div>

        {{-- Số đêm --}}
        <div class="font-semibold text-slate-700">

            Số đêm :

        </div>

        <div class="text-slate-900">

            {{ $phong['so_dem'] }} đêm

        </div>

        {{-- Thành tiền --}}
        <div class="font-semibold text-slate-700">

            Thành tiền

        </div>

        <div class="font-semibold text-blue-600">

            {{ number_format($phong['thanh_tien'],0,',','.') }}đ

        </div>

    </div>

    @if(!$loop->last)

    <hr class="my-8 border-slate-200">

    @endif

    @endforeach

    <hr class="my-8 border-slate-300">

    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr]">

        <div class="text-xl font-bold text-slate-800">

            Tạm tính

        </div>

        <div class="text-2xl font-bold text-blue-600">

            {{ number_format($tongTien,0,',','.') }}đ

        </div>

    </div>

</section>