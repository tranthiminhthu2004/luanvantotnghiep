@extends('admin.trangchinh.admin')

@section('title','Thêm người dùng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-4 md:p-6">

        <div class="mb-8">

            <h2 class="text-4xl font-bold text-[#061755]">

                Thêm người dùng mới

            </h2>

        </div>

        <form action="{{ route('admin.nguoidung.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Vai trò -->
                <div>

                    <label class="font-medium text-slate-700">

                        Vai trò

                    </label>

                    <select name="ma_vai_tro" class="w-full mt-2 border rounded-full px-5 py-3">

                        @foreach($vaiTros as $vaiTro)

                        <option value="{{ $vaiTro->ma_vai_tro }}">

                            {{ $vaiTro->ten_vai_tro }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- Họ và tên đệm -->
                <div>

                    <label class="font-medium text-slate-700">

                        Họ và tên đệm

                    </label>

                    <input type="text" name="ho_va_ten_dem" value="{{ old('ho_va_ten_dem') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Tên -->
                <div>

                    <label class="font-medium text-slate-700">

                        Tên

                    </label>

                    <input type="text" name="ten" value="{{ old('ten') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Email -->
                <div>

                    <label class="font-medium text-slate-700">

                        Email

                    </label>

                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Mật khẩu -->
                <div>

                    <label class="font-medium text-slate-700">

                        Mật khẩu

                    </label>

                    <input type="password" name="mat_khau" class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- SĐT -->
                <div>

                    <label class="font-medium text-slate-700">

                        Số điện thoại

                    </label>

                    <input type="text" name="so_dien_thoai" value="{{ old('so_dien_thoai') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Giới tính -->
                <div>

                    <label class="font-medium text-slate-700">

                        Giới tính

                    </label>

                    <select name="gioi_tinh" class="w-full mt-2 border rounded-full px-5 py-3">

                        <option value="Nam">Nam</option>

                        <option value="Nu">Nữ</option>

                        <option value="Khac">Khác</option>

                    </select>

                </div>

                <!-- Ngày sinh -->
                <div>

                    <label class="font-medium text-slate-700">

                        Ngày sinh

                    </label>

                    <input type="date" name="ngay_sinh" value="{{ old('ngay_sinh') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Ảnh đại diện -->
                <div class="md:col-span-2">

                    <label class="font-medium text-slate-700">

                        Ảnh đại diện

                    </label>

                    <input type="file" name="anh_dai_dien" class="w-full mt-2 border rounded-xl px-5 py-3">

                </div>

            </div>

            <div class="flex flex-col md:flex-row gap-4 mt-8">

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                    Lưu người dùng

                </button>

                <a href="{{ route('admin.nguoidung.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl text-center">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection