@extends('admin.trangchinh.admin')

@php
use Illuminate\Support\Str;
@endphp

@section('title','Chi tiết người dùng')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        {{-- Avatar --}}
        <div class="flex flex-col items-center">

            @if($nguoiDung->anh_dai_dien)

            @if(Str::startsWith($nguoiDung->anh_dai_dien,'http'))

            <img src="{{ $nguoiDung->anh_dai_dien }}"
                class="w-44 h-44 rounded-full object-cover border-4 border-blue-100 shadow-lg">

            @else

            <img src="{{ asset('storage/'.$nguoiDung->anh_dai_dien) }}"
                class="w-44 h-44 rounded-full object-cover border-4 border-blue-100 shadow-lg">

            @endif

            @else

            <img src="{{ asset('images/avatar-default.png') }}"
                class="w-44 h-44 rounded-full object-cover border-4 border-blue-100 shadow-lg">

            @endif

            {{-- Họ tên --}}
            <h2 class="text-3xl font-bold text-[#061755] mt-5">

                {{ $nguoiDung->ho_va_ten_dem }}
                {{ $nguoiDung->ten }}

            </h2>

            {{-- Email --}}
            <p class="text-gray-500 text-lg mt-2">

                {{ $nguoiDung->email }}

            </p>

            {{-- Vai trò --}}
            <span class="mt-3 px-4 py-2 bg-blue-100 text-blue-600 rounded-full font-medium">

                {{ $nguoiDung->vaiTro->ten_vai_tro ?? 'Người dùng' }}

            </span>

        </div>

        {{-- Thông tin --}}
        <div class="grid md:grid-cols-2 gap-4 mt-10">

            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">

                <p class="text-gray-500 mb-1">

                    Số điện thoại

                </p>

                <p class="font-semibold">

                    {{ $nguoiDung->so_dien_thoai ?: 'Chưa cập nhật' }}

                </p>

            </div>

            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">

                <p class="text-gray-500 mb-1">

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

            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">

                <p class="text-gray-500 mb-1">

                    Ngày sinh

                </p>

                <p class="font-semibold">

                    {{ $nguoiDung->ngay_sinh
                        ? \Carbon\Carbon::parse($nguoiDung->ngay_sinh)->format('d/m/Y')
                        : 'Chưa cập nhật' }}

                </p>

            </div>

            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">

                <p class="text-gray-500 mb-1">

                    Trạng thái

                </p>

                <p class="font-semibold">

                    @if($nguoiDung->trang_thai)

                    <span class="text-green-600">

                        Hoạt động

                    </span>

                    @else

                    <span class="text-red-600">

                        Đã khóa

                    </span>

                    @endif

                </p>

            </div>

            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">

                <p class="text-gray-500 mb-1">

                    Ngày tạo tài khoản

                </p>

                <p class="font-semibold">

                    {{ \Carbon\Carbon::parse($nguoiDung->ngay_tao)->format('d/m/Y H:i') }}

                </p>

            </div>

            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">

                <p class="text-gray-500 mb-1">

                    Đăng nhập Google

                </p>

                <p class="font-semibold">

                    @if($nguoiDung->ma_google)

                    <span class="text-green-600">

                        Có

                    </span>

                    @else

                    <span class="text-gray-500">

                        Không

                    </span>

                    @endif

                </p>

            </div>

        </div>

        {{-- Nút --}}
        <div class="mt-10 flex justify-center">

            <a href="{{ route('admin.nguoidung.index') }}"
                class="bg-slate-200 hover:bg-slate-300 px-8 py-3 rounded-xl font-medium transition">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection