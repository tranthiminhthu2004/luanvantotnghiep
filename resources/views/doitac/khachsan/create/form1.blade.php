@extends('doitac.index')

@section('title', 'Đăng khách sạn')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- Tiêu đề --}}
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-[#061755]">
            Đăng ký khách sạn
        </h2>

        <p class="mt-2 text-slate-500">
            Hoàn thành 4 bước để gửi khách sạn lên hệ thống.
        </p>

    </div>

    {{-- Thanh tiến trình --}}
    <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">

        <div class="flex items-center justify-between">

            {{-- Bước 1 --}}
            <div class="flex flex-col items-center flex-1">

                <div
                    class="w-12 h-12 rounded-full bg-[#1040C5] text-white flex items-center justify-center font-bold text-lg">

                    1

                </div>

                <p class="mt-3 font-semibold text-[#1040C5]">
                    Thông tin
                </p>

            </div>

            <div class="flex-1 h-1 bg-slate-200"></div>

            {{-- Bước 2 --}}
            <div class="flex flex-col items-center flex-1">

                <div
                    class="w-12 h-12 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold text-lg">

                    2

                </div>

                <p class="mt-3 text-slate-500">
                    Hình ảnh
                </p>

            </div>

            <div class="flex-1 h-1 bg-slate-200"></div>

            {{-- Bước 3 --}}
            <div class="flex flex-col items-center flex-1">

                <div
                    class="w-12 h-12 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold text-lg">

                    3

                </div>

                <p class="mt-3 text-slate-500">
                    Loại phòng
                </p>

            </div>

            <div class="flex-1 h-1 bg-slate-200"></div>

            {{-- Bước 4 --}}
            <div class="flex flex-col items-center flex-1">

                <div
                    class="w-12 h-12 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold text-lg">

                    4

                </div>

                <p class="mt-3 text-slate-500">
                    Tiện nghi
                </p>

            </div>

        </div>

    </div>

    {{-- Form --}}
    <form action="{{ route('doitac.khachsan.create.form1.store') }}" method="POST"
        class="bg-white rounded-2xl shadow-sm p-8">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="md:col-span-2">

                <label class="font-semibold text-[#061755]">
                    Tên khách sạn <span class="text-red-500">*</span>
                </label>

                <input type="text" name="ten_khach_san" value="{{ old('ten_khach_san') }}" class="mt-2 w-full rounded-xl border px-4 py-3
        @error('ten_khach_san') border-red-500 @enderror">

                @error('ten_khach_san')
                <p class="mt-1 text-sm text-red-500">
                    {{ $message }}
                </p>
                @enderror

            </div>
            {{-- Địa điểm --}}
            <div>

                <label class="font-semibold text-[#061755]">
                    Địa điểm <span class="text-red-500">*</span>
                </label>

                <select name="ma_dia_diem" class="mt-2 w-full rounded-xl border px-4 py-3
        @error('ma_dia_diem') border-red-500 @enderror">

                    <option value="">
                        Chọn địa điểm
                    </option>

                    @foreach($diaDiems as $diaDiem)

                    <option value="{{ $diaDiem->ma_dia_diem }}" @selected(old('ma_dia_diem')==$diaDiem->ma_dia_diem)>

                        {{ $diaDiem->ten_dia_diem }}

                    </option>

                    @endforeach

                </select>

                @error('ma_dia_diem')
                <p class="mt-1 text-sm text-red-500">
                    {{ $message }}
                </p>
                @enderror

            </div>

            {{-- Số sao --}}
            <div>

                <label class="font-semibold text-[#061755]">

                    Số sao

                </label>

                <select name="so_sao_khach_san" class="mt-2 w-full rounded-xl border px-4 py-3">

                    @foreach($soSaos as $soSao)

                    <option value="{{ $soSao->so_sao_khach_san }}">

                        {{ $soSao->so_sao_khach_san }} Sao

                    </option>

                    @endforeach

                </select>

            </div>

            {{-- Địa chỉ --}}
            <div class="md:col-span-2">

                <label class="font-semibold text-[#061755]">

                    Địa chỉ <span class="text-red-500">*</span>

                </label>

                <input type="text" name="dia_chi" value="{{ old('dia_chi') }}"
                    class="mt-2 w-full rounded-xl border px-4 py-3">

            </div>

            {{-- Vĩ độ --}}
            <div>

                <label class="font-semibold text-[#061755]">

                    Vĩ độ

                </label>

                <input type="text" name="vi_do" value="{{ old('vi_do') }}"
                    class="mt-2 w-full rounded-xl border px-4 py-3">

            </div>

            {{-- Kinh độ --}}
            <div>

                <label class="font-semibold text-[#061755]">

                    Kinh độ

                </label>

                <input type="text" name="kinh_do" value="{{ old('kinh_do') }}"
                    class="mt-2 w-full rounded-xl border px-4 py-3">

            </div>

            {{-- SĐT --}}
            <div>

                <label class="font-semibold text-[#061755]">

                    Số điện thoại <span class="text-red-500">*</span>

                </label>

                <input type="text" name="so_dien_thoai" value="{{ old('so_dien_thoai') }}"
                    class="mt-2 w-full rounded-xl border px-4 py-3">

            </div>

            {{-- Email --}}
            <div>

                <label class="font-semibold text-[#061755]">
                    Email <span class="text-red-500">*</span>
                </label>

                <input type="email" name="email" value="{{ old('email') }}" class="mt-2 w-full rounded-xl border px-4 py-3
        @error('email') border-red-500 @enderror">

                @error('email')
                <p class="mt-1 text-sm text-red-500">
                    {{ $message }}
                </p>
                @enderror

            </div>

            {{-- Check in --}}
            <div>

                <label class="font-semibold text-[#061755]">

                    Giờ Check-in

                </label>

                <input type="time" name="gio_check_in" value="{{ old('gio_check_in') }}"
                    class="mt-2 w-full rounded-xl border px-4 py-3">

            </div>

            {{-- Check out --}}
            <div>

                <label class="font-semibold text-[#061755]">

                    Giờ Check-out

                </label>

                <input type="time" name="gio_check_out" value="{{ old('gio_check_out') }}"
                    class="mt-2 w-full rounded-xl border px-4 py-3">

            </div>

            {{-- Số giờ hủy --}}
            <div class="md:col-span-2">

                <label class="font-semibold text-[#061755]">

                    Số giờ hủy miễn phí

                </label>

                <input type="number" min="0" name="so_gio_huy_mien_phi" value="{{ old('so_gio_huy_mien_phi') }}"
                    class="mt-2 w-full rounded-xl border px-4 py-3">

            </div>

            {{-- Mô tả --}}
            <div class="md:col-span-2">

                <label class="font-semibold text-[#061755]">

                    Mô tả

                </label>

                <textarea rows="5" name="mo_ta"
                    class="mt-2 w-full rounded-xl border px-4 py-3">{{ old('mo_ta') }}</textarea>

            </div>

        </div>

        <div class="mt-10 flex justify-end">

            <button class="bg-[#1040C5] hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold">

                Tiếp tục

                <i class="fa-solid fa-arrow-right ml-2"></i>

            </button>

        </div>

    </form>

</div>

@endsection