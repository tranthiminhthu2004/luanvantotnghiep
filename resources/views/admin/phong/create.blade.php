@extends('admin.trangchinh.admin')

@section('title','Thêm phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-4 md:p-6">

        <div class="mb-8">

            <h2 class="text-4xl font-bold text-[#061755]">

                Thêm phòng mới

            </h2>

        </div>

        <form action="{{ route('admin.phong.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Loại phòng -->
                <div>

                    <label class="font-medium text-slate-700">

                        Loại phòng

                    </label>

                    <select name="ma_loai_phong" class="w-full mt-2 border rounded-full px-5 py-3">

                        <option value="">
                            Chọn loại phòng
                        </option>

                        @foreach($loaiPhongs as $loaiPhong)

                        <option value="{{ $loaiPhong->ma_loai_phong }}">

                            {{ $loaiPhong->khachSan->ten_khach_san }}
                            -
                            {{ $loaiPhong->ten_loai_phong }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- Số phòng -->
                <div>

                    <label class="font-medium text-slate-700">

                        Số phòng

                    </label>

                    <input type="text" name="so_phong" value="{{ old('so_phong') }}" placeholder="Ví dụ: P101"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Tầng -->
                <div>

                    <label class="font-medium text-slate-700">

                        Tầng

                    </label>

                    <input type="number" name="tang" value="{{ old('tang') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Trạng thái -->
                <div>

                    <label class="font-medium text-slate-700">

                        Trạng thái

                    </label>

                    <select name="trang_thai_phong" class="w-full mt-2 border rounded-full px-5 py-3">

                        <option value="DangHoatDong">

                            Đang hoạt động

                        </option>

                        <option value="BaoTri">

                            Bảo trì

                        </option>

                        <option value="NgungHoatDong">

                            Ngưng hoạt động

                        </option>
                    </select>

                </div>

            </div>

            <div class="flex flex-col md:flex-row gap-4 mt-8">

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                    Lưu phòng

                </button>

                <a href="{{ route('admin.phong.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl text-center">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection