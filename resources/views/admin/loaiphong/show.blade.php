@extends('admin.trangchinh.admin')

@section('title','Chi tiết loại phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-5 md:p-8">

        <!-- Tiêu đề -->
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-[#061755]">

                {{ $loaiPhong->ten_loai_phong }}

            </h2>

        </div>

        <!-- Ảnh + Thông tin -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">

            <!-- Ảnh -->
            <div>

                @if($loaiPhong->hinhAnh->count())

                <img src="{{ asset($loaiPhong->hinhAnh->first()->duong_dan_anh) }}"
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

                        Khách sạn

                    </span>

                    <span class="text-base text-black text-right max-w-[60%]">

                        {{ $loaiPhong->khachSan->ten_khach_san ?? 'Chưa cập nhật' }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Loại phòng

                    </span>

                    <span class="text-base text-black">

                        {{ $loaiPhong->ten_loai_phong }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Số người tối đa

                    </span>

                    <span class="text-base text-black">

                        {{ $loaiPhong->so_nguoi_toi_da }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Diện tích

                    </span>

                    <span class="text-base text-black">

                        {{ $loaiPhong->dien_tich }} m²

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Số giường

                    </span>

                    <span class="text-base text-black">

                        {{ $loaiPhong->so_giuong }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Giá cơ bản

                    </span>

                    <span class="text-base text-blue-600 font-bold">

                        {{ number_format($loaiPhong->gia_co_ban,0,',','.') }} đ

                    </span>

                </div>

                <div class="flex justify-between items-center">

                    <span class="font-semibold text-black text-base">

                        Trạng thái

                    </span>

                    @if($loaiPhong->trang_thai)

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

            </div>

        </div>

        <!-- Mô tả + Tiện nghi -->
        <div class="mt-10 grid grid-cols-1 xl:grid-cols-2 gap-8">

            <!-- Mô tả -->
            <div>

                <h3 class="text-2xl font-bold text-[#061755] mb-4">

                    Mô tả loại phòng

                </h3>

                <div class="bg-slate-50 rounded-2xl border p-6 h-full">

                    @if($loaiPhong->mo_ta)

                    <p class="text-base text-black leading-8">

                        {{ $loaiPhong->mo_ta }}

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

                    Tiện nghi loại phòng

                </h3>

                <div class="bg-slate-50 rounded-2xl border p-6 h-full">

                    @if($loaiPhong->tienNghis->count())

                    <div class="flex flex-wrap gap-3">

                        @foreach($loaiPhong->tienNghis as $tienNghi)

                        <div
                            class="inline-flex items-center gap-2 px-4 py-3 rounded-xl bg-white border shadow-sm hover:bg-blue-50 transition">

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

        <!-- Quay lại -->
        <div class="mt-20 flex justify-start">

            <a href="{{ route('admin.loaiphong.index') }}"
                class="inline-flex items-center gap-2 bg-slate-200 hover:bg-slate-300 text-black px-8 py-3 rounded-full font-semibold transition">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection