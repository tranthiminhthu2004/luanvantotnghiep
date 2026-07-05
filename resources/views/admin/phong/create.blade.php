@extends('admin.trangchinh.admin')

@section('title','Thêm phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">


        <form action="{{ route('admin.phong.store') }}" method="POST" novalidate>

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Loại phòng -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Loại phòng

                    </label>

                    <select name="ma_loai_phong" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                        @foreach($loaiPhongs as $loaiPhong)

                        <option value="{{ $loaiPhong->ma_loai_phong }}"
                            {{ old('ma_loai_phong') == $loaiPhong->ma_loai_phong ? 'selected' : '' }}>

                            {{ $loaiPhong->khachSan->ten_khach_san }}
                            -
                            {{ $loaiPhong->ten_loai_phong }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- Số phòng -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Số phòng

                    </label>

                    <input type="text" name="so_phong" value="{{ old('so_phong') }}" placeholder="Ví dụ: 101"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('so_phong')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Tầng -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Tầng

                    </label>

                    <input type="number" name="tang" value="{{ old('tang') }}" min="1" step="1" placeholder="Ví dụ: 2"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('tang')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Trạng thái -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Trạng thái

                    </label>

                    <select name="trang_thai_phong"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                        <option value="DangHoatDong"
                            {{ old('trang_thai_phong','DangHoatDong') == 'DangHoatDong' ? 'selected' : '' }}>

                            Đang hoạt động

                        </option>

                        <option value="BaoTri" {{ old('trang_thai_phong') == 'BaoTri' ? 'selected' : '' }}>

                            Bảo trì

                        </option>

                        <option value="NgungHoatDong"
                            {{ old('trang_thai_phong') == 'NgungHoatDong' ? 'selected' : '' }}>

                            Ngưng hoạt động

                        </option>

                    </select>

                </div>

            </div>

            <div class="flex flex-wrap gap-3 mt-6">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full text-base font-semibold transition">

                    Lưu phòng

                </button>

                <a href="{{ route('admin.phong.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full text-base font-semibold transition">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection