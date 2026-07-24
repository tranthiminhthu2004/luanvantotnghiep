@extends('doitac.trangchinh.partner')

@section('title','Đăng ký khách sạn')

@section('content')

<div class="max-w-6xl mx-auto">

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

                <div
                    class="w-10 h-10 rounded-full bg-[#1040C5] text-white flex items-center justify-center font-semibold">

                    2

                </div>

                <span class="mt-2 text-sm font-semibold text-[#1040C5]">

                    Hình ảnh

                </span>

            </div>

            <div class="flex-1 h-0.5 bg-slate-200 mx-4"></div>

            {{-- Bước 3 --}}
            <div class="flex flex-col items-center">

                <div
                    class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-semibold">

                    3

                </div>

                <span class="mt-2 text-sm text-slate-500">

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

    <form action="{{ route('doitac.khachsan.create.form2.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white border border-slate-200 rounded-2xl shadow-sm">

        @csrf

        {{-- Danh sách ảnh cũ cần xóa --}}
        <input type="hidden" name="anh_xoa" id="anh_xoa">

        <div class="p-8">

            <div>

                <label class="block mb-3 text-base font-semibold text-[#061755]">

                    Hình ảnh khách sạn
                    <span class="text-red-500">*</span>

                </label>

                <label for="hinh_anh" class="flex h-72 w-full cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed transition
                    @if($errors->has('hinh_anh') || $errors->has('hinh_anh.*'))
                        border-red-500 bg-red-50
                    @else
                        border-blue-300 hover:border-[#1040C5] hover:bg-blue-50
                    @endif">

                    <i class="fa-solid fa-cloud-arrow-up text-5xl text-[#1040C5]"></i>

                    <h3 class="mt-5 text-xl font-bold text-[#061755]">

                        Tải hình ảnh khách sạn

                    </h3>

                    <p class="mt-2 text-sm text-slate-500">

                        Chọn tối thiểu <strong>5</strong> hình ảnh và tối đa
                        <strong>15</strong> hình ảnh mỗi ảnh dưới <strong>2MB</strong>

                    </p>

                    <span class="mt-6 rounded-xl bg-[#1040C5] px-6 py-3 font-semibold text-white">

                        Chọn hình ảnh

                    </span>

                </label>

                <input id="hinh_anh" type="file" name="hinh_anh[]" class="hidden" accept=".jpg,.jpeg,.png,.webp"
                    multiple>

                @error('hinh_anh')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
                @enderror

                @error('hinh_anh.*')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
                @enderror

            </div>

            {{-- Số lượng ảnh --}}
            <div id="soLuongAnh"
                class="mt-6 rounded-xl border border-blue-100 bg-blue-50 px-5 py-4 font-semibold text-[#061755]">

                Đã chọn: 0 / 15 hình ảnh

            </div>

            {{-- Preview --}}
            <div id="preview" class="mt-6 grid grid-cols-2 gap-5 md:grid-cols-3 xl:grid-cols-4">

            </div>

        </div>

        <div class="border-t border-slate-200 px-8 py-5">

            <div class="flex justify-center gap-3">

                <a href="{{ route('doitac.khachsan.create.form1') }}"
                    class="rounded-xl border border-slate-300 bg-white px-6 py-3 font-semibold text-slate-700 transition hover:bg-slate-100">

                    Quay lại

                </a>

                <button id="btnSubmit" type="submit"
                    class="rounded-xl bg-[#1040C5] px-8 py-3 font-semibold text-white transition hover:bg-blue-700">

                    Tiếp tục

                </button>

            </div>

        </div>

    </form>

</div>

<script>
const input = document.getElementById('hinh_anh');
const preview = document.getElementById('preview');
const soLuongAnh = document.getElementById('soLuongAnh');
const btnSubmit = document.getElementById('btnSubmit');

const hinhAnhDaTai = @json($hinhAnhDaTai);

let dataTransfer = new DataTransfer();
let danhSachXoa = [];

/*
|--------------------------------------------------------------------------
| Cập nhật số lượng ảnh
|--------------------------------------------------------------------------
*/

function capNhatSoLuong() {

    const tongAnh =
        (hinhAnhDaTai.length - danhSachXoa.length) +
        dataTransfer.files.length;

    soLuongAnh.innerHTML = `
        Đã chọn:
        <span class="text-[#1040C5] font-bold">
            ${tongAnh}
        </span>
        / 15 hình ảnh
    `;

}

/*
|--------------------------------------------------------------------------
| Hiển thị ảnh cũ
|--------------------------------------------------------------------------
*/

function renderAnhCu() {

    let viTri = 0;

    hinhAnhDaTai.forEach((tenAnh) => {

        // Nếu đã đánh dấu xóa thì bỏ qua
        if (danhSachXoa.includes(tenAnh)) {
            return;
        }

        const item = document.createElement('div');

        item.className =
            'relative overflow-hidden rounded-2xl border border-slate-200 shadow-sm group';

        const laAnhDaiDien = (viTri === 0);

        viTri++;

        item.innerHTML = `

            <img
                src="/images/khachsan/${tenAnh}"
                class="w-full h-52 object-cover transition group-hover:scale-105">

            ${laAnhDaiDien ? `
                <div class="absolute left-3 top-3 rounded-full bg-[#1040C5] px-3 py-1 text-xs font-semibold text-white shadow">

                    Ảnh đại diện

                </div>
            ` : ''}

            <button
                type="button"
                class="absolute right-3 top-3 flex h-9 w-9 items-center justify-center rounded-full bg-red-600 text-white opacity-0 transition group-hover:opacity-100 hover:bg-red-700">

                <i class="fa-solid fa-trash"></i>

            </button>

        `;

        item.querySelector("button").addEventListener("click", function() {

            danhSachXoa.push(tenAnh);

            renderPreview();

        });

        preview.appendChild(item);

    });

}
/*
|--------------------------------------------------------------------------
| Hiển thị toàn bộ Preview
|--------------------------------------------------------------------------
*/

function renderPreview() {

    preview.innerHTML = '';

    // Hiển thị ảnh cũ
    renderAnhCu();

    // Đếm số ảnh cũ còn lại
    const soAnhCu = hinhAnhDaTai.length - danhSachXoa.length;

    // Hiển thị ảnh mới
    [...dataTransfer.files].forEach((file, index) => {

        const reader = new FileReader();

        reader.onload = function(e) {

            const item = document.createElement('div');

            item.className =
                'relative overflow-hidden rounded-2xl border border-slate-200 shadow-sm group';

            // Nếu không còn ảnh cũ thì ảnh mới đầu tiên sẽ là ảnh đại diện
            const laAnhDaiDien =
                (soAnhCu === 0 && index === 0);

            item.innerHTML = `

                <img
                    src="${e.target.result}"
                    class="w-full h-52 object-cover transition group-hover:scale-105">

                ${laAnhDaiDien ? `
                    <div class="absolute left-3 top-3 rounded-full bg-[#1040C5] px-3 py-1 text-xs font-semibold text-white shadow">

                        Ảnh đại diện

                    </div>
                ` : ''}

                <button
                    type="button"
                    class="absolute right-3 top-3 flex h-9 w-9 items-center justify-center rounded-full bg-red-600 text-white opacity-0 transition group-hover:opacity-100 hover:bg-red-700">

                    <i class="fa-solid fa-trash"></i>

                </button>

            `;

            item.querySelector("button").addEventListener("click", function() {

                xoaAnh(index);

            });

            preview.appendChild(item);

        };

        reader.readAsDataURL(file);

    });

    capNhatSoLuong();

}

/*
|--------------------------------------------------------------------------
| Chọn thêm ảnh
|--------------------------------------------------------------------------
*/

input.addEventListener("change", function() {

    [...this.files].forEach(file => {

        const tongAnh =
            (hinhAnhDaTai.length - danhSachXoa.length) +
            dataTransfer.files.length;

        if (tongAnh >= 15) {

            alert("Chỉ được chọn tối đa 15 hình ảnh.");

            return;

        }

        dataTransfer.items.add(file);

    });

    input.files = dataTransfer.files;

    renderPreview();

});
/*
|--------------------------------------------------------------------------
| Xóa ảnh mới
|--------------------------------------------------------------------------
*/

function xoaAnh(index) {

    const files = [...dataTransfer.files];

    files.splice(index, 1);

    dataTransfer = new DataTransfer();

    files.forEach(file => {

        dataTransfer.items.add(file);

    });

    input.files = dataTransfer.files;

    renderPreview();

}

/*
|--------------------------------------------------------------------------
| Submit Form
|--------------------------------------------------------------------------
*/

btnSubmit.addEventListener("click", function(e) {

    document.getElementById("anh_xoa").value =
        JSON.stringify(danhSachXoa);

    const tongAnh =
        (hinhAnhDaTai.length - danhSachXoa.length) +
        dataTransfer.files.length;

    if (tongAnh < 5) {

        e.preventDefault();

        alert("Khách sạn phải có tối thiểu 5 hình ảnh.");

        return;

    }

    if (tongAnh > 15) {

        e.preventDefault();

        alert("Khách sạn chỉ được có tối đa 15 hình ảnh.");

        return;

    }

});

renderPreview();
</script>

@endsection