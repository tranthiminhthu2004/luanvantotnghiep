<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Đặt phòng thành công</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100">

    @include('components.navbar')

    @php

    $thanhToan = $datPhong->thanhToans->first();

    $soTienDaThanhToan = $thanhToan?->so_tien ?? 0;

    $soTienConLai = max(
    0,
    $datPhong->tong_tien - $soTienDaThanhToan
    );

    @endphp

    <main class="pt-28 pb-12">

        <div class="max-w-5xl mx-auto px-4">

            <div class="bg-white rounded-2xl shadow border border-slate-200 overflow-hidden">

                {{-- HEADER --}}
                <div class="bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-6">

                    <div class="flex items-center justify-between flex-wrap gap-6">

                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-full bg-white flex items-center justify-center">

                                <i class="fa-solid fa-circle-check text-3xl text-blue-600"></i>

                            </div>

                            <div>

                                <h1 class="text-3xl font-bold text-white">

                                    Đặt phòng thành công

                                </h1>

                                <p class="text-blue-100 mt-1">

                                    Cảm ơn bạn đã sử dụng dịch vụ của Hotel Booking.

                                </p>

                            </div>

                        </div>

                        <div class="bg-white/10 rounded-xl border border-white/20 px-6 py-4 text-white">

                            <div class="flex items-center gap-8">

                                <div>

                                    <div class="text-sm text-blue-100">

                                        Mã đặt phòng

                                    </div>

                                    <div class="text-xl font-bold mt-1">

                                        {{ $datPhong->ma_dat_phong }}

                                    </div>

                                </div>

                                <div class="w-px h-10 bg-white/30"></div>

                                <div>

                                    <div class="text-sm text-blue-100">

                                        Ngày đặt

                                    </div>

                                    <div class="font-semibold mt-1">

                                        {{ \Carbon\Carbon::parse($datPhong->ngay_dat)->format('d/m/Y H:i') }}

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                {{-- THÔNG TIN KHÁCH SẠN --}}
                <div class="px-8 py-6 border-b border-slate-200">

                    <h2 class="text-2xl font-bold text-slate-800 mb-6">

                        Thông tin khách sạn

                    </h2>

                    <div class="grid grid-cols-1 lg:grid-cols-[240px_1fr] gap-6">

                        {{-- Ảnh khách sạn --}}
                        <div>

                            <img src="{{ $datPhong->khachSan->hinhAnh->count()
                    ? asset($datPhong->khachSan->hinhAnh->first()->duong_dan_anh)
                    : asset('images/hotel-default.jpg') }}" alt="{{ $datPhong->khachSan->ten_khach_san }}"
                                class="w-full h-48 rounded-xl object-cover shadow">

                        </div>

                        {{-- Thông tin --}}
                        <div>

                            <h3 class="text-2xl font-bold text-slate-800">

                                {{ $datPhong->khachSan->ten_khach_san }}

                            </h3>

                            <div class="flex items-center gap-1 mt-2 mb-5">

                                @for($i = 1; $i <= $datPhong->khachSan->so_sao_khach_san; $i++)

                                    <i class="fa-solid fa-star text-yellow-400"></i>

                                    @endfor

                            </div>

                            <div class="space-y-3 text-[15px]">

                                <div class="flex">

                                    <span class="w-40 font-semibold text-slate-600">

                                        Địa chỉ:

                                    </span>

                                    <span class="text-slate-800">

                                        {{ $datPhong->khachSan->dia_chi }}

                                    </span>

                                </div>

                                <div class="flex">

                                    <span class="w-40 font-semibold text-slate-600">

                                        Số điện thoại:

                                    </span>

                                    <span>

                                        {{ $datPhong->khachSan->so_dien_thoai }}

                                    </span>

                                </div>

                                <div class="flex">

                                    <span class="w-40 font-semibold text-slate-600">

                                        Email:

                                    </span>

                                    <span>

                                        {{ $datPhong->khachSan->email }}

                                    </span>

                                </div>

                                <div class="flex">

                                    <span class="w-40 font-semibold text-slate-600">

                                        🛏️ Check-in:

                                    </span>

                                    <span>

                                        14:00

                                    </span>

                                </div>

                                <div class="flex">

                                    <span class="w-40 font-semibold text-slate-600">

                                        🧳 Check-out:

                                    </span>

                                    <span>

                                        12:00

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                {{-- THÔNG TIN KHÁCH HÀNG & ĐẶT PHÒNG --}}
                <div class="px-8 py-6 border-b border-slate-200">

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                        {{-- KHÁCH HÀNG --}}
                        <div>

                            <h2 class="text-2xl font-bold text-slate-800 mb-5">

                                Thông tin khách hàng

                            </h2>

                            <div class="space-y-3 text-[15px]">

                                <div class="flex">

                                    <span class="w-40 font-semibold text-slate-600">

                                        Họ và tên:

                                    </span>

                                    <span>

                                        {{ $datPhong->ho_va_ten_dem_khach }}
                                        {{ $datPhong->ten_khach }}

                                    </span>

                                </div>

                                <div class="flex">

                                    <span class="w-40 font-semibold text-slate-600">

                                        Số điện thoại:

                                    </span>

                                    <span>

                                        {{ $datPhong->so_dien_thoai_khach }}

                                    </span>

                                </div>

                                <div class="flex">

                                    <span class="w-40 font-semibold text-slate-600">

                                        Email:

                                    </span>

                                    <span class="break-all">

                                        {{ $datPhong->email_khach }}

                                    </span>

                                </div>

                                <div class="flex items-start">

                                    <span class="w-40 font-semibold text-slate-600">

                                        Ghi chú:

                                    </span>

                                    <span>

                                        {{ $datPhong->ghi_chu ?: 'Không có ghi chú' }}

                                    </span>

                                </div>

                            </div>

                        </div>

                        {{-- ĐẶT PHÒNG --}}
                        <div>

                            <h2 class="text-2xl font-bold text-slate-800 mb-5">

                                Thông tin đặt phòng

                            </h2>

                            <div class="space-y-3 text-[15px]">

                                <div class="flex">

                                    <span class="w-44 font-semibold text-slate-600">

                                        Ngày nhận phòng:

                                    </span>

                                    <span>

                                        {{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}

                                    </span>

                                </div>

                                <div class="flex">

                                    <span class="w-44 font-semibold text-slate-600">

                                        Ngày trả phòng:

                                    </span>

                                    <span>

                                        {{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}

                                    </span>

                                </div>

                                <div class="flex">

                                    <span class="w-44 font-semibold text-slate-600">

                                        Người lớn:

                                    </span>

                                    <span>

                                        {{ $datPhong->so_nguoi_truong_thanh }}

                                    </span>

                                </div>

                                <div class="flex">

                                    <span class="w-44 font-semibold text-slate-600">

                                        Trẻ em:

                                    </span>

                                    <span>

                                        {{ $datPhong->so_tre_em }}

                                    </span>

                                </div>

                                <div class="flex">

                                    <span class="w-44 font-semibold text-slate-600">

                                        Người cao tuổi:

                                    </span>

                                    <span>

                                        {{ $datPhong->so_nguoi_cao_tuoi }}

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- LOẠI PHÒNG ĐÃ ĐẶT (Chiếm hết 1 hàng ngang phía dưới) --}}
                    <div class="mt-8 pt-6 border-t border-slate-200">

                        <h2 class="text-2xl font-bold text-slate-800 mb-5">

                            Loại phòng đã đặt

                        </h2>

                        <div class="overflow-hidden rounded-xl border border-slate-200">

                            <div class="overflow-x-auto">

                                <table class="w-full text-left min-w-[600px]">

                                    <thead class="bg-slate-50 border-b border-slate-200 text-slate-700">

                                        <tr>

                                            <th class="px-6 py-4 font-semibold text-base">

                                                Loại phòng

                                            </th>

                                            <th class="px-6 py-4 font-semibold text-base text-center">

                                                Số lượng

                                            </th>

                                            <th class="px-6 py-4 font-semibold text-base text-center">

                                                Số đêm

                                            </th>

                                            <th class="px-6 py-4 font-semibold text-base text-right">

                                                Thành tiền

                                            </th>

                                        </tr>

                                    </thead>

                                    <tbody class="divide-y divide-slate-200">

                                        @foreach($datPhong->chiTietDatPhong as $chiTiet)

                                        <tr class="hover:bg-slate-50 transition">

                                            <td class="px-6 py-4 font-bold text-blue-600">

                                                {{ $chiTiet->loaiPhong->ten_loai_phong }}

                                            </td>

                                            <td class="px-6 py-4 text-center text-slate-700">

                                                {{ $chiTiet->so_luong_phong }} phòng

                                            </td>

                                            <td class="px-6 py-4 text-center text-slate-700">

                                                {{ $chiTiet->so_dem }} đêm

                                            </td>

                                            <td class="px-6 py-4 text-right font-bold text-blue-600">

                                                {{ number_format($chiTiet->thanh_tien,0,',','.') }}đ

                                            </td>

                                        </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- THANH TOÁN --}}
                <div class="px-8 py-6 border-b border-slate-200">

                    <h2 class="text-2xl font-bold text-slate-800 mb-5">

                        Thanh toán

                    </h2>

                    <div class="space-y-3 text-[15px]">

                        <div class="flex">

                            <span class="w-56 font-semibold text-slate-600">

                                Phương thức thanh toán:

                            </span>

                            <span>

                                {{ $thanhToan->phuong_thuc_thanh_toan }}

                            </span>

                        </div>

                        <div class="flex">

                            <span class="w-56 font-semibold text-slate-600">

                                Loại thanh toán:

                            </span>

                            <span>

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

                                @endswitch

                            </span>

                        </div>

                        <div class="flex">

                            <span class="w-56 font-semibold text-slate-600">

                                Mã giao dịch:

                            </span>

                            <span>

                                {{ $thanhToan->ma_giao_dich ?? '--' }}

                            </span>

                        </div>

                        <div class="flex">

                            <span class="w-56 font-semibold text-slate-600">

                                Ngày thanh toán:

                            </span>

                            <span>

                                {{ $thanhToan->ngay_thanh_toan
                    ? \Carbon\Carbon::parse($thanhToan->ngay_thanh_toan)->format('d/m/Y H:i')
                    : '--' }}

                            </span>

                        </div>

                        <div class="flex">

                            <span class="w-56 font-semibold text-slate-600">

                                Đã thanh toán:

                            </span>

                            <span class="font-bold text-green-600">

                                {{ number_format($soTienDaThanhToan,0,',','.') }}đ

                            </span>

                        </div>

                        <div class="flex">

                            <span class="w-56 font-semibold text-slate-600">

                                Còn phải thanh toán:

                            </span>

                            <span class="font-bold text-red-500">

                                {{ number_format($soTienConLai,0,',','.') }}đ

                            </span>

                        </div>

                        <div class="flex items-center">

                            <span class="w-56 font-semibold text-slate-600">

                                Trạng thái thanh toán:

                            </span>

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                                Thành công

                            </span>

                        </div>

                        <div class="flex items-center">

                            <span class="w-56 font-semibold text-slate-600">

                                Trạng thái đặt phòng:

                            </span>

                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">

                                @switch($datPhong->trang_thai_dat_phong)

                                @case('DaXacNhan')

                                Đã xác nhận

                                @break

                                @case('ChoXacNhan')

                                Chờ xác nhận

                                @break

                                @case('DaNhanPhong')

                                Đã nhận phòng

                                @break

                                @case('DaTraPhong')

                                Đã trả phòng

                                @break

                                @case('DaHuy')

                                Đã hủy

                                @break

                                @endswitch

                            </span>

                        </div>

                    </div>

                    {{-- TỔNG TIỀN --}}
                    <div class="mt-8 pt-5 border-t border-slate-200 flex justify-between items-center">

                        <span class="text-xl font-bold text-slate-800">

                            Tổng tiền phòng

                        </span>

                        <span class="text-3xl font-bold text-blue-600">

                            {{ number_format($datPhong->tong_tien,0,',','.') }}đ

                        </span>

                    </div>

                </div>

                {{-- NÚT CHỨC NĂNG --}}
                <div class="px-8 py-6">

                    <div class="flex flex-col sm:flex-row justify-center gap-4">

                        <a href="{{ route('users.index') }}"
                            class="px-8 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition">

                            <i class="fa-solid fa-house mr-2"></i>

                            Về trang chủ

                        </a>

                        <a href="{{ route('lichsudatphong.index') }}"
                            class="px-8 py-3 rounded-xl border border-blue-600 text-blue-600 hover:bg-blue-50 font-semibold transition">

                            <i class="fa-solid fa-clock-rotate-left mr-2"></i>

                            Lịch sử đặt phòng

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </main>

</body>

</html>