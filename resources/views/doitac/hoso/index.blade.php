@extends('doitac.trangchinh.partner')

@section('title', 'Hồ sơ')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-3xl shadow border border-slate-200 overflow-hidden">

        {{-- Tiêu đề --}}
        <div class="px-8 py-6 border-b border-slate-200">

            <h2 class="text-3xl font-bold text-[#061755]">

                Hồ sơ đối tác

            </h2>

            <p class="text-slate-500 mt-2">

                Thông tin tài khoản đối tác trên hệ thống.

            </p>

        </div>

        {{-- Avatar --}}
        <div class="py-8 flex justify-center">

            @if($nguoiDung->anh_dai_dien)

            <img src="{{ asset($nguoiDung->anh_dai_dien) }}"
                class="w-36 h-36 rounded-full object-cover border-4 border-blue-100 shadow">

            @else

            <div
                class="w-36 h-36 rounded-full bg-blue-600 text-white flex items-center justify-center text-5xl font-bold shadow">

                {{ strtoupper(substr($nguoiDung->ten,0,1)) }}

            </div>

            @endif

        </div>

        {{-- Thông tin --}}
        <div class="border-t border-slate-200">

            {{-- Họ tên --}}
            <div class="grid md:grid-cols-[240px_1fr] border-b">

                <div class="bg-slate-50 px-6 py-4 font-semibold">

                    Họ và tên

                </div>

                <div class="px-6 py-4">

                    {{ trim($nguoiDung->ho_va_ten_dem.' '.$nguoiDung->ten) }}

                </div>

            </div>

            {{-- Email --}}
            <div class="grid md:grid-cols-[240px_1fr] border-b">

                <div class="bg-slate-50 px-6 py-4 font-semibold">

                    Email

                </div>

                <div class="px-6 py-4">

                    {{ $nguoiDung->email }}

                </div>

            </div>

            {{-- SĐT --}}
            <div class="grid md:grid-cols-[240px_1fr] border-b">

                <div class="bg-slate-50 px-6 py-4 font-semibold">

                    Số điện thoại

                </div>

                <div class="px-6 py-4">

                    {{ $nguoiDung->so_dien_thoai ?? 'Chưa cập nhật' }}

                </div>

            </div>

            {{-- Giới tính --}}
            <div class="grid md:grid-cols-[240px_1fr] border-b">

                <div class="bg-slate-50 px-6 py-4 font-semibold">

                    Giới tính

                </div>

                <div class="px-6 py-4">

                    @switch($nguoiDung->gioi_tinh)

                    @case('Nam')
                    Nam
                    @break

                    @case('Nu')
                    Nữ
                    @break

                    @case('Khac')
                    Khác
                    @break

                    @default
                    Chưa cập nhật

                    @endswitch

                </div>

            </div>

            {{-- Ngày sinh --}}
            <div class="grid md:grid-cols-[240px_1fr] border-b">

                <div class="bg-slate-50 px-6 py-4 font-semibold">

                    Ngày sinh

                </div>

                <div class="px-6 py-4">

                    @if($nguoiDung->ngay_sinh)

                    {{ \Carbon\Carbon::parse($nguoiDung->ngay_sinh)->format('d/m/Y') }}

                    @else

                    Chưa cập nhật

                    @endif

                </div>

            </div>

            {{-- Vai trò --}}
            <div class="grid md:grid-cols-[240px_1fr] border-b">

                <div class="bg-slate-50 px-6 py-4 font-semibold">

                    Vai trò

                </div>

                <div class="px-6 py-4">

                    Đối tác

                </div>

            </div>

            {{-- Ngày tạo --}}
            <div class="grid md:grid-cols-[240px_1fr]">

                <div class="bg-slate-50 px-6 py-4 font-semibold">

                    Ngày tạo tài khoản

                </div>

                <div class="px-6 py-4">

                    {{ \Carbon\Carbon::parse($nguoiDung->ngay_tao)->format('d/m/Y H:i') }}

                </div>

            </div>

        </div>

        {{-- Nút --}}
        <div class="border-t px-8 py-6">

            <div class="flex flex-wrap gap-4 justify-center">

                <a href="{{ route('doitac.hoso.edit') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition">

                    <i class="fa-solid fa-user-pen mr-2"></i>

                    Chỉnh sửa thông tin

                </a>

                <a href="#"
                    class="border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-6 py-3 rounded-xl font-semibold transition">

                    <i class="fa-solid fa-key mr-2"></i>

                    Đổi mật khẩu

                </a>

            </div>

        </div>

    </div>

</div>

@endsection