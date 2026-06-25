@extends('admin.trangchinh.admin')

@section('title','Quản lý ảnh khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">

        <!-- Tiêu đề -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

            <div>

                <h2 class="text-2xl md:text-3xl font-bold text-[#061755]">

                    Quản lý ảnh khách sạn

                </h2>

                <p class="text-gray-500 mt-1">

                    {{ $khachSan->ten_khach_san }}

                    ({{ $khachSan->hinhAnh->count() }} ảnh)

                </p>

            </div>

        </div>

        <!-- Upload nhiều ảnh -->
        <form action="{{ route('admin.hinhanh.store',$khachSan->ma_khach_san) }}" method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="flex flex-col md:flex-row gap-4">

                <div class="flex-1">

                    <input type="file" name="anh[]" multiple accept="image/*"
                        class="w-full border rounded-xl px-4 py-2.5 text-sm">

                    @error('anh')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                    @error('anh.*')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-6 py-2.5 text-sm font-semibold transition">

                    <i class="fa-solid fa-upload mr-2"></i>

                    Tải ảnh lên

                </button>

            </div>

        </form>

        <!-- Danh sách ảnh -->
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6 mt-8">

            @forelse($khachSan->hinhAnh as $anh)

            <div class="relative group rounded-2xl overflow-hidden shadow border bg-white">

                <!-- Ảnh -->
                <img src="{{ asset($anh->duong_dan_anh) }}"
                    class="w-full h-60 object-cover transition duration-300 group-hover:scale-105">

                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300">

                </div>

                <!-- Nút thao tác -->
                <div
                    class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center gap-5">

                    <!-- Thay ảnh -->
                    <button type="button" onclick="openModal(
                '{{ route('admin.hinhanh.update',$anh->ma_hinh_anh_khach_san) }}'
            )" class="w-14 h-14 rounded-full bg-blue-600 hover:bg-blue-700 text-white shadow-lg transition">

                        <i class="fa-solid fa-pen text-xl"></i>

                    </button>

                    <!-- Xóa -->
                    <form action="{{ route('admin.hinhanh.destroy',$anh->ma_hinh_anh_khach_san) }}" method="POST"
                        onsubmit="return confirm('Bạn có chắc muốn xóa ảnh này?');">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="w-14 h-14 rounded-full bg-red-600 hover:bg-red-700 text-white shadow-lg transition">

                            <i class="fa-solid fa-trash text-xl"></i>

                        </button>

                    </form>

                </div>

            </div>

            @empty

            <div class="col-span-full">

                <div class="border-2 border-dashed border-slate-300 rounded-2xl py-16 text-center">

                    <i class="fa-regular fa-image text-5xl text-gray-300 mb-4">

                    </i>

                    <p class="text-gray-500">

                        Chưa có ảnh nào cho khách sạn này.

                    </p>

                </div>

            </div>

            @endforelse

        </div><!-- Nút quay lại -->
        <div class="mt-8">

            <a href="{{ route('admin.khachsan.index') }}"
                class="inline-flex items-center bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full text-sm font-semibold transition">

                Quay lại

            </a>

        </div>

    </div>

</div>

<!-- Modal thay ảnh -->
<div id="modalSuaAnh" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-4">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">

        <div class="px-6 py-5 border-b">

            <h3 class="text-xl font-bold text-[#061755]">

                Thay ảnh khách sạn

            </h3>

        </div>

        <form id="formSuaAnh" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="p-6">

                <input type="file" name="anh" accept="image/*" required class="w-full border rounded-xl px-4 py-3">

            </div>

            <div class="px-6 pb-6 flex justify-end gap-3">

                <button type="button" onclick="closeModal()"
                    class="px-5 py-2.5 rounded-xl bg-slate-200 hover:bg-slate-300">

                    Hủy

                </button>

                <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white">

                    Cập nhật

                </button>

            </div>

        </form>

    </div>

</div>

<script>
function openModal(action) {
    document
        .getElementById('formSuaAnh')
        .action = action;

    document
        .getElementById('modalSuaAnh')
        .classList.remove('hidden');
}

function closeModal() {
    document
        .getElementById('modalSuaAnh')
        .classList.add('hidden');
}

// Đóng modal khi bấm ra ngoài
document
    .getElementById('modalSuaAnh')
    .addEventListener(
        'click',
        function(e) {
            if (e.target === this) {
                closeModal();
            }
        }
    );
</script>

@endsection