@extends('admin.trangchinh.admin')

@section('title','Thêm loại phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">


        <form action="{{ route('admin.loaiphong.store') }}" method="POST" novalidate>

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Khách sạn -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Khách sạn
                    </label>

                    <select name="ma_khach_san" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                        @foreach($khachSans as $khachSan)

                        <option value="{{ $khachSan->ma_khach_san }}"
                            {{ old('ma_khach_san') == $khachSan->ma_khach_san ? 'selected' : '' }}>

                            {{ $khachSan->ten_khach_san }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- Tên loại phòng -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Tên loại phòng
                    </label>

                    <input type="text" name="ten_loai_phong" value="{{ old('ten_loai_phong') }}"
                        placeholder="Ví dụ: Deluxe"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('ten_loai_phong')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror

                </div>

                <!-- Số người tối đa -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Số người tối đa
                    </label>

                    <input type="number" name="so_nguoi_toi_da" value="{{ old('so_nguoi_toi_da') }}"
                        placeholder="Ví dụ: 4" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('so_nguoi_toi_da')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror

                </div>

                <!-- Diện tích -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Diện tích (m²)
                    </label>

                    <input type="number" name="dien_tich" value="{{ old('dien_tich') }}" placeholder="Ví dụ: 35"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('dien_tich')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror

                </div>

                <!-- Số giường -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Số giường
                    </label>

                    <input type="number" name="so_giuong" value="{{ old('so_giuong') }}" placeholder="Ví dụ: 2"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('so_giuong')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror

                </div>

                <!-- Giá cơ bản -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Giá cơ bản
                    </label>

                    <input type="number" min="0" name="gia_co_ban" value="{{ old('gia_co_ban') }}"
                        placeholder="Ví dụ: 1200000"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('gia_co_ban')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror

                </div> <!-- Mô tả -->
                <div class="md:col-span-2">

                    <label class="block text-base font-semibold text-black">
                        Mô tả
                    </label>

                    <textarea name="mo_ta" rows="5" placeholder="Nhập mô tả loại phòng..."
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">{{ old('mo_ta') }}</textarea>

                </div>

                <!-- Trạng thái -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Trạng thái
                    </label>

                    <select name="trang_thai" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                        <option value="1" {{ old('trang_thai', 1) == 1 ? 'selected' : '' }}>
                            Hoạt động
                        </option>

                        <option value="0" {{ old('trang_thai') == '0' ? 'selected' : '' }}>
                            Tạm dừng
                        </option>

                    </select>

                </div>

            </div>

            <!-- Button -->
            <div class="flex flex-wrap gap-3 mt-6">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full text-base font-semibold transition">

                    Lưu loại phòng

                </button>

                <a href="{{ route('admin.loaiphong.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full text-base font-semibold transition">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection