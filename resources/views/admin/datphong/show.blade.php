@extends('admin.trangchinh.admin')
@section('title','Chi tiết đơn đặt phòng')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-6">

        <!-- Thông tin đơn -->
        <div>

            <h3 class="text-xl font-bold text-[#061755] mb-4">

                Thông tin đơn đặt phòng

            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Mã đặt phòng

                    </p>

                    <p class="text-xl font-bold text-blue-600">

                        {{ $datPhong->ma_dat_phong }}

                    </p>

                </div>

                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-2">

                        Trạng thái

                    </p>

                    @if($datPhong->trang_thai_dat_phong == 'DaXacNhan')

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">

                        Đã xác nhận

                    </span>

                    @elseif($datPhong->trang_thai_dat_phong == 'DaNhanPhong')

                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">

                        Đã nhận phòng

                    </span>

                    @elseif($datPhong->trang_thai_dat_phong == 'DaTraPhong')

                    <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm font-medium">

                        Đã trả phòng

                    </span>

                    @elseif($datPhong->trang_thai_dat_phong == 'DaHuy')

                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">

                        Đã hủy

                    </span>

                    @elseif($datPhong->trang_thai_dat_phong == 'KhongDen')

                    <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-medium">

                        Không đến

                    </span>

                    @endif

                </div>

            </div>

        </div>

        <!-- Thông tin khách hàng -->
        <div class="mt-8">

            <h3 class="text-xl font-bold text-[#061755] mb-4">

                Thông tin khách hàng

            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Họ và tên

                    </p>

                    <p class="font-semibold">

                        {{ $datPhong->ho_va_ten_dem_khach }}
                        {{ $datPhong->ten_khach }}

                    </p>

                </div>

                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Email

                    </p>

                    <p class="font-semibold break-all">

                        {{ $datPhong->email_khach }}

                    </p>

                </div>

                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Số điện thoại

                    </p>

                    <p class="font-semibold">

                        {{ $datPhong->so_dien_thoai_khach }}

                    </p>

                </div>

                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Khách sạn

                    </p>

                    <p class="font-semibold">

                        {{ $datPhong->khachSan->ten_khach_san }}

                    </p>

                </div>

            </div>

        </div>
        <div class="mt-8">

            <h3 class="text-xl font-bold text-[#061755] mb-4">

                Thông tin lưu trú

            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">

                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Ngày nhận phòng

                    </p>

                    <p class="font-semibold">

                        {{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}

                    </p>

                </div>

                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Ngày trả phòng

                    </p>

                    <p class="font-semibold">

                        {{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}

                    </p>

                </div>

                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Tổng tiền

                    </p>

                    <p class="text-xl font-bold text-blue-600">

                        {{ number_format($datPhong->tong_tien,0,',','.') }}đ

                    </p>

                </div>

                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Người lớn

                    </p>

                    <p class="font-semibold">

                        {{ $datPhong->so_nguoi_truong_thanh }}

                    </p>

                </div>

                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Trẻ em

                    </p>

                    <p class="font-semibold">

                        {{ $datPhong->so_tre_em }}

                    </p>

                </div>

                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Người cao tuổi

                    </p>

                    <p class="font-semibold">

                        {{ $datPhong->so_nguoi_cao_tuoi }}

                    </p>

                </div>

                <div class="bg-slate-50 border rounded-xl p-4 md:col-span-2 xl:col-span-3">

                    <p class="text-black font-medium mb-1">

                        Ghi chú

                    </p>

                    <p class="font-semibold whitespace-pre-line">

                        {{ $datPhong->ghi_chu ?: 'Không có ghi chú.' }}

                    </p>

                </div>

            </div>

        </div>

        <!-- Danh sách loại phòng -->
        @php

        $thanhToan = $datPhong->thanhToans
            ->where('trang_thai_thanh_toan', 'ThanhCong')
            ->sortByDesc('ma_thanh_toan')
            ->first()
            ?? $datPhong->thanhToans
                ->sortByDesc('ma_thanh_toan')
                ->first();

        $soTienDaThanhToan = $datPhong->thanhToans
            ->where('trang_thai_thanh_toan', 'ThanhCong')
            ->sum('so_tien');

        $soTienConLai = max(
            0,
            $datPhong->tong_tien - $soTienDaThanhToan
        );

        @endphp

        <div class="mt-8">

            <h3 class="text-xl font-bold text-[#061755] mb-4">

                Thông tin thanh toán

            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">

                <!-- Loại thanh toán -->
                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Loại thanh toán

                    </p>

                    <p class="font-semibold text-blue-600">

                        @if($thanhToan)

                        @switch($thanhToan->loai_thanh_toan)

                        @case('DatCoc')

                        Đặt cọc 30%

                        @break

                        @case('ThanhToanToanBo')

                        Thanh toán toàn bộ

                        @break

                        @case('ThanhToanConLai')

                        Thanh toán phần còn lại

                        @break

                        @default

                        {{ $thanhToan->loai_thanh_toan }}

                        @endswitch

                        @else

                        -

                        @endif

                    </p>

                </div>

                <!-- Phương thức -->
                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Phương thức thanh toán

                    </p>

                    <p class="font-semibold">

                        @if($thanhToan)

                        @switch($thanhToan->phuong_thuc_thanh_toan)

                        @case('VNPay')

                        VNPay

                        @break

                        @case('TienMat')

                        Tiền mặt

                        @break

                        @case('Momo')

                        MoMo

                        @break

                        @default

                        {{ $thanhToan->phuong_thuc_thanh_toan }}

                        @endswitch

                        @else

                        -

                        @endif

                    </p>

                </div>

                <!-- Trạng thái -->
                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Trạng thái thanh toán

                    </p>

                    <p class="font-semibold text-green-600">

                        {{ $thanhToan->trang_thai_thanh_toan ?? '-' }}

                    </p>

                </div>

                <!-- Đã thanh toán -->
                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Đã thanh toán

                    </p>

                    <p class="text-lg font-bold text-green-600">

                        {{ number_format($soTienDaThanhToan,0,',','.') }} đ

                    </p>

                </div>

                <!-- Còn lại -->
                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Còn phải thanh toán

                    </p>

                    <p class="text-lg font-bold text-red-600">

                        {{ number_format($soTienConLai,0,',','.') }} đ

                    </p>

                </div>

                <!-- Mã giao dịch -->
                <div class="bg-slate-50 border rounded-xl p-4">

                    <p class="text-black font-medium mb-1">

                        Mã giao dịch

                    </p>

                    <p class="font-semibold break-all">

                        {{ $thanhToan->ma_giao_dich ?? '-' }}

                    </p>

                </div>

            </div>

        </div>

        <div class="mt-8">

            <h3 class="text-xl font-bold text-[#061755] mb-4">

                Danh sách loại phòng đã đặt

            </h3>

            <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="min-w-[900px] w-full">

                        <thead class="bg-slate-100 text-black">

                            <tr>

                                <th class="px-6 py-4 text-left font-semibold">

                                    Loại phòng

                                </th>

                                <th class="px-6 py-4 text-left font-semibold">

                                    Số lượng

                                </th>

                                <th class="px-6 py-4 text-left font-semibold">

                                    Giá

                                </th>

                                <th class="px-6 py-4 text-left font-semibold">

                                    Số đêm

                                </th>

                                <th class="px-6 py-4 text-left font-semibold">

                                    Thành tiền

                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($datPhong->chiTietDatPhong as $chiTiet)

                            <tr class="border-t hover:bg-slate-50 transition">

                                <td class="px-6 py-4 font-medium">

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

                                <td class="px-6 py-4 font-bold text-blue-600">

                                    {{ number_format($chiTiet->thanh_tien,0,',','.') }}đ

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="mt-8">

            <a href="{{ route('admin.datphong.index') }}"
                class="inline-flex items-center bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-full font-semibold transition">

                Quay lại

            </a>


        </div>

    </div>

</div>

@endsection