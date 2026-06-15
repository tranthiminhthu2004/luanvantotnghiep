@extends('admin.trangchinh.admin')

@section('title','Chi tiết phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <h2 class="text-4xl font-bold text-[#061755] mb-8">

            Phòng {{ $phong->so_phong }}

        </h2>

        <div class="grid md:grid-cols-2 gap-8">

            <div class="space-y-4 text-lg">

                <p>

                    <strong>Khách sạn:</strong>

                    {{ $phong->loaiPhong->khachSan->ten_khach_san }}

                </p>

                <p>

                    <strong>Loại phòng:</strong>

                    {{ $phong->loaiPhong->ten_loai_phong }}

                </p>

                <p>

                    <strong>Số phòng:</strong>

                    {{ $phong->so_phong }}

                </p>

                <p>

                    <strong>Tầng:</strong>

                    {{ $phong->tang }}

                </p>

                <p>

                    <strong>Trạng thái:</strong>

                    @if($phong->trang_thai_phong == 'DangHoatDong')

                    Đang hoạt động

                    @elseif($phong->trang_thai_phong == 'BaoTri')

                    Bảo trì

                    @else

                    Ngưng hoạt động

                    @endif

                </p>

            </div>

        </div>

    </div>

</div>

@endsection