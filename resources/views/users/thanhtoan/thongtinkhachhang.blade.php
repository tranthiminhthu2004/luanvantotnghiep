{{-- THÔNG TIN KHÁCH HÀNG --}}

<section>

    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-6">

        Thông tin khách hàng

    </h2>

    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] gap-y-5">

        {{-- Họ và tên --}}
        <div class="font-semibold text-slate-700">

            Họ và tên :

        </div>

        <div class="text-slate-900">

            {{ $ho_ten }}

        </div>

        {{-- Số điện thoại --}}
        <div class="font-semibold text-slate-700">

            Số điện thoại :

        </div>

        <div class="text-slate-900">

            {{ $so_dien_thoai }}

        </div>

        {{-- Email --}}
        <div class="font-semibold text-slate-700">

            Email :

        </div>

        <div class="text-slate-900">

            {{ $email }}

        </div>

        {{-- Ghi chú --}}
        <div class="font-semibold text-slate-700">

            Ghi chú :

        </div>

        <div class="text-slate-900">

            {{ $ghi_chu ?: 'Không có ghi chú' }}

        </div>

    </div>

    {{-- Hidden gửi dữ liệu về Controller --}}
    <input type="hidden" name="ho_ten" value="{{ $ho_ten }}">

    <input type="hidden" name="so_dien_thoai" value="{{ $so_dien_thoai }}">

    <input type="hidden" name="email" value="{{ $email }}">

    <input type="hidden" name="ghi_chu" value="{{ $ghi_chu }}">

</section>