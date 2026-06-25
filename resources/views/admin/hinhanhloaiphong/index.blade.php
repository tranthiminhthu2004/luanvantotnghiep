@extends('admin.trangchinh.admin')

@section('title','Quản lý ảnh loại phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">

        <!-- Tiêu đề -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

            <div>

                <h2 class="text-2xl md:text-3xl font-bold text-[#061755]">

                    Quản lý ảnh loại phòng

                </h2>

                <p class="text-gray-500 mt-1">

                    {{ $loaiPhong->ten_loai_phong }}

                    ({{ $loaiPhong->hinhAnh->count() }} ảnh)

                </p>

            </div>

        </div>

        <!-- Upload -->
        <form action="{{ route('admin.loaiphong.hinhanh.store',$loaiPhong->ma_loai_phong) }}" method="POST"
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
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5 mt-8"> @forelse($loaiPhong->hinhAnh as $anh)

            <div class="relative group overflow-hidden rounded-2xl shadow border bg-white">

                <img src="{{ asset($anh->duong_dan_anh) }}"
                    class="w-full h-52 object-cover transition duration-300 group-hover:scale-105">

                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition">

                </div>

                <!-- Nút xóa -->
                <form action="{{ route('admin.loaiphong.hinhanh.destroy',$anh->ma_hinh_anh_phong) }}" method="POST"
                    onsubmit="return confirm('Bạn có chắc muốn xóa ảnh này?');" class="absolute top-3 right-3">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 text-red-600 flex items-center justify-center transition">

                        <i class="fa-solid fa-trash"></i>

                    </button>

                </form>

            </div>

            @empty

            <div class="col-span-full">

                <div class="border-2 border-dashed border-slate-300 rounded-2xl py-14 text-center">

                    <i class="fa-regular fa-image text-5xl text-gray-300 mb-4"></i>

                    <p class="text-gray-500">

                        Chưa có ảnh nào cho loại phòng này.

                    </p>

                </div>

            </div>

            @endforelse

        </div>

        <!-- Button -->
        <div class="mt-8">

            <a href="{{ route('admin.loaiphong.index') }}"
                class="inline-flex items-center bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full text-sm font-semibold transition">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection