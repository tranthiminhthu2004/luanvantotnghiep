@extends('doitac.index')

@section('title', 'Đăng khách sạn')

@section('content')

<div class="max-w-6xl mx-auto">

    {{-- Tiêu đề --}}
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-[#061755]">

            Đăng ký khách sạn

        </h2>

        <p class="mt-2 text-slate-500">

            Hoàn thành bước cuối cùng để gửi khách sạn lên hệ thống.

        </p>

    </div>

    {{-- Thanh tiến trình --}}
    <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">

        <div class="flex items-center justify-between">

            {{-- Bước 1 --}}
            <div class="flex flex-col items-center flex-1">

                <div class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center">

                    <i class="fa-solid fa-check"></i>

                </div>

                <p class="mt-3 font-semibold text-green-600">

                    Thông tin

                </p>

            </div>

            <div class="flex-1 h-1 bg-green-500"></div>

            {{-- Bước 2 --}}
            <div class="flex flex-col items-center flex-1">

                <div class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center">

                    <i class="fa-solid fa-check"></i>

                </div>

                <p class="mt-3 font-semibold text-green-600">

                    Hình ảnh

                </p>

            </div>

            <div class="flex-1 h-1 bg-green-500"></div>

            {{-- Bước 3 --}}
            <div class="flex flex-col items-center flex-1">

                <div class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center">

                    <i class="fa-solid fa-check"></i>

                </div>

                <p class="mt-3 font-semibold text-green-600">

                    Loại phòng

                </p>

            </div>

            <div class="flex-1 h-1 bg-green-500"></div>

            {{-- Bước 4 --}}
            <div class="flex flex-col items-center flex-1">

                <div class="w-12 h-12 rounded-full bg-[#1040C5] text-white flex items-center justify-center font-bold">

                    4

                </div>

                <p class="mt-3 font-semibold text-[#1040C5]">

                    Tiện nghi

                </p>

            </div>

        </div>

    </div>

    <form action="{{ route('doitac.khachsan.create.form4.store') }}" method="POST">

        @csrf

        {{-- Tiện nghi khách sạn --}}
        <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">

            <h3 class="text-2xl font-bold text-[#061755] mb-6">

                Tiện nghi khách sạn

            </h3>

            @error('tien_nghi_khach_san')

            <div class="mb-5 rounded-xl bg-red-50 border border-red-300 px-4 py-3 text-red-600">

                {{ $message }}

            </div>

            @enderror

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">

                @foreach($tienNghis as $tienNghi)

                <label
                    class="flex items-center gap-3 rounded-xl border border-slate-200 p-4 cursor-pointer hover:border-blue-500">

                    <input type="checkbox" name="tien_nghi_khach_san[]" value="{{ $tienNghi->ma_tien_nghi }}"
                        {{ in_array($tienNghi->ma_tien_nghi, old('tien_nghi_khach_san', [])) ? 'checked' : '' }}>

                    <span>

                        {{ $tienNghi->ten_tien_nghi }}

                    </span>

                </label>

                @endforeach

            </div>

        </div> {{-- Tiện nghi từng loại phòng --}}
        @foreach($loaiPhongs as $index => $loaiPhong)

        <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">

            <h3 class="text-2xl font-bold text-[#061755] mb-6">

                Tiện nghi loại phòng

                <span class="text-[#1040C5]">

                    {{ $loaiPhong['ten_loai_phong'] }}

                </span>

            </h3>

            @error('tien_nghi_loai_phong.'.$index)

            <div class="mb-5 rounded-xl bg-red-50 border border-red-300 px-4 py-3 text-red-600">

                {{ $message }}

            </div>

            @enderror

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">

                @foreach($tienNghis as $tienNghi)

                <label
                    class="flex items-center gap-3 rounded-xl border border-slate-200 p-4 cursor-pointer hover:border-blue-500">

                    <input type="checkbox" name="tien_nghi_loai_phong[{{ $index }}][]"
                        value="{{ $tienNghi->ma_tien_nghi }}" {{ in_array(
                            $tienNghi->ma_tien_nghi,
                            old('tien_nghi_loai_phong.'.$index, [])
                        ) ? 'checked' : '' }}>

                    <span>

                        {{ $tienNghi->ten_tien_nghi }}

                    </span>

                </label>

                @endforeach

            </div>

        </div>

        @endforeach

        {{-- Điều hướng --}}
        <div class="flex justify-between">

            <a href="{{ route('doitac.khachsan.create.form3') }}"
                class="px-8 py-3 rounded-xl border border-slate-300 hover:bg-slate-100 font-semibold">

                <i class="fa-solid fa-arrow-left mr-2"></i>

                Quay lại

            </a>

            <button type="submit" class="bg-[#1040C5] hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold">

                <i class="fa-solid fa-paper-plane mr-2"></i>

                Gửi khách sạn chờ duyệt

            </button>

        </div>

    </form>

</div>

@endsection