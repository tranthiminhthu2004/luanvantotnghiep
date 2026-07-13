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

            Hoàn thành 4 bước để gửi khách sạn lên hệ thống.

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

                <div class="w-12 h-12 rounded-full bg-[#1040C5] text-white flex items-center justify-center font-bold">

                    3

                </div>

                <p class="mt-3 font-semibold text-[#1040C5]">

                    Loại phòng

                </p>

            </div>

            <div class="flex-1 h-1 bg-slate-200"></div>

            {{-- Bước 4 --}}
            <div class="flex flex-col items-center flex-1">

                <div
                    class="w-12 h-12 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold">

                    4

                </div>

                <p class="mt-3 text-slate-500">

                    Tiện nghi

                </p>

            </div>

        </div>

    </div>

    <form action="{{ route('doitac.khachsan.create.form3.store') }}" method="POST" enctype="multipart/form-data"
        id="formLoaiPhong">

        @csrf

        <div id="danhSachLoaiPhong">

            {{-- Loại phòng đầu tiên --}}
            <div class="bg-white rounded-2xl shadow-sm p-8 mb-8 loai-phong">

                <div class="flex justify-between items-center mb-6">

                    <h3 class="text-2xl font-bold text-[#061755]">

                        Loại phòng 1

                    </h3>

                    <button type="button"
                        class="xoaLoaiPhong hidden bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">

                        <i class="fa-solid fa-trash"></i>

                        Xóa

                    </button>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Tên loại phòng --}}
                    <div>

                        <label class="font-semibold text-[#061755]">

                            Tên loại phòng
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="text" name="loai_phong[0][ten_loai_phong]"
                            class="mt-2 w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Số người tối đa --}}
                    <div>

                        <label class="font-semibold text-[#061755]">

                            Số người tối đa
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="number" min="1" name="loai_phong[0][so_nguoi_toi_da]"
                            class="mt-2 w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Diện tích --}}
                    <div>

                        <label class="font-semibold text-[#061755]">

                            Diện tích (m²)
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="number" min="1" name="loai_phong[0][dien_tich]"
                            class="mt-2 w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Số giường --}}
                    <div>

                        <label class="font-semibold text-[#061755]">

                            Số giường
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="number" min="1" name="loai_phong[0][so_giuong]"
                            class="mt-2 w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Giá --}}
                    <div>

                        <label class="font-semibold text-[#061755]">

                            Giá cơ bản
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="number" min="1000" name="loai_phong[0][gia_co_ban]"
                            class="mt-2 w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Ảnh --}}
                    <div>

                        <label class="font-semibold text-[#061755]">

                            Hình ảnh loại phòng
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="file" accept=".jpg,.jpeg,.png,.webp" name="loai_phong[0][hinh_anh]"
                            class="mt-2 w-full rounded-xl border px-4 py-3">

                    </div>

                    {{-- Mô tả --}}
                    <div class="md:col-span-2">

                        <label class="font-semibold text-[#061755]">

                            Mô tả

                        </label>

                        <textarea rows="4" name="loai_phong[0][mo_ta]"
                            class="mt-2 w-full rounded-xl border px-4 py-3"></textarea>

                    </div>

                </div>

            </div>
        </div>

        {{-- Nút thêm loại phòng --}}
        <div class="mb-8 text-center">

            <button type="button" id="themLoaiPhong"
                class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-xl font-semibold">

                <i class="fa-solid fa-plus mr-2"></i>

                Thêm loại phòng

            </button>

        </div>

        {{-- Điều hướng --}}
        <div class="flex justify-between">

            <a href="{{ route('doitac.khachsan.create.form2') }}"
                class="px-8 py-3 rounded-xl border border-slate-300 hover:bg-slate-100 font-semibold">

                <i class="fa-solid fa-arrow-left mr-2"></i>

                Quay lại

            </a>

            <button type="submit" class="bg-[#1040C5] hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold">

                Tiếp tục

                <i class="fa-solid fa-arrow-right ml-2"></i>

            </button>

        </div>

    </form>

</div>

{{-- Template dùng để thêm loại phòng --}}
<template id="templateLoaiPhong">

    <div class="bg-white rounded-2xl shadow-sm p-8 mb-8 loai-phong">

        <div class="flex justify-between items-center mb-6">

            <h3 class="text-2xl font-bold text-[#061755] tieuDeLoaiPhong">

                Loại phòng

            </h3>

            <button type="button" class="xoaLoaiPhong bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">

                <i class="fa-solid fa-trash"></i>

                Xóa

            </button>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Tên loại phòng --}}
            <div>

                <label class="font-semibold text-[#061755']">

                    Tên loại phòng
                    <span class="text-red-500">*</span>

                </label>

                <input type="text" data-name="ten_loai_phong" class="mt-2 w-full rounded-xl border px-4 py-3">

            </div>

            {{-- Số người tối đa --}}
            <div>

                <label class="font-semibold text-[#061755']">

                    Số người tối đa
                    <span class="text-red-500">*</span>

                </label>

                <input type="number" min="1" data-name="so_nguoi_toi_da"
                    class="mt-2 w-full rounded-xl border px-4 py-3">

            </div>

            {{-- Diện tích --}}
            <div>

                <label class="font-semibold text-[#061755']">

                    Diện tích (m²)
                    <span class="text-red-500">*</span>

                </label>

                <input type="number" min="1" data-name="dien_tich" class="mt-2 w-full rounded-xl border px-4 py-3">

            </div>

            {{-- Số giường --}}
            <div>

                <label class="font-semibold text-[#061755']">

                    Số giường
                    <span class="text-red-500">*</span>

                </label>

                <input type="number" min="1" data-name="so_giuong" class="mt-2 w-full rounded-xl border px-4 py-3">

            </div>

            {{-- Giá cơ bản --}}
            <div>

                <label class="font-semibold text-[#061755']">

                    Giá cơ bản
                    <span class="text-red-500">*</span>

                </label>

                <input type="number" min="1000" data-name="gia_co_ban" class="mt-2 w-full rounded-xl border px-4 py-3">

            </div>

            {{-- Ảnh --}}
            <div>

                <label class="font-semibold text-[#061755']">

                    Hình ảnh loại phòng
                    <span class="text-red-500">*</span>

                </label>

                <input type="file" accept=".jpg,.jpeg,.png,.webp" data-name="hinh_anh"
                    class="mt-2 w-full rounded-xl border px-4 py-3">

            </div>

            {{-- Mô tả --}}
            <div class="md:col-span-2">

                <label class="font-semibold text-[#061755']">

                    Mô tả

                </label>

                <textarea rows="4" data-name="mo_ta" class="mt-2 w-full rounded-xl border px-4 py-3"></textarea>

            </div>

        </div>

    </div>

</template>
<script>
const danhSachLoaiPhong = document.getElementById('danhSachLoaiPhong');

const templateLoaiPhong = document.getElementById('templateLoaiPhong');

const btnThemLoaiPhong = document.getElementById('themLoaiPhong');

btnThemLoaiPhong.addEventListener('click', function() {

    const index = danhSachLoaiPhong.querySelectorAll('.loai-phong').length;

    const clone = templateLoaiPhong.content.cloneNode(true);

    clone.querySelector('.tieuDeLoaiPhong').innerText =
        'Loại phòng ' + (index + 1);

    clone.querySelectorAll('[data-name]').forEach(function(input) {

        const ten = input.dataset.name;

        input.name = `loai_phong[${index}][${ten}]`;

    });

    danhSachLoaiPhong.appendChild(clone);

    capNhatLoaiPhong();

});

function capNhatLoaiPhong() {
    const danhSach = document.querySelectorAll('.loai-phong');

    danhSach.forEach(function(item, index) {

        item.querySelector('.tieuDeLoaiPhong').innerText =
            'Loại phòng ' + (index + 1);

        item.querySelectorAll('input, textarea').forEach(function(input) {

            if (!input.name) return;

            input.name = input.name.replace(
                /loai_phong\[\d+\]/,
                `loai_phong[${index}]`
            );

        });

        const btnXoa = item.querySelector('.xoaLoaiPhong');

        if (index == 0) {
            btnXoa.classList.add('hidden');
        } else {
            btnXoa.classList.remove('hidden');
        }

    });

}

document.addEventListener('click', function(e) {

    if (e.target.closest('.xoaLoaiPhong')) {
        e.target.closest('.loai-phong').remove();

        capNhatLoaiPhong();
    }

});

document.addEventListener('change', function(e) {

    if (e.target.type === 'file') {
        const file = e.target.files[0];

        if (!file) {
            return;
        }

        const hop = e.target.closest('div');

        let preview = hop.querySelector('.previewLoaiPhong');

        if (!preview) {
            preview = document.createElement('img');

            preview.className =
                'previewLoaiPhong mt-4 w-full h-52 object-cover rounded-xl border';

            hop.appendChild(preview);
        }

        preview.src = URL.createObjectURL(file);
    }

});

document.querySelector('form').addEventListener('submit', function(e) {

    const danhSach = document.querySelectorAll('.loai-phong');

    if (danhSach.length === 0) {
        e.preventDefault();

        alert('Vui lòng thêm ít nhất một loại phòng.');

        return;
    }

});

capNhatLoaiPhong();
</script>

@endsection