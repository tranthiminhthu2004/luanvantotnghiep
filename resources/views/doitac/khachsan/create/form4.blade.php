@extends('doitac.trangchinh.partner')

@section('title','Đăng ký khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- Thanh tiến trình --}}
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm px-8 py-5 mb-6">

        <div class="flex items-center">

            {{-- Bước 1 --}}
            <div class="flex flex-col items-center">

                <div class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center">

                    <i class="fa-solid fa-check"></i>

                </div>

                <span class="mt-2 text-sm font-medium text-green-600">

                    Thông tin

                </span>

            </div>

            <div class="flex-1 h-0.5 bg-green-500 mx-4"></div>

            {{-- Bước 2 --}}
            <div class="flex flex-col items-center">

                <div class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center">

                    <i class="fa-solid fa-check"></i>

                </div>

                <span class="mt-2 text-sm font-medium text-green-600">

                    Hình ảnh

                </span>

            </div>

            <div class="flex-1 h-0.5 bg-green-500 mx-4"></div>

            {{-- Bước 3 --}}
            <div class="flex flex-col items-center">

                <div class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center">

                    <i class="fa-solid fa-check"></i>

                </div>

                <span class="mt-2 text-sm font-medium text-green-600">

                    Loại phòng

                </span>

            </div>

            <div class="flex-1 h-0.5 bg-green-500 mx-4"></div>

            {{-- Bước 4 --}}
            <div class="flex flex-col items-center">

                <div
                    class="w-10 h-10 rounded-full bg-[#1040C5] text-white flex items-center justify-center font-semibold">

                    4

                </div>

                <span class="mt-2 text-sm font-semibold text-[#1040C5]">

                    Tiện nghi

                </span>

            </div>

        </div>

    </div>

    <form action="{{ route('doitac.khachsan.create.form4.store') }}" method="POST">

        @csrf

        {{-- Tiện nghi khách sạn --}}
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8 mb-6">

            <h3 class="text-2xl font-bold text-[#061755] mb-6">

                Tiện nghi khách sạn

            </h3>

            @error('tien_nghi_khach_san')

            <div class="mb-5 rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-red-600">

                {{ $message }}

            </div>

            @enderror

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach($tienNghis as $tienNghi)
                <label
                    class="flex items-center gap-3 rounded-xl border border-slate-200 px-4 py-3 cursor-pointer transition hover:border-[#1040C5] hover:bg-blue-50">

                    <input type="checkbox" name="tien_nghi_khach_san[]" value="{{ $tienNghi->ma_tien_nghi }}"
                        class="w-5 h-5 accent-[#1040C5]"
                        {{ in_array($tienNghi->ma_tien_nghi, $tienNghiKhachSan) ? 'checked' : '' }}>

                    <span class="text-slate-700 font-medium">
                        {{ $tienNghi->ten_tien_nghi }}
                    </span>

                </label>

                @endforeach

            </div>

        </div>

        {{-- Tiện nghi từng loại phòng --}}
        @foreach($loaiPhongs as $index => $loaiPhong)

        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8 mb-6">

            <h3 class="text-2xl font-bold text-[#061755] mb-6">

                Tiện nghi loại phòng

                <span class="text-[#1040C5]">

                    {{ $loaiPhong['ten_loai_phong'] }}

                </span>

            </h3>

            @error('tien_nghi_loai_phong.'.$index)

            <div class="mb-5 rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-red-600">

                {{ $message }}

            </div>

            @enderror

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">

                @foreach($tienNghis as $tienNghi)

                <label
                    class="flex items-center gap-3 rounded-xl border border-slate-200 px-4 py-3 cursor-pointer transition hover:border-[#1040C5] hover:bg-blue-50">

                    <input type="checkbox" name="tien_nghi_loai_phong[{{ $index }}][]"
                        value="{{ $tienNghi->ma_tien_nghi }}" class="w-5 h-5 accent-[#1040C5]" {{ in_array(
                            $tienNghi->ma_tien_nghi,
                           $tienNghiLoaiPhong[$index] ?? []
                        ) ? 'checked' : '' }}>

                    <span class="text-slate-700 font-medium">

                        {{ $tienNghi->ten_tien_nghi }}

                    </span>

                </label>

                @endforeach

            </div>

        </div>

        @endforeach<div class="border-t border-slate-200 bg-white px-8 py-5 rounded-b-2xl">

            <div class="flex justify-center gap-10">

                <a href="{{ route('doitac.khachsan.create.form3') }}"
                    class="rounded-xl border border-slate-300 bg-white px-6 py-3 font-semibold text-slate-700 hover:bg-slate-100 transition">

                    Quay lại

                </a>

                <button type="submit"
                    class="rounded-xl bg-[#1040C5] px-8 py-3 font-semibold text-white hover:bg-blue-700 transition">

                    Gửi chờ duyệt

                </button>

            </div>

        </div>

    </form>

</div>

@endsection