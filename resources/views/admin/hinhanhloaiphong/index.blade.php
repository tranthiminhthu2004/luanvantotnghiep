@extends('admin.trangchinh.admin')

@section('title','Quản lý ảnh loại phòng')

@section('content')

<div class="bg-white rounded-3xl shadow p-6">

    <h2 class="text-3xl font-bold mb-6">

        Ảnh - {{ $loaiPhong->ten_loai_phong }}

    </h2>

    <form action="{{ route('admin.loaiphong.hinhanh.store',$loaiPhong->ma_loai_phong) }}" method="POST"
        enctype="multipart/form-data">

        @csrf

        <input type="file" name="anh[]" multiple class="border p-3 rounded-xl">

        <button type="submit" class="bg-blue-600 text-white px-5 py-3 rounded-xl ml-3">

            Tải ảnh lên

        </button>

    </form>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mt-8">

        @foreach($loaiPhong->hinhAnh as $anh)

        <div class="relative">

            <img src="{{ asset($anh->duong_dan_anh) }}" class="w-full h-48 object-cover rounded-2xl">

            <form action="{{ route('admin.loaiphong.hinhanh.destroy',$anh->ma_hinh_anh_phong) }}" method="POST">

                @csrf
                @method('DELETE')

                <button class="absolute top-2 right-2 bg-red-500 text-white px-3 py-1 rounded-lg">

                    Xóa

                </button>

            </form>

        </div>

        @endforeach

    </div>

</div>

@endsection