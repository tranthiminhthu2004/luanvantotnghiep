@extends('admin.trangchinh.admin')

@section('title','Quản lý hình ảnh địa điểm du lịch')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-8">

        <!-- Tiêu đề -->
        <div class="mb-8">

            <p class="text-black mt-2 text-4xl font-bold">

                {{ $diaDiemDuLich->ten_dia_diem }}

            </p>

            <p class="text-sm text-gray-400 mt-1">

                Đã tải lên

                <span class="font-semibold text-blue-600">

                    {{ $diaDiemDuLich->hinhAnhs->count() }}

                </span>

                / 5 hình ảnh

            </p>

        </div>

        {{-- Thông báo --}}
        @if(session('success'))

        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700">

            <i class="fa-solid fa-circle-check mr-2"></i>

            {{ session('success') }}

        </div>

        @endif

        @if(session('error'))

        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">

            <i class="fa-solid fa-circle-exclamation mr-2"></i>

            {{ session('error') }}

        </div>

        @endif

        @if($errors->any())

        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">

            <i class="fa-solid fa-circle-exclamation mr-2"></i>

            <ul class="list-disc ml-6 mt-2">

                @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

        @endif

        @if($diaDiemDuLich->hinhAnhs->count() < 5) <form
            action="{{ route('admin.hinhanhdiadiemdulich.store', $diaDiemDuLich->ma_dia_diem_du_lich) }}" method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="flex flex-col lg:flex-row gap-4 items-start lg:items-center">

                <input id="chonAnh" type="file" name="hinh_anh[]" multiple accept=".jpg,.jpeg,.png,.webp"
                    class="block w-full rounded-xl border px-4 py-3 text-sm">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-semibold whitespace-nowrap transition">

                    <i class="fa-solid fa-upload mr-2"></i>

                    Tải lên

                </button>

            </div>

            @error('hinh_anh')

            <p class="text-red-500 text-sm mt-3">

                {{ $message }}

            </p>

            @enderror

            @error('hinh_anh.*')

            <p class="text-red-500 text-sm mt-2">

                {{ $message }}

            </p>

            @enderror

            </form>

            <!-- Preview ảnh mới chọn -->
            <div id="preview" class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6 mt-6"></div>

            @else

            <div class="rounded-xl border border-yellow-200 bg-yellow-50 px-5 py-4 text-yellow-700">

                <i class="fa-solid fa-triangle-exclamation mr-2"></i>

                Địa điểm du lịch đã đạt giới hạn

                <strong>5 hình ảnh.</strong>

                Muốn thêm ảnh vui lòng xóa một ảnh cũ.

            </div>

            @endif

            <div class="border-t my-8"></div>

            @if($diaDiemDuLich->hinhAnhs->count())

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">

                @foreach($diaDiemDuLich->hinhAnhs as $anh)

                <div class="bg-white border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">

                    <!-- Ảnh -->
                    <div class="relative">

                        <img src="{{ asset($anh->duong_dan_anh) }}" class="w-full h-56 object-cover">

                        <!-- STT -->
                        <span class="absolute top-3 left-3 bg-black/70 text-white text-xs px-3 py-1 rounded-full">

                            Ảnh {{ $loop->iteration }}

                        </span>

                    </div>

                    <!-- Thao tác -->
                    <div class="p-4">

                        <form action="{{ route('admin.hinhanhdiadiemdulich.destroy', $anh->ma_hinh_anh_dia_diem) }}"
                            method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa hình ảnh này?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="w-full bg-red-100 hover:bg-red-200 text-red-600 rounded-full py-2.5 font-semibold transition">

                                <i class="fa-solid fa-trash mr-2"></i>

                                Xóa hình ảnh

                            </button>

                        </form>

                    </div>

                </div>

                @endforeach

            </div>

            @else

            <div class="py-20 text-center">

                <i class="fa-regular fa-image text-6xl text-gray-300 mb-5"></i>

                <h3 class="text-xl font-semibold text-gray-600">

                    Chưa có hình ảnh

                </h3>

                <p class="text-gray-500 mt-2">

                    Hãy tải lên những hình ảnh đầu tiên cho địa điểm du lịch này.

                </p>

            </div>

            @endif

            <!-- Quay lại -->
            <div class="mt-10">

                <a href="{{ route('admin.diadiemdulich.index') }}"
                    class="inline-flex items-center gap-2 bg-slate-200 hover:bg-slate-300 text-black px-6 py-3 rounded-full font-semibold transition">

                    Quay lại

                </a>

            </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {

    const input = document.getElementById('chonAnh');
    const preview = document.getElementById('preview');

    if (!input || !preview) return;

    input.addEventListener('change', function() {

        preview.innerHTML = '';

        const files = Array.from(this.files);

        if (files.length === 0) {

            return;

        }

        const soAnhHienTai = {
            {
                $diaDiemDuLich - > hinhAnhs - > count()
            }
        };
        const soAnhConLai = 5 - soAnhHienTai;

        if (files.length > soAnhConLai) {

            alert('Bạn chỉ được chọn thêm tối đa ' + soAnhConLai + ' hình ảnh.');

            this.value = '';

            return;

        }

        files.forEach(function(file, index) {

            if (!file.type.startsWith('image/')) {

                return;

            }

            const reader = new FileReader();

            reader.onload = function(e) {

                const card = document.createElement('div');

                card.className =
                    'border rounded-2xl overflow-hidden shadow-sm bg-white';

                card.innerHTML = `
                    <img
                        src="${e.target.result}"
                        class="w-full h-40 object-cover">

                    <div class="p-3">

                        <p class="text-center text-sm font-semibold">

                            Ảnh mới ${index + 1}

                        </p>

                    </div>
                `;

                preview.appendChild(card);

            };

            reader.readAsDataURL(file);

        });

    });

});
</script>

@endsection