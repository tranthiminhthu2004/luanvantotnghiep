@extends('admin.trangchinh.admin')

@php
use Illuminate\Support\Str;
@endphp

@section('title','Chi tiết người dùng')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-6">

        <!-- Avatar -->
        <div class="flex flex-col items-center">

            @if($nguoiDung->anh_dai_dien)

            <img src="{{ asset($nguoiDung->anh_dai_dien) }}"
                class="w-32 h-32 rounded-full object-cover border-4 border-blue-100 shadow">

            @else

            <img src="{{ asset('images/avatar-default.png') }}"
                class="w-32 h-32 rounded-full object-cover border-4 border-blue-100 shadow">

            @endif


            <p class="mt-4 text-gray-500 text-sm">

                {{ $nguoiDung->email }}

            </p>

            <div class="flex gap-3 mt-4">

                <span class="bg-blue-100 text-blue-600 px-4 py-1 rounded-full text-sm font-medium">

                    {{ $nguoiDung->vaiTro->ten_vai_tro ?? 'Người dùng' }}

                </span>

                @if($nguoiDung->trang_thai)

                <span class="bg-green-100 text-green-600 px-4 py-1 rounded-full text-sm font-medium">

                    Hoạt động

                </span>

                @else

                <span class="bg-red-100 text-red-600 px-4 py-1 rounded-full text-sm font-medium">

                    Đã khóa

                </span>

                @endif

            </div>

        </div>

        <!-- Thông tin cá nhân -->
        <div class="mt-8 border rounded-2xl overflow-hidden">

            <div class="bg-slate-50 px-6 py-4 border-b">

                <h3 class="text-lg font-bold text-[#061755]">

                    Thông tin cá nhân

                </h3>

            </div>

            <div class="p-6 space-y-5">

                <div class="flex flex-col md:flex-row">

                    <div class="w-full md:w-56 font-semibold text-gray-600">

                        Họ và tên

                    </div>

                    <div class="flex-1">

                        {{ $nguoiDung->ho_va_ten_dem }} {{ $nguoiDung->ten }}

                    </div>

                </div>

                <div class="border-t"></div>

                <div class="flex flex-col md:flex-row">

                    <div class="w-full md:w-56 font-semibold text-gray-600">

                        Số điện thoại

                    </div>

                    <div class="flex-1">

                        {{ $nguoiDung->so_dien_thoai ?: 'Chưa cập nhật' }}

                    </div>

                </div>

                <div class="border-t"></div>

                <div class="flex flex-col md:flex-row">

                    <div class="w-full md:w-56 font-semibold text-gray-600">

                        Giới tính

                    </div>

                    <div class="flex-1">

                        @if($nguoiDung->gioi_tinh == 'Nam')

                        Nam

                        @elseif($nguoiDung->gioi_tinh == 'Nu')

                        Nữ

                        @elseif($nguoiDung->gioi_tinh == 'Khac')

                        Khác

                        @else

                        Chưa cập nhật

                        @endif

                    </div>

                </div>

                <div class="border-t"></div>

                <div class="flex flex-col md:flex-row">

                    <div class="w-full md:w-56 font-semibold text-gray-600">

                        Ngày sinh

                    </div>

                    <div class="flex-1">

                        {{ $nguoiDung->ngay_sinh
                    ? \Carbon\Carbon::parse($nguoiDung->ngay_sinh)->format('d/m/Y')
                    : 'Chưa cập nhật' }}

                    </div>

                </div>

                <div class="border-t"></div>

                <div class="flex flex-col md:flex-row">

                    <div class="w-full md:w-56 font-semibold text-gray-600">

                        Ngày tạo tài khoản

                    </div>

                    <div class="flex-1">

                        {{ \Carbon\Carbon::parse($nguoiDung->ngay_tao)->format('d/m/Y H:i') }}

                    </div>

                </div>

                <div class="border-t"></div>

                <div class="flex flex-col md:flex-row">

                    <div class="w-full md:w-56 font-semibold text-gray-600">

                        Đăng nhập Google

                    </div>

                    <div class="flex-1">

                        @if($nguoiDung->ma_google)

                        Có

                        @else

                        Không

                        @endif

                    </div>

                </div>

            </div>

        </div>

        <!-- Nút -->
        <div class="mt-8">

            <a href="{{ route('admin.nguoidung.index') }}"
                class="inline-flex items-center bg-slate-200 hover:bg-slate-300 px-5 py-2.5 rounded-full text-sm font-semibold transition">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection