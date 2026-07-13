@extends('doitac.trangchinh.partner')

@section('title','Đăng ký khách sạn')

@section('content')

<div class="max-w-6xl mx-auto">

    {{-- Progress --}}
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm px-10 py-6 mb-6">

        <div class="flex items-center">

            {{-- Bước 1 --}}
            <div class="flex flex-col items-center">

                <div
                    class="w-10 h-10 rounded-full bg-[#1040C5] text-white font-semibold flex items-center justify-center">

                    1

                </div>

                <span class="mt-2 text-sm font-semibold text-[#1040C5]">

                    Thông tin

                </span>

            </div>

            <div class="flex-1 h-[2px] bg-slate-200 mx-5"></div>

            {{-- Bước 2 --}}
            <div class="flex flex-col items-center">

                <div
                    class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 font-semibold flex items-center justify-center">

                    2

                </div>

                <span class="mt-2 text-sm text-slate-500">

                    Hình ảnh

                </span>

            </div>

            <div class="flex-1 h-[2px] bg-slate-200 mx-5"></div>

            {{-- Bước 3 --}}
            <div class="flex flex-col items-center">

                <div
                    class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 font-semibold flex items-center justify-center">

                    3

                </div>

                <span class="mt-2 text-sm text-slate-500">

                    Loại phòng

                </span>

            </div>

            <div class="flex-1 h-[2px] bg-slate-200 mx-5"></div>

            {{-- Bước 4 --}}
            <div class="flex flex-col items-center">

                <div
                    class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 font-semibold flex items-center justify-center">

                    4

                </div>

                <span class="mt-2 text-sm text-slate-500">

                    Tiện nghi

                </span>

            </div>

        </div>

    </div>

    <form action="{{ route('doitac.khachsan.create.form1.store') }}" method="POST"
        class="bg-white border border-slate-200 rounded-2xl shadow-sm">

        @csrf

        <div class="p-8">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                {{-- Tên khách sạn --}}
                <div class="lg:col-span-2">

                    <label class="block mb-2 font-semibold text-[#061755]">
                        Tên khách sạn <span class="text-red-500">*</span>
                    </label>

                    <input type="text" name="ten_khach_san" value="{{ old('ten_khach_san') }}"
                        class="w-full rounded-xl border px-4 py-3 @error('ten_khach_san') border-red-500 @enderror">

                    @error('ten_khach_san')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Địa điểm --}}
                <div>

                    <label class="block mb-2 font-semibold text-[#061755]">
                        Địa điểm <span class="text-red-500">*</span>
                    </label>

                    <select name="ma_dia_diem"
                        class="w-full rounded-xl border px-4 py-3 @error('ma_dia_diem') border-red-500 @enderror">

                        <option value="">Chọn địa điểm</option>

                        @foreach($diaDiems as $diaDiem)

                        <option value="{{ $diaDiem->ma_dia_diem }}" @selected(old('ma_dia_diem')==$diaDiem->
                            ma_dia_diem)>

                            {{ $diaDiem->ten_dia_diem }}

                        </option>

                        @endforeach

                    </select>

                    @error('ma_dia_diem')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Số sao --}}
                <div>

                    <label class="block mb-2 font-semibold text-[#061755]">
                        Số sao <span class="text-red-500">*</span>
                    </label>

                    <select name="so_sao_khach_san" class="w-full rounded-xl border px-4 py-3">

                        @foreach($soSaos as $soSao)

                        <option value="{{ $soSao }}" @selected(old('so_sao_khach_san')==$soSao)>

                            {{ $soSao }} Sao

                        </option>

                        @endforeach

                    </select>

                </div>

                {{-- Địa chỉ --}}
                <div class="lg:col-span-2">

                    <label class="block mb-2 font-semibold text-[#061755]">
                        Địa chỉ <span class="text-red-500">*</span>
                    </label>

                    <input type="text" name="dia_chi" value="{{ old('dia_chi') }}"
                        class="w-full rounded-xl border px-4 py-3">

                </div>

                {{-- Vĩ độ --}}
                <div>

                    <label class="block mb-2 font-semibold text-[#061755]">

                        Vĩ độ

                    </label>

                    <input type="text" name="vi_do" value="{{ old('vi_do') }}"
                        class="w-full rounded-xl border px-4 py-3">

                </div>

                {{-- Kinh độ --}}
                <div>

                    <label class="block mb-2 font-semibold text-[#061755]">

                        Kinh độ

                    </label>

                    <input type="text" name="kinh_do" value="{{ old('kinh_do') }}"
                        class="w-full rounded-xl border px-4 py-3">

                </div>

                {{-- Điện thoại --}}
                <div>

                    <label class="block mb-2 font-semibold text-[#061755]">
                        Số điện thoại <span class="text-red-500">*</span>
                    </label>

                    <input type="text" name="so_dien_thoai" value="{{ old('so_dien_thoai') }}"
                        class="w-full rounded-xl border px-4 py-3">

                </div>

                {{-- Email --}}
                <div>

                    <label class="block mb-2 font-semibold text-[#061755]">
                        Email <span class="text-red-500">*</span>
                    </label>

                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full rounded-xl border px-4 py-3">

                </div>

                {{-- Check in --}}
                <div>

                    <label class="block mb-2 font-semibold text-[#061755]">

                        Giờ Check-in

                    </label>

                    <input type="time" name="gio_check_in" value="{{ old('gio_check_in') }}"
                        class="w-full rounded-xl border px-4 py-3">

                </div>

                {{-- Check out --}}
                <div>

                    <label class="block mb-2 font-semibold text-[#061755]">

                        Giờ Check-out

                    </label>

                    <input type="time" name="gio_check_out" value="{{ old('gio_check_out') }}"
                        class="w-full rounded-xl border px-4 py-3">

                </div>

                {{-- Hủy miễn phí --}}
                <div class="lg:col-span-2">

                    <label class="block mb-2 font-semibold text-[#061755]">

                        Số giờ hủy miễn phí

                    </label>

                    <input type="number" min="0" name="so_gio_huy_mien_phi" value="{{ old('so_gio_huy_mien_phi') }}"
                        class="w-full rounded-xl border px-4 py-3">

                </div>

                {{-- Mô tả --}}
                <div class="lg:col-span-2">

                    <label class="block mb-2 font-semibold text-[#061755]">

                        Mô tả

                    </label>

                    <textarea rows="6" name="mo_ta"
                        class="w-full rounded-xl border px-4 py-3">{{ old('mo_ta') }}</textarea>

                </div>

            </div>

            {{-- Footer --}}
            <div class="border-t border-slate-200 px-8 pt-5">

                <div class="flex justify-center gap-10">

                    <a href="{{ route('doitac.khachsan.index') }}"
                        class="rounded-xl border border-slate-300 bg-white px-6 py-3 font-semibold text-slate-700 transition hover:bg-slate-100">

                        Quay lại

                    </a>

                    <button type="submit"
                        class="rounded-xl bg-[#1040C5] px-8 py-3 font-semibold text-white transition hover:bg-blue-700">

                        Tiếp tục

                    </button>

                </div>
            </div>

    </form>

</div>

@endsection