@extends('admin.trangchinh.admin')

@section('title','Cập nhật người dùng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-4 md:p-6">

        <div class="mb-8">

            <h2 class="text-4xl font-bold text-[#061755]">

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

                    <select name="ma_vai_tro" class="w-full mt-2 border rounded-full px-5 py-3">

                        @foreach($vaiTros as $vaiTro)

                        <option value="{{ $vaiTro->ma_vai_tro }}"
                            {{ $nguoiDung->ma_vai_tro == $vaiTro->ma_vai_tro ? 'selected' : '' }}>

                            {{ $vaiTro->ten_vai_tro }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- Họ và tên đệm -->
                <div>

                    <label class="font-medium">

                        Họ và tên đệm

                    </label>

                    <input type="text" name="ho_va_ten_dem" value="{{ old('ho_va_ten_dem',$nguoiDung->ho_va_ten_dem) }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Tên -->
                <div>

                    <label class="font-medium">

                        Tên

                    </label>

                    <input type="text" name="ten" value="{{ old('ten',$nguoiDung->ten) }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Email -->
                <div>

                    <label class="font-medium">

                        Email

                    </label>

                    <input type="email" value="{{ $nguoiDung->email }}" readonly
                        class="w-full mt-2 border bg-slate-100 rounded-full px-5 py-3">

                </div>

                <!-- SĐT -->
                <div>

                    <label class="font-medium">

                        Số điện thoại

                    </label>

                    <input type="text" name="so_dien_thoai" value="{{ old('so_dien_thoai',$nguoiDung->so_dien_thoai) }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Giới tính -->
                <div>

                    <label class="font-medium">

                        Giới tính

                    </label>

                    <select name="gioi_tinh" class="w-full mt-2 border rounded-full px-5 py-3">

                        <option value="Nam" {{ $nguoiDung->gioi_tinh == 'Nam' ? 'selected' : '' }}>

                            Nam

                        </option>

                        <option value="Nu" {{ $nguoiDung->gioi_tinh == 'Nu' ? 'selected' : '' }}>

                            Nữ

                        </option>

                        <option value="Khac" {{ $nguoiDung->gioi_tinh == 'Khac' ? 'selected' : '' }}>

                            Khác

                        </option>

                    </select>

                </div>

                <!-- Ngày sinh -->
                <div>

                    <label class="font-medium">

                        Ngày sinh

                    </label>

                    <input type="date" name="ngay_sinh" value="{{ old('ngay_sinh',$nguoiDung->ngay_sinh) }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Trạng thái -->
                <div>

                    <label class="font-medium">

                        Trạng thái

                    </label>

                    <select name="trang_thai" class="w-full mt-2 border rounded-full px-5 py-3">

                        <option value="1" {{ $nguoiDung->trang_thai == 1 ? 'selected' : '' }}>

                            Hoạt động

                        </option>

                        <option value="0" {{ $nguoiDung->trang_thai == 0 ? 'selected' : '' }}>

                            Đã khóa

                        </option>

                    </select>

                </div>


                <div class="flex gap-4 mt-8">

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                        Cập nhật

                    </button>

                    <a href="{{ route('admin.nguoidung.index') }}"
                        class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl">

                        Quay lại

                    </a>

                </div>

        </form>

    </div>


</div>

@endsection