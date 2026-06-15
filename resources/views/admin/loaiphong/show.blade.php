@extends('admin.trangchinh.admin')

@section('title','Chi tiết loại phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <h2 class="text-4xl font-bold text-[#061755] mb-8">

            {{ $loaiPhong->ten_loai_phong }}

        </h2>

        <div class="grid md:grid-cols-2 gap-8">

            <div>

                <img src="{{ asset('images/no-room.jpg') }}" class="w-full h-80 object-cover rounded-3xl">

            </div>

            <div class="space-y-4 text-lg">

                <p>

                    <strong>Khách sạn:</strong>

                    {{ $loaiPhong->khachSan->ten_khach_san }}

                </p>

                <p>

                    <strong>Số người tối đa:</strong>

                    {{ $loaiPhong->so_nguoi_toi_da }}

                </p>

                <p>

                    <strong>Diện tích:</strong>

                    {{ $loaiPhong->dien_tich }} m²

                </p>

                <p>

                    <strong>Số giường:</strong>

                    {{ $loaiPhong->so_giuong }}

                </p>

                <p>

                    <strong>Giá cơ bản:</strong>

                    {{ number_format($loaiPhong->gia_co_ban,0,',','.') }} đ

                </p>

                <p>

                    <strong>Trạng thái:</strong>

                    {{ $loaiPhong->trang_thai ? 'Hoạt động' : 'Tạm dừng' }}

                </p>

            </div>

        </div>

        <div class="mt-8">

            <h3 class="text-2xl font-bold mb-4">

                Mô tả

            </h3>

            <p class="text-gray-600 leading-8">

                {{ $loaiPhong->mo_ta }}

            </p>

        </div>

        <div class="mt-8">

            <a href="{{ route('admin.loaiphong.index') }}" class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection