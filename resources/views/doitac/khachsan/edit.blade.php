@extends('doitac.trangchinh.partner')

@section('title', 'Chỉnh sửa khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">

        <div>

            <a href="{{ route('doitac.khachsan.index') }}"
                class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-[#061755] transition">

                <i class="fa-solid fa-arrow-left"></i>

                Quay lại danh sách

            </a>

            <h1 class="mt-3 text-3xl font-bold text-[#061755]">

                Chỉnh sửa khách sạn

            </h1>

            <p class="mt-2 text-gray-500">

                Cập nhật thông tin khách sạn và gửi lại để quản trị viên xét duyệt.

            </p>

        </div>

        <div>

            @if($khachSan->trang_thai_duyet == 'ChoDuyet')

            <span
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 font-semibold">

                <i class="fa-solid fa-hourglass-half"></i>

                Chờ duyệt

            </span>

            @elseif($khachSan->trang_thai_duyet == 'DaDuyet')

            <span
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold">

                <i class="fa-solid fa-circle-check"></i>

                Đã duyệt

            </span>

            @else

            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-700 font-semibold">

                <i class="fa-solid fa-circle-xmark"></i>

                Bị từ chối

            </span>

            @endif

        </div>

    </div>


    {{-- Lý do từ chối --}}
    @if($khachSan->trang_thai_duyet == 'TuChoi')

    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5">

        <div class="flex items-center gap-2 text-red-700 font-semibold">

            <i class="fa-solid fa-triangle-exclamation"></i>

            Lý do từ chối

        </div>

        <div class="mt-3 text-gray-700 whitespace-pre-line">

            {{ $khachSan->ly_do_tu_choi }}

        </div>

    </div>

    @endif


    <form action="{{ route('doitac.khachsan.update',$khachSan->ma_khach_san) }}" method="POST"
        enctype="multipart/form-data">

        @csrf

        @method('PATCH')

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

            {{-- ========================================================= --}}
            {{-- THÔNG TIN KHÁCH SẠN --}}
            {{-- ========================================================= --}}

            <div class="bg-white rounded-2xl shadow-sm p-6">

                <h2 class="text-xl font-bold text-[#061755] mb-6">

                    Thông tin khách sạn

                </h2>

                <div class="grid grid-cols-2 gap-5">
                    {{-- Tên khách sạn --}}
                    <div class="col-span-2">

                        <label class="block mb-2 font-medium">

                            Tên khách sạn <span class="text-red-500">*</span>

                        </label>

                        <input type="text" name="ten_khach_san"
                            value="{{ old('ten_khach_san',$khachSan->ten_khach_san) }}"
                            class="w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Địa điểm --}}
                    <div>

                        <label class="block mb-2 font-medium">

                            Địa điểm <span class="text-red-500">*</span>

                        </label>

                        <select name="ma_dia_diem" class="w-full rounded-xl border px-4 py-3">

                            @foreach($diaDiems as $diaDiem)

                            <option value="{{ $diaDiem->ma_dia_diem }}"
                                {{ old('ma_dia_diem',$khachSan->ma_dia_diem)==$diaDiem->ma_dia_diem?'selected':'' }}>

                                {{ $diaDiem->ten_dia_diem }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Số sao --}}
                    <div>

                        <label class="block mb-2 font-medium">

                            Số sao

                        </label>

                        <select name="so_sao_khach_san" class="w-full rounded-xl border px-4 py-3">

                            @for($i=1;$i<=5;$i++) <option value="{{ $i }}"
                                {{ old('so_sao_khach_san',$khachSan->so_sao_khach_san)==$i?'selected':'' }}>

                                {{ $i }} Sao

                                </option>

                                @endfor

                        </select>

                    </div>

                    {{-- Địa chỉ --}}
                    <div class="col-span-2">

                        <label class="block mb-2 font-medium">

                            Địa chỉ

                        </label>

                        <input type="text" name="dia_chi" value="{{ old('dia_chi',$khachSan->dia_chi) }}"
                            class="w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Vĩ độ --}}
                    <div>

                        <label class="block mb-2 font-medium">

                            Vĩ độ

                        </label>

                        <input type="text" name="vi_do" value="{{ old('vi_do',$khachSan->vi_do) }}"
                            class="w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Kinh độ --}}
                    <div>

                        <label class="block mb-2 font-medium">

                            Kinh độ

                        </label>

                        <input type="text" name="kinh_do" value="{{ old('kinh_do',$khachSan->kinh_do) }}"
                            class="w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Số điện thoại --}}
                    <div>

                        <label class="block mb-2 font-medium">

                            Số điện thoại

                        </label>

                        <input type="text" name="so_dien_thoai"
                            value="{{ old('so_dien_thoai',$khachSan->so_dien_thoai) }}"
                            class="w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Email --}}
                    <div>

                        <label class="block mb-2 font-medium">

                            Email

                        </label>

                        <input type="email" name="email" value="{{ old('email',$khachSan->email) }}"
                            class="w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Check-in --}}
                    <div>

                        <label class="block mb-2 font-medium">

                            Giờ Check-in

                        </label>

                        <input type="time" name="gio_check_in" value="{{ old('gio_check_in',$khachSan->gio_check_in) }}"
                            class="w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Check-out --}}
                    <div>

                        <label class="block mb-2 font-medium">

                            Giờ Check-out

                        </label>

                        <input type="time" name="gio_check_out"
                            value="{{ old('gio_check_out',$khachSan->gio_check_out) }}"
                            class="w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Hủy miễn phí --}}
                    <div class="col-span-2">

                        <label class="block mb-2 font-medium">

                            Số giờ hủy miễn phí

                        </label>

                        <input type="number" name="so_gio_huy_mien_phi"
                            value="{{ old('so_gio_huy_mien_phi',$khachSan->so_gio_huy_mien_phi) }}"
                            class="w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Mô tả --}}
                    <div class="col-span-2">

                        <label class="block mb-2 font-medium">

                            Mô tả

                        </label>

                        <textarea name="mo_ta" rows="6"
                            class="w-full rounded-xl border px-4 py-3 resize-none">{{ old('mo_ta',$khachSan->mo_ta) }}</textarea>

                    </div>

                </div>

            </div> {{-- ========================================================= --}}
            {{-- HÌNH ẢNH KHÁCH SẠN --}}
            {{-- ========================================================= --}}

            <div class="bg-white rounded-2xl shadow-sm p-6">

                <div class="flex items-center justify-between mb-6">

                    <h2 class="text-xl font-bold text-[#061755]">

                        Hình ảnh khách sạn

                    </h2>

                    <label
                        class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white cursor-pointer transition">

                        <i class="fa-solid fa-plus mr-2"></i>

                        Thêm ảnh

                        <input type="file" name="anh_moi[]" multiple accept="image/*" class="hidden">

                    </label>

                </div>

                @if($khachSan->hinhAnh->count())

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                    @foreach($khachSan->hinhAnh as $hinhAnh)

                    <div class="relative group">

                        <img src="{{ asset($hinhAnh->duong_dan_anh) }}"
                            class="w-full h-40 rounded-xl border object-cover">

                        <label
                            class="absolute top-2 right-2 w-8 h-8 rounded-full bg-white shadow flex items-center justify-center cursor-pointer hover:bg-red-50">

                            <input type="checkbox" name="xoa_anh[]" value="{{ $hinhAnh->ma_hinh_anh }}"
                                class="hidden peer">

                            <i class="fa-solid fa-xmark text-gray-600 peer-checked:text-red-600"></i>

                        </label>

                    </div>

                    @endforeach

                </div>

                @else

                <div
                    class="h-64 rounded-2xl border-2 border-dashed border-gray-300 flex flex-col items-center justify-center">

                    <i class="fa-regular fa-image text-5xl text-gray-300 mb-4"></i>

                    <p class="text-gray-500">

                        Khách sạn chưa có hình ảnh

                    </p>

                </div>

                @endif

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- LOẠI PHÒNG --}}
        {{-- ========================================================= --}}

        <div class="mt-6 bg-white rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between mb-5">

                <h2 class="text-xl font-bold text-[#061755]">

                    Loại phòng

                </h2>

                <button type="button" class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white">

                    <i class="fa-solid fa-plus mr-2"></i>

                    Thêm loại phòng

                </button>

            </div>
            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-4 py-3 text-left font-semibold">

                                Ảnh

                            </th>

                            <th class="px-4 py-3 text-left font-semibold">

                                Tên loại phòng

                            </th>

                            <th class="px-4 py-3 text-center font-semibold">

                                Sức chứa

                            </th>

                            <th class="px-4 py-3 text-center font-semibold">

                                Diện tích

                            </th>

                            <th class="px-4 py-3 text-center font-semibold">

                                Giá

                            </th>

                            <th class="px-4 py-3 text-center font-semibold">

                                Thao tác

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($khachSan->loaiPhongs as $phong)

                        @php

                        $anh = $phong->hinhAnh->first();

                        @endphp

                        <tr class="border-t hover:bg-slate-50">

                            <td class="px-4 py-4">

                                @if($anh)

                                <img src="{{ asset($anh->duong_dan_anh) }}"
                                    class="w-24 h-20 rounded-xl border object-cover">

                                @else

                                <div class="w-24 h-20 rounded-xl border bg-gray-100 flex items-center justify-center">

                                    <i class="fa-regular fa-image text-gray-400"></i>

                                </div>

                                @endif

                            </td>

                            <td class="px-4 py-4">

                                <div class="font-semibold">

                                    {{ $phong->ten_loai_phong }}

                                </div>

                                @if($phong->mo_ta)

                                <div class="text-sm text-gray-500 mt-1">

                                    {{ $phong->mo_ta }}

                                </div>

                                @endif

                            </td>

                            <td class="px-4 py-4 text-center">

                                {{ $phong->so_nguoi_toi_da }}

                            </td>

                            <td class="px-4 py-4 text-center">

                                {{ $phong->dien_tich }} m²

                            </td>

                            <td class="px-4 py-4 text-center font-semibold text-[#061755]">

                                {{ number_format($phong->gia_co_ban,0,',','.') }}

                                đ

                            </td>

                            <td class="px-4 py-4">

                                <div class="flex justify-center gap-3">

                                    <button type="button"
                                        class="w-9 h-9 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-200 transition">

                                        <i class="fa-solid fa-pen"></i>

                                    </button>

                                    <button type="button"
                                        class="w-9 h-9 rounded-full bg-red-100 text-red-600 hover:bg-red-200 transition">

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6" class="py-12 text-center text-gray-500">

                                Chưa có loại phòng.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div> {{-- ========================================================= --}}
        {{-- TIỆN NGHI --}}
        {{-- ========================================================= --}}

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mt-6">

            {{-- Tiện nghi khách sạn --}}
            <div class="bg-white rounded-2xl shadow-sm p-6">

                <h2 class="text-xl font-bold text-[#061755] mb-5">

                    Tiện nghi khách sạn

                </h2>

                <div class="grid grid-cols-2 gap-4">

                    @foreach($tienNghis as $tienNghi)

                    <label class="flex items-center gap-3 cursor-pointer">

                        <input type="checkbox" name="tien_nghi[]" value="{{ $tienNghi->ma_tien_nghi }}"
                            {{ $khachSan->tienNghis->contains('ma_tien_nghi',$tienNghi->ma_tien_nghi) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-blue-600">

                        <span>

                            {{ $tienNghi->ten_tien_nghi }}

                        </span>

                    </label>

                    @endforeach

                </div>

            </div>



            {{-- Tiện nghi từng loại phòng --}}
            <div class="bg-white rounded-2xl shadow-sm p-6">

                <h2 class="text-xl font-bold text-[#061755] mb-5">

                    Tiện nghi loại phòng

                </h2>

                @foreach($khachSan->loaiPhongs as $phong)

                <div class="border rounded-xl p-4 mb-5">

                    <div class="font-semibold text-[#061755] mb-4">

                        {{ $phong->ten_loai_phong }}

                    </div>

                    <div class="grid grid-cols-2 gap-3">

                        @foreach($tienNghis as $tienNghi)

                        <label class="flex items-center gap-3 cursor-pointer">

                            <input type="checkbox" name="phong_tien_nghi[{{ $phong->ma_loai_phong }}][]"
                                value="{{ $tienNghi->ma_tien_nghi }}"
                                {{ $phong->tienNghis->contains('ma_tien_nghi',$tienNghi->ma_tien_nghi) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-blue-600">

                            <span>

                                {{ $tienNghi->ten_tien_nghi }}

                            </span>

                        </label>

                        @endforeach

                    </div>

                </div>

                @endforeach

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- BUTTON --}}
        {{-- ========================================================= --}}

        <div class="flex justify-end gap-4 mt-8">

            <a href="{{ route('doitac.khachsan.index') }}"
                class="px-8 py-3 rounded-xl border border-gray-300 hover:bg-gray-100 transition">

                Hủy

            </a>

            <button type="submit"
                class="px-8 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition">

                <i class="fa-solid fa-paper-plane mr-2"></i>

                Lưu thay đổi & Gửi duyệt lại

            </button>

        </div>

    </form>

</div>

@endsection