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

                <div class="w-12 h-12 rounded-full bg-[#1040C5] text-white flex items-center justify-center font-bold">

                    2

                </div>

                <p class="mt-3 font-semibold text-[#1040C5]">

                    Hình ảnh

                </p>

            </div>

            <div class="flex-1 h-1 bg-slate-200"></div>

            {{-- Bước 3 --}}
            <div class="flex flex-col items-center flex-1">

                <div
                    class="w-12 h-12 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold">

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
                    class="w-12 h-12 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold">

                    4

                </div>

                <p class="mt-3 text-slate-500">

                    Tiện nghi

                </p>

            </div>

        </div>

    </div>

    <form action="{{ route('doitac.khachsan.create.form2.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white rounded-2xl shadow-sm p-8">

        @csrf

        <div>

            <label class="font-semibold text-[#061755]">

                Hình ảnh khách sạn
                <span class="text-red-500">*</span>

            </label>

            <label for="hinh_anh" class="mt-3 border-2 border-dashed rounded-2xl h-72 flex flex-col items-center justify-center cursor-pointer transition
                @if($errors->has('hinh_anh') || $errors->has('hinh_anh.*'))
                    border-red-500 bg-red-50
                @else
                    border-blue-300 hover:bg-blue-50
                @endif">

                <i class="fa-solid fa-cloud-arrow-up text-6xl text-[#1040C5]"></i>

                <h3 class="mt-5 text-2xl font-bold text-[#061755]">

                    Chọn hình ảnh khách sạn

                </h3>

                <p class="mt-3 text-slate-500">

                    Chọn từ <strong>5</strong> đến <strong>15</strong> hình ảnh

                </p>

                <span class="mt-6 bg-[#1040C5] text-white px-6 py-3 rounded-xl font-semibold">

                    Chọn hình ảnh

                </span>

            </label>

            <input id="hinh_anh" type="file" name="hinh_anh[]" multiple accept=".jpg,.jpeg,.png,.webp" class="hidden">

            @error('hinh_anh')

            <p class="mt-2 text-red-500 text-sm">

                {{ $message }}

            </p>

            @enderror

            @error('hinh_anh.*')

            <p class="mt-2 text-red-500 text-sm">

                {{ $message }}

            </p>

            @enderror

        </div>

        {{-- Đếm số ảnh --}}
        <div id="soLuongAnh" class="mt-6 text-lg font-semibold text-[#061755]">

            Đã chọn: 0 / 15 hình ảnh

        </div>

        {{-- Preview --}}
        <div id="preview" class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6 mt-6">

        </div>

        <div class="flex justify-between mt-10">

            <a href="{{ route('doitac.khachsan.create.form1') }}"
                class="px-8 py-3 rounded-xl border border-slate-300 hover:bg-slate-100 font-semibold">

                <i class="fa-solid fa-arrow-left mr-2"></i>

                Quay lại

            </a>

            <button id="btnSubmit" type="submit"
                class="bg-[#1040C5] hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold">

                Tiếp tục

                <i class="fa-solid fa-arrow-right ml-2"></i>

            </button>

        </div>

    </form>

</div>
<script>
const input = document.getElementById('hinh_anh');
const preview = document.getElementById('preview');
const soLuongAnh = document.getElementById('soLuongAnh');
const btnSubmit = document.getElementById('btnSubmit');

let dataTransfer = new DataTransfer();

function capNhatSoLuong() {
    soLuongAnh.innerHTML =
        `Đã chọn: <span class="text-[#1040C5]">${dataTransfer.files.length}</span> / 15 hình ảnh`;
}

function renderPreview() {
    preview.innerHTML = '';

    [...dataTransfer.files].forEach((file, index) => {

        const reader = new FileReader();

        reader.onload = function(e) {
            preview.innerHTML += `

                <div class="relative rounded-2xl overflow-hidden border border-slate-200 shadow-sm group">

                    <img
                        src="${e.target.result}"
                        class="w-full h-56 object-cover">

                    <button
                        type="button"
                        onclick="xoaAnh(${index})"
                        class="absolute top-2 right-2 w-9 h-9 rounded-full bg-red-600 text-white opacity-0 group-hover:opacity-100 transition hover:bg-red-700">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            `;
        }

        reader.readAsDataURL(file);

    });

    capNhatSoLuong();
}

input.addEventListener('change', function() {

    for (const file of this.files) {
        if (dataTransfer.files.length >= 15) {
            alert('Chỉ được chọn tối đa 15 hình ảnh.');
            break;
        }

        dataTransfer.items.add(file);
    }

    input.files = dataTransfer.files;

    renderPreview();

});

window.xoaAnh = function(index) {
    const files = [...dataTransfer.files];

    files.splice(index, 1);

    dataTransfer = new DataTransfer();

    files.forEach(file => {

        dataTransfer.items.add(file);

    });

    input.files = dataTransfer.files;

    renderPreview();
}

btnSubmit.addEventListener('click', function(e) {

    if (dataTransfer.files.length < 5) {
        e.preventDefault();

        alert('Khách sạn phải có tối thiểu 5 hình ảnh.');

        return;
    }

    if (dataTransfer.files.length > 15) {
        e.preventDefault();

        alert('Khách sạn chỉ được tải tối đa 15 hình ảnh.');

        return;
    }

});

capNhatSoLuong();
</script>

@endsection