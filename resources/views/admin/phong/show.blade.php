@extends('admin.trangchinh.admin')

@section('title','Chi tiết phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-5 md:p-8">

        <!-- Tiêu đề -->
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-[#061755]">

                Phòng {{ $phong->so_phong }}

            </h2>

        </div>

        <!-- Ảnh + Thông tin -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">

            <!-- Ảnh -->
            <div>

                @if($phong->loaiPhong->hinhAnh->count())

                <img src="{{ asset($phong->loaiPhong->hinhAnh->first()->duong_dan_anh) }}"
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

                    <span class="text-base text-black">

                        {{ $phong->loaiPhong->khachSan->ten_khach_san }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Loại phòng

                    </span>

                    <span class="text-base text-black">

                        {{ $phong->loaiPhong->ten_loai_phong }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Số phòng

                    </span>

                    <span class="text-base text-blue-600 font-bold">

                        {{ $phong->so_phong }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Tầng

                    </span>

                    <span class="text-base text-black">

                        {{ $phong->tang }}

                    </span>

                </div>

                <div class="flex justify-between items-center">

                    <span class="font-semibold text-black text-base">

                        Trạng thái

                    </span>

                    @if($phong->trang_thai_phong == 'DangHoatDong')

                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                        Đang hoạt động

                    </span>

                    @elseif($phong->trang_thai_phong == 'BaoTri')

                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">

                        Bảo trì

                    </span>

                    @else

                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

                        Ngưng hoạt động

                    </span>

                    @endif

                </div>

            </div>

        </div>

        <!-- Mô tả + Thông tin loại phòng -->
        <div class="mt-10 grid grid-cols-1 xl:grid-cols-2 gap-8">

            <!-- Mô tả -->
            <div>

                <h3 class="text-2xl font-bold text-[#061755] mb-4">

                    Mô tả loại phòng

                </h3>

                <div class="bg-slate-50 border rounded-2xl p-6 h-full">

                    @if($phong->loaiPhong->mo_ta)

                    <p class="text-base text-black leading-8">

                        {{ $phong->loaiPhong->mo_ta }}

                    </p>

                    @else

                    <p class="text-gray-500">

                        Chưa có mô tả.

                    </p>

                    @endif

                </div>

            </div>

            <!-- Thông tin loại phòng -->
            <div>

                <h3 class="text-2xl font-bold text-[#061755] mb-4">

                    Thông tin loại phòng

                </h3>

                <div class="bg-slate-50 border rounded-2xl p-6 h-full space-y-4">

                    <div class="flex justify-between border-b pb-3">

                        <span class="font-semibold text-black">

                            Diện tích

                        </span>

                        <span class="text-black">

                            {{ $phong->loaiPhong->dien_tich }} m²

                        </span>

                    </div>

                    <div class="flex justify-between border-b pb-3">

                        <span class="font-semibold text-black">

                            Số giường

                        </span>

                        <span class="text-black">

                            {{ $phong->loaiPhong->so_giuong }}

                        </span>

                    </div>

                    <div class="flex justify-between border-b pb-3">

                        <span class="font-semibold text-black">

                            Số người tối đa

                        </span>

                        <span class="text-black">

                            {{ $phong->loaiPhong->so_nguoi_toi_da }}

                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span class="font-semibold text-black">

                            Giá cơ bản

                        </span>

                        <span class="text-blue-600 font-bold">

                            {{ number_format($phong->loaiPhong->gia_co_ban,0,',','.') }} đ

                        </span>

                    </div>

                </div>

            </div>

        </div>

        <!-- Quay lại -->
        <div class="mt-20">

            <a href="{{ route('admin.phong.index') }}"
                class="inline-flex items-center gap-2 bg-slate-200 hover:bg-slate-300 text-black px-8 py-3 rounded-full font-semibold transition">


                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection