@extends('admin.trangchinh.admin')

@section('title','Chi tiết đơn đặt phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- Thông tin đơn -->
    <div class="bg-white rounded-3xl shadow p-6 mb-6">

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <p class="text-gray-500">
                    Mã đặt phòng
                </p>

                <p class="font-bold text-xl text-blue-600">

                    {{ $datPhong->ma_dat_phong }}

                </p>

            </div>

            <div>

                <p class="text-gray-500">
                    Trạng thái
                </p>

                @if($datPhong->trang_thai_dat_phong == 'ChoXacNhan')

                <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full">

                    Chờ xác nhận

                </span>

                @elseif($datPhong->trang_thai_dat_phong == 'DaXacNhan')

                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full">

                    Đã xác nhận

                </span>

                @elseif($datPhong->trang_thai_dat_phong == 'HoanThanh')

                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full">

                    Hoàn thành

                </span>

                @elseif($datPhong->trang_thai_dat_phong == 'DaHuy')

                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full">

                    Đã hủy

                </span>

                @elseif($datPhong->trang_thai_dat_phong == 'KhongDen')

                <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full">

                    Không đến

                </span>

                @endif

            </div>

        </div>

    </div>

    <!-- Thông tin khách -->
    <div class="bg-white rounded-3xl shadow p-6 mb-6">

        <h3 class="text-2xl font-bold mb-4">

            Thông tin khách hàng

        </h3>

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <p class="text-gray-500">
                    Họ tên
                </p>

                <p>

                    {{ $datPhong->ho_va_ten_dem_khach }}
                    {{ $datPhong->ten_khach }}

                </p>

            </div>

            <div>

                <p class="text-gray-500">
                    Email
                </p>

                <p>

                    {{ $datPhong->email_khach }}

                </p>

            </div>

            <div>

                <p class="text-gray-500">
                    Số điện thoại
                </p>

                <p>

                    {{ $datPhong->so_dien_thoai_khach }}

                </p>

            </div>

            <div>

                <p class="text-gray-500">
                    Khách sạn
                </p>

                <p>

                    {{ $datPhong->khachSan->ten_khach_san }}

                </p>

            </div>

        </div>

    </div>

    <!-- Thông tin lưu trú -->
    <div class="bg-white rounded-3xl shadow p-6 mb-6">

        <h3 class="text-2xl font-bold mb-4">

            Thông tin lưu trú

        </h3>

        <div class="grid md:grid-cols-3 gap-6">

            <div>

                <p class="text-gray-500">
                    Ngày nhận phòng
                </p>

                <p>

                    {{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}

                </p>

            </div>

            <div>

                <p class="text-gray-500">
                    Ngày trả phòng
                </p>

                <p>

                    {{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}

                </p>

            </div>

            <div>

                <p class="text-gray-500">
                    Tổng tiền
                </p>

                <p class="font-bold text-blue-600">

                    {{ number_format($datPhong->tong_tien,0,',','.') }}đ

                </p>

            </div>

        </div>

    </div>

    <!-- Chi tiết loại phòng -->
    <div class="bg-white rounded-3xl shadow overflow-hidden">

        <div class="p-6">

            <h3 class="text-2xl font-bold">

                Các loại phòng đã đặt

            </h3>

        </div>

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left">
                        Loại phòng
                    </th>

                    <th class="px-6 py-4 text-left">
                        Số lượng
                    </th>

                    <th class="px-6 py-4 text-left">
                        Giá
                    </th>

                    <th class="px-6 py-4 text-left">
                        Số đêm
                    </th>

                    <th class="px-6 py-4 text-left">
                        Thành tiền
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($datPhong->chiTietDatPhong as $chiTiet)

                <tr class="border-t">

                    <td class="px-6 py-4">

                        {{ $chiTiet->loaiPhong->ten_loai_phong }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $chiTiet->so_luong_phong }}

                    </td>

                    <td class="px-6 py-4">

                        {{ number_format($chiTiet->gia_dat_thuc_te,0,',','.') }}đ

                    </td>

                    <td class="px-6 py-4">

                        {{ $chiTiet->so_dem }}

                    </td>

                    <td class="px-6 py-4 font-bold">

                        {{ number_format($chiTiet->thanh_tien,0,',','.') }}đ

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        <a href="{{ route('admin.datphong.index') }}" class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl">

            Quay lại

        </a>

    </div>

</div>

@endsection