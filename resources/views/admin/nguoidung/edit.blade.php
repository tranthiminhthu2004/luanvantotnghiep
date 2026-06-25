@extends('admin.trangchinh.admin')

@section('title','Cập nhật người dùng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">

        <div class="mb-6">

            <h2 class="text-2xl md:text-3xl font-bold text-[#061755]">

                Cập nhật người dùng

            </h2>

        </div>

        <form action="{{ route('admin.nguoidung.update',$nguoiDung->ma_nguoi_dung) }}" method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Vai trò -->
                <div>

                    <label class="font-medium text-slate-700">

                        Vai trò

                    </label>

                    <select name="ma_vai_tro" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm">

                        @foreach($vaiTros as $vaiTro)

                        <option value="{{ $vaiTro->ma_vai_tro }}"
                            {{ old('ma_vai_tro',$nguoiDung->ma_vai_tro)==$vaiTro->ma_vai_tro ? 'selected' : '' }}>

                            {{ $vaiTro->ten_vai_tro }}

                        </option>

                        @endforeach

                    </select>

                    @error('ma_vai_tro')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Họ và tên đệm -->
                <div>

                    <label class="font-medium text-slate-700">

                        Họ và tên đệm

                    </label>

                    <input type="text" name="ho_va_ten_dem" value="{{ old('ho_va_ten_dem',$nguoiDung->ho_va_ten_dem) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm">

                    @error('ho_va_ten_dem')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Tên -->
                <div>

                    <label class="font-medium text-slate-700">

                        Tên

                    </label>

                    <input type="text" name="ten" value="{{ old('ten',$nguoiDung->ten) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm">

                    @error('ten')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Email -->
                <div>

                    <label class="font-medium text-slate-700">

                        Email

                    </label>

                    <input type="email" value="{{ $nguoiDung->email }}" readonly
                        class="w-full mt-2 border bg-slate-100 rounded-xl px-4 py-2.5 text-sm cursor-not-allowed">

                </div>

                <!-- Số điện thoại -->
                <div>

                    <label class="font-medium text-slate-700">

                        Số điện thoại

                    </label>

                    <input type="text" name="so_dien_thoai" value="{{ old('so_dien_thoai',$nguoiDung->so_dien_thoai) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm">

                    @error('so_dien_thoai')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div> <!-- Giới tính -->
                <div>

                    <label class="font-medium text-slate-700">

                        Giới tính

                    </label>

                    <select name="gioi_tinh" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm">


                        <option value="Nam" {{ old('gioi_tinh',$nguoiDung->gioi_tinh) == 'Nam' ? 'selected' : '' }}>

                            Nam

                        </option>

                        <option value="Nu" {{ old('gioi_tinh',$nguoiDung->gioi_tinh) == 'Nu' ? 'selected' : '' }}>

                            Nữ

                        </option>

                        <option value="Khac" {{ old('gioi_tinh',$nguoiDung->gioi_tinh) == 'Khac' ? 'selected' : '' }}>

                            Khác

                        </option>

                    </select>

                    @error('gioi_tinh')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Ngày sinh -->
                <div>

                    <label class="font-medium text-slate-700">

                        Ngày sinh

                    </label>

                    <input type="date" name="ngay_sinh" value="{{ old('ngay_sinh',$nguoiDung->ngay_sinh) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm">

                    @error('ngay_sinh')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Trạng thái -->
                <div>

                    <label class="font-medium text-slate-700">

                        Trạng thái

                    </label>

                    <select name="trang_thai" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm">

                        <option value="1" {{ old('trang_thai',$nguoiDung->trang_thai) == 1 ? 'selected' : '' }}>

                            Hoạt động

                        </option>

                        <option value="0" {{ old('trang_thai',$nguoiDung->trang_thai) == 0 ? 'selected' : '' }}>

                            Đã khóa

                        </option>

                    </select>

                </div>

                <!-- Ảnh đại diện -->
                <div>

                    <label class="font-medium text-slate-700">

                        Ảnh đại diện

                    </label>

                    <input type="file" name="anh_dai_dien" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm">

                    @error('anh_dai_dien')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

            </div>

            <!-- Nút -->
            <div class="flex flex-col md:flex-row gap-3 mt-8">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full text-sm font-semibold transition">

                    Cập nhật

                </button>

                <a href="{{ route('admin.nguoidung.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full text-sm font-semibold text-center transition">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection