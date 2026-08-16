@extends('doitac.trangchinh.partner')

@section('title', 'Đăng ký khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm px-8 py-5 mb-6">

        <div class="flex items-center">

            <div class="flex flex-col items-center">

                <div class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center">

                    <i class="fa-solid fa-check"></i>

                </div>

                <span class="mt-2 text-sm font-medium text-green-600">Thông tin</span>

            </div>

            <div class="flex-1 h-0.5 bg-green-500 mx-4"></div>

            <div class="flex flex-col items-center">

                <div class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center">

                    <i class="fa-solid fa-check"></i>

                </div>

                <span class="mt-2 text-sm font-medium text-green-600">Hình ảnh</span>

            </div>

            <div class="flex-1 h-0.5 bg-green-500 mx-4"></div>

            <div class="flex flex-col items-center">

                <div
                    class="w-10 h-10 rounded-full bg-[#1040C5] text-white flex items-center justify-center font-semibold">

                    3

                </div>

                <span class="mt-2 text-sm font-semibold text-[#1040C5]">Loại phòng</span>

            </div>

            <div class="flex-1 h-0.5 bg-slate-200 mx-4"></div>

            <div class="flex flex-col items-center">

                <div
                    class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-semibold">
                    4

                </div>

                <span class="mt-2 text-sm text-slate-500">Tiện nghi</span>

            </div>

        </div>

    </div>

    <form action="{{ route('doitac.khachsan.create.form3.store') }}" method="POST" enctype="multipart/form-data"
        id="formLoaiPhong" novalidate>

        @csrf

        <div id="danhSachLoaiPhong">

            @foreach($loaiPhongs as $index => $loaiPhong)

            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8 mb-6 loai-phong">

                <div class="flex items-center justify-between mb-8">

                    <h3 class="text-2xl font-bold text-[#061755] tieuDeLoaiPhong">

                        Loại phòng {{ $index + 1 }}

                    </h3>

                    <button type="button"
                        class="xoaLoaiPhong {{ $index == 0 ? 'hidden' : '' }} rounded-xl bg-red-500 px-5 py-2 font-semibold text-white transition hover:bg-red-600">
                        Xóa

                    </button>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Tên loại phòng --}}
                    <div>
                        <label class="block font-semibold text-[#061755] mb-2">
                            Tên loại phòng <span class="text-red-500">*</span>
                        </label>

                        <input type="text" name="loai_phong[{{ $index }}][ten_loai_phong]"
                            value="{{ old("loai_phong.$index.ten_loai_phong", $loaiPhong['ten_loai_phong'] ?? '') }}"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none">

                        @error("loai_phong.$index.ten_loai_phong")
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Số người tối đa --}}
                    <div>
                        <label class="block font-semibold text-[#061755] mb-2">
                            Số người tối đa <span class="text-red-500">*</span>
                        </label>

                        <input type="number" name="loai_phong[{{ $index }}][so_nguoi_toi_da]"
                            value="{{ old("loai_phong.$index.so_nguoi_toi_da", $loaiPhong['so_nguoi_toi_da'] ?? '') }}"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none">

                        @error("loai_phong.$index.so_nguoi_toi_da")
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Diện tích --}}
                    <div>
                        <label class="block font-semibold text-[#061755] mb-2">
                            Diện tích (m²) <span class="text-red-500">*</span>
                        </label>

                        <input type="number" name="loai_phong[{{ $index }}][dien_tich]"
                            value="{{ old("loai_phong.$index.dien_tich", $loaiPhong['dien_tich'] ?? '') }}"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none">

                        @error("loai_phong.$index.dien_tich")
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Số giường --}}
                    <div>
                        <label class="block font-semibold text-[#061755] mb-2">
                            Số giường <span class="text-red-500">*</span>
                        </label>

                        <input type="number" name="loai_phong[{{ $index }}][so_giuong]"
                            value="{{ old("loai_phong.$index.so_giuong", $loaiPhong['so_giuong'] ?? '') }}"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none">

                        @error("loai_phong.$index.so_giuong")
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Giá cơ bản --}}
                    <div>
                        <label class="block font-semibold text-[#061755] mb-2">
                            Giá cơ bản <span class="text-red-500">*</span>
                        </label>

                        <input type="number" name="loai_phong[{{ $index }}][gia_co_ban]"
                            value="{{ old("loai_phong.$index.gia_co_ban", $loaiPhong['gia_co_ban'] ?? '') }}"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none">

                        @error("loai_phong.$index.gia_co_ban")
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Hình ảnh --}}
                    <div>

                        <label class="block font-semibold text-[#061755] mb-2">
                            Hình ảnh loại phòng

                            @if(empty($loaiPhong['hinh_anh']))
                            <span class="text-red-500">*</span>
                            @endif
                        </label>

                        {{-- giữ tên ảnh cũ --}}
                        <input type="hidden" name="loai_phong[{{ $index }}][hinh_anh_cu]"
                            value="{{ old("loai_phong.$index.hinh_anh_cu", $loaiPhong['hinh_anh'] ?? '') }}">

                        <input type="hidden" name="loai_phong[{{ $index }}][ma_loai_phong]"
                            value="{{ $loaiPhong['ma_loai_phong'] ?? '' }}">

                        {{-- Ô chọn file nằm ngay dưới label để căn ngang hàng với ô Giá cơ bản --}}
                        <input type="file" accept=".jpg,.jpeg,.png,.webp" name="loai_phong[{{ $index }}][hinh_anh]"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 bg-white">

                        @error("loai_phong.$index.hinh_anh")
                        <span class="text-red-500 text-sm block mt-1">
                            {{ $message }}
                        </span>
                        @enderror

                        {{-- Xem trước ảnh nằm phía dưới ô chọn file --}}
                        <div class="mt-3">

                            @php
                            $anh = old("loai_phong.$index.hinh_anh_cu", $loaiPhong['hinh_anh'] ?? '');
                            @endphp

                            @if($anh)

                            <div class="flex items-center gap-3">
                                <img src="{{ asset('images/loaiphong/'.$anh) }}"
                                    class="previewLoaiPhong w-28 h-28 rounded-xl object-cover border border-slate-300 shadow-sm">
                                <span class="text-xs text-slate-500">Ảnh hiện tại</span>
                            </div>

                            @else

                            <div class="flex items-center gap-3">
                                <img class="previewLoaiPhong hidden w-28 h-28 rounded-xl object-cover border border-slate-300 shadow-sm">
                            </div>

                            @endif

                        </div>

                    </div>

                    {{-- Mô tả --}}
                    <div class="md:col-span-2">
                        <label class="block font-semibold text-[#061755] mb-2">

                            Mô tả
                        </label>

                        <textarea rows="5" name="loai_phong[{{ $index }}][mo_ta]"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 resize-none focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none">{{ old("loai_phong.$index.mo_ta", $loaiPhong['mo_ta'] ?? '') }}</textarea>
                    </div>

                </div>

                {{-- Danh sách phòng --}}
                <div class="md:col-span-2 mt-8">

                    {{-- Header danh sách phòng --}}
                    <div class="flex items-center justify-between mb-5">

                        <h4 class="text-xl font-bold text-[#061755]">
                            Danh sách phòng
                        </h4>

                        <button type="button"
                            class="themPhong rounded-xl bg-green-600 px-5 py-2 text-white font-semibold hover:bg-green-700 transition">

                            <i class="fa-solid fa-plus mr-2"></i>
                            Thêm phòng

                        </button>

                    </div>

                    {{-- Danh sách phòng --}}
                    <div class="danhSachPhong">

                        @foreach($loaiPhong['phong'] as $phongIndex => $phong)

                        <div class="phong-item border border-slate-200 rounded-2xl p-5 mb-4 bg-slate-50">

                            {{-- Header --}}
                            <div class="flex items-center justify-between mb-5">

                                <h5 class="tieuDePhong font-bold text-[#061755]">
                                    Phòng {{ $phongIndex + 1 }}
                                </h5>

                                <button type="button"
                                    class="xoaPhong {{ count($loaiPhong['phong']) == 1 ? 'hidden' : '' }} rounded-lg bg-red-500 px-4 py-2 text-white hover:bg-red-600">

                                    Xóa

                                </button>

                            </div>

                            {{-- Thông tin phòng --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                {{-- Số phòng --}}
                                <div>

                                    <label class="block font-semibold text-[#061755] mb-2">
                                        Số phòng <span class="text-red-500">*</span>
                                    </label>

                                    <input type="hidden"
                                        name="loai_phong[{{ $index }}][phong][{{ $phongIndex }}][ma_phong]"
                                        value="{{ $phong['ma_phong'] ?? '' }}">

                                    <input type="text"
                                        name="loai_phong[{{ $index }}][phong][{{ $phongIndex }}][so_phong]"
                                        value="{{ old("loai_phong.$index.phong.$phongIndex.so_phong", $phong['so_phong'] ?? '') }}"
                                        class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none">

                                    @error("loai_phong.$index.phong.$phongIndex.so_phong")
                                    <span class="text-red-500 text-sm">
                                        {{ $message }}
                                    </span>
                                    @enderror

                                </div>

                                {{-- Tầng --}}
                                <div>

                                    <label class="block font-semibold text-[#061755] mb-2">
                                        Tầng <span class="text-red-500">*</span>
                                    </label>

                                    <input type="number" name="loai_phong[{{ $index }}][phong][{{ $phongIndex }}][tang]"
                                        value="{{ old("loai_phong.$index.phong.$phongIndex.tang", $phong['tang'] ?? '') }}"
                                        class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none">

                                    @error("loai_phong.$index.phong.$phongIndex.tang")
                                    <span class="text-red-500 text-sm">
                                        {{ $message }}
                                    </span>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        @endforeach

                    </div>

                </div>
            </div>

        </div>

        @endforeach

</div>

{{-- Nút thêm loại phòng --}}
<div class="mb-6 flex justify-center">
    <button type="button" id="themLoaiPhong"
        class="rounded-xl bg-green-600 px-8 py-3 font-semibold text-white transition hover:bg-green-700">
        Thêm loại phòng
    </button>
</div>

<div class="border-t border-slate-200 bg-white px-8 py-5 rounded-b-2xl">
    <div class="flex justify-center gap-10">
        <a href="{{ route('doitac.khachsan.create.form2') }}"
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


{{-- Template thêm loại phòng --}}
<template id="templateLoaiPhong">
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8 mb-6 loai-phong">
        <div class="flex items-center justify-between mb-8">
            <h3 class="text-2xl font-bold text-[#061755] tieuDeLoaiPhong">Loại phòng</h3>
            <button type="button"
                class="xoaLoaiPhong rounded-xl bg-red-500 px-5 py-2 font-semibold text-white transition hover:bg-red-600">
                Xóa
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold text-[#061755] mb-2">Tên loại phòng <span
                        class="text-red-500">*</span></label>
                <input type="text" data-name="ten_loai_phong" required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">
            </div>
            <div>
                <label class="block font-semibold text-[#061755] mb-2">Số người tối đa <span
                        class="text-red-500">*</span></label>
                <input type="number" min="1" data-name="so_nguoi_toi_da" required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">
            </div>
            <div>
                <label class="block font-semibold text-[#061755] mb-2">Diện tích (m²) <span
                        class="text-red-500">*</span></label>
                <input type="number" min="1" data-name="dien_tich" required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">
            </div>
            <div>
                <label class="block font-semibold text-[#061755] mb-2">Số giường <span
                        class="text-red-500">*</span></label>
                <input type="number" min="1" data-name="so_giuong" required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">
            </div>
            <div>
                <label class="block font-semibold text-[#061755] mb-2">Giá cơ bản <span
                        class="text-red-500">*</span></label>
                <input type="number" min="1000" data-name="gia_co_ban" required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">
            </div>
            <div>

                <label class="block font-semibold text-[#061755] mb-2">
                    Hình ảnh loại phòng
                    <span class="text-red-500">*</span>
                </label>

                <input type="hidden" data-name="hinh_anh_cu" value="">

                <input type="hidden" data-name="ma_loai_phong" value="">

                <input type="file" accept=".jpg,.jpeg,.png,.webp" data-name="hinh_anh"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 bg-white">

                <div class="mt-3">
                    <img class="previewLoaiPhong hidden w-28 h-28 rounded-xl object-cover border border-slate-300 shadow-sm">
                </div>

            </div>
            <div class="md:col-span-2">
                <label class="block font-semibold text-[#061755] mb-2">Mô tả</label>
                <textarea rows="5" data-name="mo_ta"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 resize-none"></textarea>
            </div>
        </div>
        <div class="md:col-span-2 mt-8">
            <div class="flex items-center justify-between mb-5">
                <h4 class="text-xl font-bold text-[#061755]">Danh sách phòng</h4>
                <button type="button"
                    class="themPhong rounded-xl bg-green-600 px-5 py-2 text-white font-semibold hover:bg-green-700 transition">
                    <i class="fa-solid fa-plus mr-2"></i> Thêm phòng
                </button>
            </div>
            <div class="danhSachPhong">
                <div class="phong-item border border-slate-200 rounded-2xl p-5 mb-4 bg-slate-50">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="tieuDePhong font-bold text-[#061755]">Phòng 1</h5>
                        <button type="button"
                            class="xoaPhong hidden rounded-lg bg-red-500 px-4 py-2 text-white hover:bg-red-600">Xóa</button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block font-semibold text-[#061755] mb-2">Số phòng <span
                                    class="text-red-500">*</span></label>
                            <input type="hidden" data-phong="ma_phong" value="">
                            <input type="text" data-phong="so_phong" required
                                class="w-full rounded-xl border border-slate-300 px-4 py-3">
                        </div>
                        <div>
                            <label class="block font-semibold text-[#061755] mb-2">Tầng <span
                                    class="text-red-500">*</span></label>
                            <input type="number" min="1" data-phong="tang" required
                                class="w-full rounded-xl border border-slate-300 px-4 py-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

{{-- Template thêm phòng --}}
<template id="templatePhong">
    <div class="phong-item border border-slate-200 rounded-2xl p-5 mb-4 bg-slate-50">
        <div class="flex items-center justify-between mb-5">
            <h5 class="tieuDePhong font-bold text-[#061755]">Phòng</h5>
            <button type="button"
                class="xoaPhong rounded-lg bg-red-500 px-4 py-2 text-white hover:bg-red-600 transition">Xóa</button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block font-semibold text-[#061755] mb-2">Số phòng <span
                        class="text-red-500">*</span></label>
                <input type="text" data-phong="so_phong" required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">
            </div>
            <div>
                <label class="block font-semibold text-[#061755] mb-2">Tầng <span class="text-red-500">*</span></label>
                <input type="number" min="1" data-phong="tang" required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">
            </div>
        </div>
    </div>
</template>


{{-- ============================================================
    JAVASCRIPT
============================================================ --}}
<script>
(function() {
    'use strict';

    // DOM references
    const danhSachLoaiPhong = document.getElementById('danhSachLoaiPhong');
    const templateLoaiPhong = document.getElementById('templateLoaiPhong');
    const templatePhong = document.getElementById('templatePhong');
    const btnThemLoaiPhong = document.getElementById('themLoaiPhong');
    const formLoaiPhong = document.getElementById('formLoaiPhong');

    // ----------------------------------------------
    // Hàm cập nhật tên hiển thị cho phòng
    // ----------------------------------------------
    function capNhatTenPhong(danhSachPhong) {
        danhSachPhong.querySelectorAll('.phong-item').forEach(function(phong, index) {
            const tieuDe = phong.querySelector('.tieuDePhong');
            if (tieuDe) {
                tieuDe.textContent = 'Phòng ' + (index + 1);
            }
        });
    }

    // ----------------------------------------------
    // Cập nhật thuộc tính name cho các input trong phòng
    // ----------------------------------------------
    function capNhatNamePhong(loaiPhongItem) {
        const chiSoLoaiPhong = [...document.querySelectorAll('.loai-phong')]
            .indexOf(loaiPhongItem);

        loaiPhongItem.querySelectorAll('.phong-item').forEach(function(phong, index) {
            const maPhong = phong.querySelector('[data-phong="ma_phong"]');
            const soPhong = phong.querySelector('[data-phong="so_phong"]');
            const tang = phong.querySelector('[data-phong="tang"]');

            if (maPhong) {
                maPhong.name =
                    `loai_phong[${chiSoLoaiPhong}][phong][${index}][ma_phong]`;
            }

            if (soPhong) {
                soPhong.name =
                    `loai_phong[${chiSoLoaiPhong}][phong][${index}][so_phong]`;
            }

            if (tang) {
                tang.name =
                    `loai_phong[${chiSoLoaiPhong}][phong][${index}][tang]`;
            }
        });
    }

    // ----------------------------------------------
    // Khởi tạo chức năng thêm/xóa phòng cho một loại phòng
    // ----------------------------------------------
    function khoiTaoDanhSachPhong(loaiPhongItem) {
        const danhSachPhong = loaiPhongItem.querySelector('.danhSachPhong');
        const btnThemPhong = loaiPhongItem.querySelector('.themPhong');

        // Thêm phòng
        btnThemPhong.addEventListener('click', function() {
            const clone = templatePhong.content.cloneNode(true);
            danhSachPhong.appendChild(clone);

            capNhatTenPhong(danhSachPhong);
            capNhatNamePhong(loaiPhongItem);
        });

        // Xóa phòng (delegation)
        danhSachPhong.addEventListener('click', function(e) {
            const btn = e.target.closest('.xoaPhong');
            if (!btn) return;

            btn.closest('.phong-item').remove();

            capNhatTenPhong(danhSachPhong);
            capNhatNamePhong(loaiPhongItem);
        });

        // Cập nhật ban đầu
        capNhatTenPhong(danhSachPhong);
        capNhatNamePhong(loaiPhongItem);
    }

    // ----------------------------------------------
    // Thêm loại phòng mới
    // ----------------------------------------------
    btnThemLoaiPhong.addEventListener('click', function() {
        const index = danhSachLoaiPhong.querySelectorAll('.loai-phong').length;
        const clone = templateLoaiPhong.content.cloneNode(true);

        // Tiêu đề
        clone.querySelector('.tieuDeLoaiPhong').textContent = 'Loại phòng ' + (index + 1);

        // Cập nhật name cho các input dựa trên data-name
        clone.querySelectorAll('[data-name]').forEach(function(input) {
            const ten = input.dataset.name;
            input.name = `loai_phong[${index}][${ten}]`;
        });

        danhSachLoaiPhong.appendChild(clone);

        const loaiPhongMoi = danhSachLoaiPhong.lastElementChild;
        const preview = loaiPhongMoi.querySelector('.previewLoaiPhong');

        if (preview) {

            preview.src = '';

            preview.classList.add('hidden');

        }

        // Khởi tạo chức năng phòng cho loại phòng mới
        khoiTaoDanhSachPhong(loaiPhongMoi);

        // Cập nhật lại chỉ số cho tất cả loại phòng
        capNhatLoaiPhong();
    });

    // ----------------------------------------------
    // Cập nhật chỉ số và tên cho các loại phòng
    // ----------------------------------------------
    function capNhatLoaiPhong() {
        const danhSach = document.querySelectorAll('.loai-phong');

        danhSach.forEach(function(item, index) {
            // Tiêu đề
            item.querySelector('.tieuDeLoaiPhong').textContent = 'Loại phòng ' + (index + 1);

            // Cập nhật name cho các input (dựa trên data-name)
            item.querySelectorAll('[data-name]').forEach(function(input) {
                const ten = input.dataset.name;
                input.name = `loai_phong[${index}][${ten}]`;
            });

            // Cập nhật name cho các phòng
            capNhatNamePhong(item);

            // Hiển thị/ẩn nút xóa loại phòng
            const btnXoa = item.querySelector('.xoaLoaiPhong');
            if (index === 0) {
                btnXoa.classList.add('hidden');
            } else {
                btnXoa.classList.remove('hidden');
            }
        });
    }

    // ----------------------------------------------
    // Xóa loại phòng (delegation)
    // ----------------------------------------------
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.xoaLoaiPhong');
        if (!btn) return;

        btn.closest('.loai-phong').remove();
        capNhatLoaiPhong();
    });

    // ----------------------------------------------
    // Preview ảnh khi chọn file
    // ----------------------------------------------
    document.addEventListener('change', function(e) {

        if (e.target.type !== 'file') return;

        const file = e.target.files[0];

        if (!file) return;

        const wrapper = e.target.parentElement;

        const preview = wrapper.querySelector('.previewLoaiPhong');

        if (!preview) return;

        preview.classList.remove('hidden');

        preview.src = URL.createObjectURL(file);

    });
    // ----------------------------------------------
    // SUBMIT – kiểm tra trước khi gửi
    // ----------------------------------------------
    formLoaiPhong.addEventListener('submit', function(e) {
        // Kiểm tra có ít nhất một loại phòng
        const danhSach = document.querySelectorAll('.loai-phong');
        if (danhSach.length === 0) {
            e.preventDefault();
            alert('Vui lòng thêm ít nhất một loại phòng.');
            return;
        }

        // Kiểm tra trùng số phòng
        const danhSachSoPhong = [];
        const tatCaOSoPhong = document.querySelectorAll('[name*="[so_phong]"]');

        for (const o of tatCaOSoPhong) {
            const soPhong = o.value.trim();
            if (soPhong === '') continue;

            if (danhSachSoPhong.includes(soPhong)) {
                e.preventDefault();
                alert('Số phòng "' + soPhong + '" bị trùng. Vui lòng kiểm tra lại.');
                o.focus();
                return;
            }

            danhSachSoPhong.push(soPhong);
        }
    });

    document.querySelectorAll('.loai-phong').forEach(function(item) {
        khoiTaoDanhSachPhong(item);
    });

    // Cập nhật lần cuối
    capNhatLoaiPhong();

})();
</script>

@endsection