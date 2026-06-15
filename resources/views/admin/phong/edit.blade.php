@extends('admin.trangchinh.admin')

@section('title','Cập nhật phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <h2 class="text-4xl font-bold text-[#061755] mb-8">

            Cập nhật phòng

        </h2>

        <form action="{{ route('admin.phong.update',$phong->ma_phong) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <label class="font-medium">
                        Loại phòng
                    </label>

                    <select name="ma_loai_phong" class="w-full mt-2 border rounded-full px-5 py-3">

                        @foreach($loaiPhongs as $loaiPhong)

                        <option value="{{ $loaiPhong->ma_loai_phong }}"
                            {{ $phong->ma_loai_phong == $loaiPhong->ma_loai_phong ? 'selected' : '' }}>

                            {{ $loaiPhong->khachSan->ten_khach_san }}
                            -
                            {{ $loaiPhong->ten_loai_phong }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="font-medium">
                        Số phòng
                    </label>

                    <input type="text" name="so_phong" value="{{ $phong->so_phong }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <div>

                    <label class="font-medium">
                        Tầng
                    </label>

                    <input type="number" name="tang" value="{{ $phong->tang }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <div>

                    <label class="font-medium">
                        Trạng thái
                    </label>

                    <select name="trang_thai_phong" class="w-full mt-2 border rounded-full px-5 py-3">

                        <option value="DangHoatDong" {{ $phong->trang_thai_phong == 'DangHoatDong' ? 'selected' : '' }}>

                            Đang hoạt động

                        </option>

                        <option value="BaoTri" {{ $phong->trang_thai_phong == 'BaoTri' ? 'selected' : '' }}>

                            Bảo trì

                        </option>

                        <option value="NgungHoatDong"
                            {{ $phong->trang_thai_phong == 'NgungHoatDong' ? 'selected' : '' }}>

                            Ngưng hoạt động

                        </option>

                    </select>

                </div>

            </div>

            <div class="mt-8 flex gap-4">

                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl">

                    Cập nhật

                </button>

                <a href="{{ route('admin.phong.index') }}" class="bg-slate-200 px-6 py-3 rounded-xl">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection