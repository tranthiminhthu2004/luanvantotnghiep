@extends('admin.trangchinh.admin')

@section('title','Chi tiết phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-6">

        <!-- Tiêu đề -->
        <h2 class="text-3xl md:text-4xl font-bold text-[#061755] mb-8">

            Phòng {{ $phong->so_phong }}

        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Ảnh -->
            <div>

                @if($phong->loaiPhong->hinhAnh->count())

                <img src="{{ asset($phong->loaiPhong->hinhAnh->first()->duong_dan_anh) }}"
                    class="w-full h-80 object-cover rounded-2xl">

                @else

                <img src="{{ asset('images/no-room.jpg') }}" class="w-full h-80 object-cover rounded-2xl">

                @endif

            </div>

            <!-- Thông tin -->
            <div class="space-y-5">

                <div>

                    <span class="font-semibold text-black">

                        Khách sạn

                    </span>

                    <p class="text-gray-700 mt-1">

                        {{ $phong->loaiPhong->khachSan->ten_khach_san }}

                    </p>

                </div>

                <div>

                    <span class="font-semibold text-black">

                        Loại phòng

                    </span>

                    <p class="text-gray-700 mt-1">

                        {{ $phong->loaiPhong->ten_loai_phong }}

                    </p>

                </div>

                <div>

                    <span class="font-semibold text-black">

                        Số phòng

                    </span>

                    <p class="text-gray-700 mt-1">

                        {{ $phong->so_phong }}

                    </p>

                </div>

                <div>

                    <span class="font-semibold text-black">

                        Tầng

                    </span>

                    <p class="text-gray-700 mt-1">

                        {{ $phong->tang }}

                    </p>

                </div>

                <div>

                    <span class="font-semibold text-black">

                        Trạng thái

                    </span>

                    <div class="mt-2">

                        @if($phong->trang_thai_phong == 'DangHoatDong')

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                            Đang hoạt động

                        </span>

                        @elseif($phong->trang_thai_phong == 'BaoTri')

                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">

                            Bảo trì

                        </span>

                        @else

                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

                            Ngưng hoạt động

                        </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        <!-- Thông tin loại phòng -->
        <div class="mt-10">

            <h3 class="text-2xl font-bold mb-5">

                Thông tin loại phòng

            </h3>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">

                <div>

                    <span class="font-semibold text-black">

                        Diện tích

                    </span>

                    <p class="mt-1 text-gray-700">

                        {{ $phong->loaiPhong->dien_tich }} m²

                    </p>

                </div>

                <div>

                    <span class="font-semibold text-black">

                        Số giường

                    </span>

                    <p class="mt-1 text-gray-700">

                        {{ $phong->loaiPhong->so_giuong }}

                    </p>

                </div>

                <div>

                    <span class="font-semibold text-black">

                        Số người tối đa

                    </span>

                    <p class="mt-1 text-gray-700">

                        {{ $phong->loaiPhong->so_nguoi_toi_da }}

                    </p>

                </div>

                <div>

                    <span class="font-semibold text-black">

                        Giá cơ bản

                    </span>

                    <p class="mt-1 text-blue-600 font-bold">

                        {{ number_format($phong->loaiPhong->gia_co_ban,0,',','.') }} đ

                    </p>

                </div>

            </div>

        </div> <!-- Mô tả -->
        <div class="mt-10">

            <h3 class="text-2xl font-bold mb-4">

                Mô tả

            </h3>

            <p class="text-gray-600 leading-8">

                {{ $phong->loaiPhong->mo_ta ?? 'Chưa có mô tả.' }}

            </p>

        </div>

        <!-- Quay lại -->
        <div class="mt-8">

            <a href="{{ route('admin.phong.index') }}"
                class="inline-flex items-center bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl transition">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection