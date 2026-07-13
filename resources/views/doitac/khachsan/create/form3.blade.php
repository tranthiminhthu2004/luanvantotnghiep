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

                <div
                    class="w-10 h-10 rounded-full bg-[#1040C5] text-white flex items-center justify-center font-semibold">

                    3

                </div>

                <span class="mt-2 text-sm font-semibold text-[#1040C5]">

                    Loại phòng

                </span>

            </div>

            <div class="flex-1 h-0.5 bg-slate-200 mx-4"></div>

            {{-- Bước 4 --}}
            <div class="flex flex-col items-center">

                <div
                    class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-semibold">

                    4

                </div>

                <span class="mt-2 text-sm text-slate-500">

                    Tiện nghi

                </span>

            </div>

        </div>

    </div>

    {{-- Form --}}
    <form action="{{ route('doitac.khachsan.create.form3.store') }}" method="POST" enctype="multipart/form-data"
        id="formLoaiPhong">

        @csrf

        <div id="danhSachLoaiPhong">

            {{-- Loại phòng đầu tiên --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8 mb-6 loai-phong">

                <div class="flex items-center justify-between mb-8">

                    <h3 class="text-2xl font-bold text-[#061755] tieuDeLoaiPhong">

                        Loại phòng 1

                    </h3>

                    <button type="button"
                        class="xoaLoaiPhong hidden rounded-xl bg-red-500 px-5 py-2 font-semibold text-white transition hover:bg-red-600">

                        Xóa

                    </button>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Tên loại phòng --}}
                    <div>

                        <label class="block font-semibold text-[#061755] mb-2">

                            Tên loại phòng
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="text" name="loai_phong[0][ten_loai_phong]"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none">

                    </div>

                    {{-- Số người tối đa --}}
                    <div>

                        <label class="block font-semibold text-[#061755] mb-2">

                            Số người tối đa
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="number" min="1" name="loai_phong[0][so_nguoi_toi_da]"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none">

                    </div>

                    {{-- Diện tích --}}
                    <div>

                        <label class="block font-semibold text-[#061755] mb-2">

                            Diện tích (m²)
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="number" min="1" name="loai_phong[0][dien_tich]"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none">

                    </div>

                    {{-- Số giường --}}
                    <div>

                        <label class="block font-semibold text-[#061755] mb-2">

                            Số giường
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="number" min="1" name="loai_phong[0][so_giuong]"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none">

                    </div>

                    {{-- Giá cơ bản --}}
                    <div>

                        <label class="block font-semibold text-[#061755] mb-2">

                            Giá cơ bản
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="number" min="1000" name="loai_phong[0][gia_co_ban]"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none">

                    </div>

                    {{-- Hình ảnh --}}
                    <div>

                        <label class="block font-semibold text-[#061755] mb-2">

                            Hình ảnh loại phòng
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="file" accept=".jpg,.jpeg,.png,.webp" name="loai_phong[0][hinh_anh]"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3">

                    </div>

                    {{-- Mô tả --}}
                    <div class="md:col-span-2">

                        <label class="block font-semibold text-[#061755] mb-2">

                            Mô tả

                        </label>

                        <textarea rows="5" name="loai_phong[0][mo_ta]"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 resize-none focus:border-[#1040C5] focus:ring-2 focus:ring-blue-100 outline-none"></textarea>

                    </div>

                </div>

            </div> {{-- Thêm loại phòng --}}
            <div class="mb-6 flex justify-center">

                <button type="button" id="themLoaiPhong"
                    class="rounded-xl bg-green-600 px-8 py-3 font-semibold text-white transition hover:bg-green-700">

                    Thêm loại phòng

                </button>

            </div>

            {{-- Footer --}}
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

            <h3 class="text-2xl font-bold text-[#061755] tieuDeLoaiPhong">

                Loại phòng

            </h3>

            <button type="button"
                class="xoaLoaiPhong rounded-xl bg-red-500 px-5 py-2 font-semibold text-white transition hover:bg-red-600">

                Xóa

            </button>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>

                <label class="block mb-2 font-semibold text-[#061755]">

                    Tên loại phòng
                    <span class="text-red-500">*</span>

                </label>

                <input type="text" data-name="ten_loai_phong"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">

            </div>

            <div>

                <label class="block mb-2 font-semibold text-[#061755]">

                    Số người tối đa
                    <span class="text-red-500">*</span>

                </label>

                <input type="number" min="1" data-name="so_nguoi_toi_da"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">

            </div>

            <div>

                <label class="block mb-2 font-semibold text-[#061755]">

                    Diện tích (m²)
                    <span class="text-red-500">*</span>

                </label>

                <input type="number" min="1" data-name="dien_tich"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">

            </div>

            <div>

                <label class="block mb-2 font-semibold text-[#061755]">

                    Số giường
                    <span class="text-red-500">*</span>

                </label>

                <input type="number" min="1" data-name="so_giuong"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">

            </div>

            <div>

                <label class="block mb-2 font-semibold text-[#061755]">

                    Giá cơ bản
                    <span class="text-red-500">*</span>

                </label>

                <input type="number" min="1000" data-name="gia_co_ban"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">

            </div>

            <div>

                <label class="block mb-2 font-semibold text-[#061755]">

                    Hình ảnh loại phòng
                    <span class="text-red-500">*</span>

                </label>

                <input type="file" accept=".jpg,.jpeg,.png,.webp" data-name="hinh_anh"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">

            </div>

            <div class="md:col-span-2">

                <label class="block mb-2 font-semibold text-[#061755]">

                    Mô tả

                </label>

                <textarea rows="5" data-name="mo_ta"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 resize-none"></textarea>

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

    clone.querySelector('.tieuDeLoaiPhong').textContent =
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

        item.querySelector('.tieuDeLoaiPhong').textContent =
            'Loại phòng ' + (index + 1);

        item.querySelectorAll('input, textarea').forEach(function(input) {

            if (!input.name) return;

            input.name = input.name.replace(
                /loai_phong\[\d+\]/,
                `loai_phong[${index}]`
            );

        });

        const btnXoa = item.querySelector('.xoaLoaiPhong');

        if (index === 0) {

            btnXoa.classList.add('hidden');

        } else {

            btnXoa.classList.remove('hidden');

        }

    });

}

document.addEventListener('click', function(e) {

    const btn = e.target.closest('.xoaLoaiPhong');

    if (!btn) return;

    btn.closest('.loai-phong').remove();

    capNhatLoaiPhong();

});

document.addEventListener('change', function(e) {

    if (e.target.type !== 'file') return;

    const file = e.target.files[0];

    if (!file) return;

    const wrapper = e.target.parentElement;

    let preview = wrapper.querySelector('.previewLoaiPhong');

    if (!preview) {

        preview = document.createElement('img');

        preview.className =
            'previewLoaiPhong mt-4 w-full h-56 rounded-xl object-cover border border-slate-200';

        wrapper.appendChild(preview);

    }

    preview.src = URL.createObjectURL(file);

});

document.getElementById('formLoaiPhong').addEventListener('submit', function(e) {

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