@extends('admin.trangchinh.admin')

@section('title','Quản lý hình ảnh khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-8">

        <!-- Tiêu đề -->
        <div class="mb-8">

            <p class="text-black text-4xl mt-2 font-bold">

                {{ $khachSan->ten_khach_san }}

            </p>

            <p class="text-sm text-gray-400 mt-1">

                Đã tải lên

                <span class="font-semibold text-blue-600">

                    {{ $khachSan->hinhAnh->count() }}

                </span>

                / 15 hình ảnh

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

        @if($khachSan->hinhAnh->count() < 15) <form action="{{ route('admin.hinhanh.store',$khachSan->ma_khach_san) }}"
            method="POST" enctype="multipart/form-data">

            @csrf

            <div class="flex flex-col lg:flex-row gap-4 items-start lg:items-center">

                <input id="chonAnh" type="file" name="anh[]" multiple accept=".jpg,.jpeg,.png,.webp"
                    class="block w-full rounded-xl border px-4 py-3 text-sm">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-semibold whitespace-nowrap transition">

                    <i class="fa-solid fa-upload mr-2"></i>

                    Tải lên

                </button>

            </div>

            @error('anh')

            <p class="text-red-500 text-sm mt-3">

                {{ $message }}

            </p>

            @enderror

            @error('anh.*')

            <p class="text-red-500 text-sm mt-2">

                {{ $message }}

            </p>

            @enderror

            </form>

            @else

            <div class="rounded-xl border border-yellow-200 bg-yellow-50 px-5 py-4 text-yellow-700">

                <i class="fa-solid fa-triangle-exclamation mr-2"></i>

                Khách sạn đã đạt giới hạn

                <strong>15 hình ảnh.</strong>

                Muốn thêm ảnh vui lòng xóa một ảnh cũ.

            </div>

            @endif

            <div class="border-t my-8"></div>@if($khachSan->hinhAnh->count())

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">

                @foreach($khachSan->hinhAnh as $anh)

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
                    <div class="p-4 space-y-3">

                        <button type="button"
                            onclick="openModal('{{ route('admin.hinhanh.update',$anh->ma_hinh_anh_khach_san) }}')"
                            class="w-full bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-full py-2.5 font-semibold transition">

                            <i class="fa-solid fa-pen mr-2"></i>

                            Thay ảnh

                        </button>

                        <form action="{{ route('admin.hinhanh.destroy',$anh->ma_hinh_anh_khach_san) }}" method="POST"
                            onsubmit="return confirm('Bạn có chắc muốn xóa hình ảnh này?');">

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

                    Hãy tải lên những hình ảnh đầu tiên cho khách sạn này.

                </p>

            </div>

            @endif

            <!-- Nút quay lại -->
            <div class="mt-10">

                <a href="{{ route('admin.khachsan.index') }}"
                    class="inline-flex items-center gap-2 bg-slate-200 hover:bg-slate-300 text-black px-6 py-3 rounded-full font-semibold transition">

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

                Thay hình ảnh khách sạn

            </h3>

        </div>

        <form id="formSuaAnh" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="p-6">

                <input type="file" name="anh" accept=".jpg,.jpeg,.png,.webp" required
                    class="w-full border rounded-xl px-4 py-3">

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

    document.getElementById('formSuaAnh').action = action;

    document.getElementById('modalSuaAnh').classList.remove('hidden');

}

function closeModal() {

    document.getElementById('modalSuaAnh').classList.add('hidden');

}

document.getElementById('modalSuaAnh').addEventListener('click', function(e) {

    if (e.target === this) {

        closeModal();

    }

});
</script>

@endsection