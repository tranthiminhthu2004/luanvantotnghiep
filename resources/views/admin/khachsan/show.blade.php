@extends('admin.trangchinh.admin')

@section('title','Chi tiết khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-5 md:p-8">

        <!-- Tiêu đề -->
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-[#061755]">

                {{ $khachSan->ten_khach_san }}

            </h2>

        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">

            <!-- Ảnh đại diện -->
            <div>

                @if($khachSan->hinhAnh->count())

                <img src="{{ asset($khachSan->hinhAnh->first()->duong_dan_anh) }}"
                    class="w-full h-72 lg:h-[430px] rounded-2xl object-cover shadow-sm">

                @else

                <div class="w-full h-72 lg:h-[430px] rounded-2xl bg-slate-100 flex items-center justify-center">

                    <div class="text-center text-gray-400">

                        <i class="fa-regular fa-image text-6xl mb-4"></i>

                        <p class="text-base">

                            Chưa có hình ảnh

                        </p>

                    </div>

                </div>

                @endif

            </div>

            <!-- Thông tin -->
            <div class="space-y-4">

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Địa điểm

                    </span>

                    <span class="text-base text-black">

                        {{ $khachSan->diaDiem->ten_dia_diem ?? 'Chưa cập nhật' }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Địa chỉ

                    </span>

                    <span class="text-base text-black text-right">

                        {{ $khachSan->dia_chi }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Số điện thoại

                    </span>

                    <span class="text-base text-black">

                        {{ $khachSan->so_dien_thoai }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Email

                    </span>

                    <span class="text-base text-black">

                        {{ $khachSan->email }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Số sao

                    </span>

                    <span class="flex items-center gap-1">

                        @for($i = 1; $i <= $khachSan->so_sao_khach_san; $i++)

                            <i class="fa-solid fa-star text-yellow-400"></i>

                            @endfor

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Trạng thái

                    </span>

                    @if($khachSan->trang_thai)

                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                        Hoạt động

                    </span>

                    @else

                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

                        Tạm dừng

                    </span>

                    @endif

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Giờ check-in

                    </span>

                    <span class="text-base text-black">

                        {{ \Carbon\Carbon::parse($khachSan->gio_check_in)->format('H:i') }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Giờ check-out

                    </span>

                    <span class="text-base text-black">

                        {{ \Carbon\Carbon::parse($khachSan->gio_check_out)->format('H:i') }}

                    </span>

                </div>

                <div class="flex justify-between items-center">

                    <span class="font-semibold text-black text-base">

                        Hủy miễn phí

                    </span>

                    <span class="text-base text-black">

                        {{ $khachSan->so_gio_huy_mien_phi }} giờ

                    </span>

                </div>

            </div>

        </div>
        <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">

            <!-- Mô tả -->
            <div>

                <h3 class="text-2xl font-bold text-[#061755] mb-4">

                    Mô tả khách sạn

                </h3>

                <div class="bg-slate-50 rounded-2xl border p-6 min-h-[180px]">

                    @if($khachSan->mo_ta)

                    <p class="text-base text-black leading-8">

                        {{ $khachSan->mo_ta }}

                    </p>

                    @else

                    <p class="text-gray-500">

                        Chưa có mô tả.

                    </p>

                    @endif

                </div>

            </div>

            <!-- Tiện nghi -->
            <div>

                <h3 class="text-2xl font-bold text-[#061755] mb-4">

                    Tiện nghi khách sạn

                </h3>

                <div class="bg-slate-50 rounded-2xl border p-6 min-h-[180px]">

                    @if($khachSan->tienNghis->count())

                    <div class="flex flex-wrap gap-3">

                        @foreach($khachSan->tienNghis as $tienNghi)

                        <div class="inline-flex items-center gap-2 px-4 py-3 rounded-xl bg-white border shadow-sm">

                            <i class="fa-solid {{ $tienNghi->icon }} text-blue-600"></i>

                            <span class="text-base">

                                {{ $tienNghi->ten_tien_nghi }}

                            </span>

                        </div>

                        @endforeach

                    </div>

                    @else

                    <p class="text-gray-500">

                        Chưa có tiện nghi.

                    </p>

                    @endif

                </div>

            </div>

        </div>

        <!-- Album ảnh -->
        <div class="mt-20">

            <h3 class="text-2xl font-bold text-[#061755] mb-4">

                Album hình ảnh

            </h3>

            @if($khachSan->hinhAnh->count())

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">

                @foreach($khachSan->hinhAnh as $anh)

                <div class="bg-white rounded-2xl border overflow-hidden shadow-sm hover:shadow-md transition">

                    <img src="{{ asset($anh->duong_dan_anh) }}" class="w-full h-52 object-cover">

                </div>

                @endforeach

            </div>

            @else

            <div class="bg-slate-50 border rounded-2xl py-16 text-center">

                <i class="fa-regular fa-image text-6xl text-gray-300 mb-5"></i>

                <p class="text-base text-gray-500">

                    Chưa có hình ảnh khách sạn.

                </p>

            </div>

            @endif

        </div>
        <!-- Nút quay lại -->
        <div class="mt-10 flex justify-start">

            <a href="{{ route('admin.khachsan.index') }}"
                class="inline-flex items-center gap-2 bg-slate-200 hover:bg-slate-300 text-black px-8 py-3 rounded-full font-semibold transition">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection