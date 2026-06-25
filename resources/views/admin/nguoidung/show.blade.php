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

            @if(Str::startsWith($nguoiDung->anh_dai_dien,'http'))

            <img src="{{ $nguoiDung->anh_dai_dien }}"
                class="w-32 h-32 rounded-full object-cover border-4 border-blue-100 shadow">

            @else

            <img src="{{ asset('storage/'.$nguoiDung->anh_dai_dien) }}"
                class="w-32 h-32 rounded-full object-cover border-4 border-blue-100 shadow">

            @endif

            @else

            <img src="{{ asset('images/avatar-default.png') }}"
                class="w-32 h-32 rounded-full object-cover border-4 border-blue-100 shadow">

            @endif

            <h2 class="text-2xl font-bold text-[#061755] mt-4 text-center">

                {{ $nguoiDung->ho_va_ten_dem }}
                {{ $nguoiDung->ten }}

            </h2>

            <p class="text-gray-500 mt-1 text-sm">

                {{ $nguoiDung->email }}

            </p>

            <span class="mt-3 bg-blue-100 text-blue-600 px-4 py-1 rounded-full text-sm font-medium">

                {{ $nguoiDung->vaiTro->ten_vai_tro ?? 'Người dùng' }}

            </span>

        </div>

        <!-- Thông tin -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">

            <div class="bg-slate-50 rounded-xl border p-4">

                <p class="text-gray-500 text-sm mb-1">

                    Số điện thoại

                </p>

                <p class="font-semibold text-black">

                    {{ $nguoiDung->so_dien_thoai ?: 'Chưa cập nhật' }}

                </p>

            </div>

            <div class="bg-slate-50 rounded-xl border p-4">

                <p class="text-gray-500 text-sm mb-1">

                    Giới tính

                </p>

                <p class="font-semibold">

                    @if($nguoiDung->gioi_tinh == 'Nam')

                    Nam

                    @elseif($nguoiDung->gioi_tinh == 'Nu')

                    Nữ

                    @elseif($nguoiDung->gioi_tinh == 'Khac')

                    Khác

                    @else

                    Chưa cập nhật

                    @endif

                </p>

            </div>

            <div class="bg-slate-50 rounded-xl border p-4">

                <p class="text-gray-500 text-sm mb-1">

                    Ngày sinh

                </p>

                <p class="font-semibold">

                    {{ $nguoiDung->ngay_sinh
                        ? \Carbon\Carbon::parse($nguoiDung->ngay_sinh)->format('d/m/Y')
                        : 'Chưa cập nhật' }}

                </p>

            </div>

            <div class="bg-slate-50 rounded-xl border p-4">

                <p class="text-gray-500 text-sm mb-1">

                    Trạng thái

                </p>

                @if($nguoiDung->trang_thai)

                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">

                    Hoạt động

                </span>

                @else

                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">

                    Đã khóa

                </span>

                @endif

            </div>

            <div class="bg-slate-50 rounded-xl border p-4">

                <p class="text-gray-500 text-sm mb-1">

                    Ngày tạo tài khoản

                </p>

                <p class="font-semibold">

                    {{ \Carbon\Carbon::parse($nguoiDung->ngay_tao)->format('d/m/Y H:i') }}

                </p>

            </div>

            <div class="bg-slate-50 rounded-xl border p-4">

                <p class="text-gray-500 text-sm mb-1">

                    Đăng nhập Google

                </p>

                @if($nguoiDung->ma_google)

                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">

                    Có

                </span>

                @else

                <span class="bg-slate-200 text-slate-600 px-3 py-1 rounded-full text-sm">

                    Không

                </span>

                @endif

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