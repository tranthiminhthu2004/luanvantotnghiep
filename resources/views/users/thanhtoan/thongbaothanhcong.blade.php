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

    <main class="pt-32 pb-16 ">

        <div class="max-w-5xl mx-auto px-4">

            <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

                {{-- HEADER --}}
                <div class="bg-blue-600 px-8 py-8 text-white ">

                    <div class="flex items-center gap-5">

                        <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center flex-shrink-0">

                            <i class="fa-solid fa-circle-check text-5xl text-blue-600">

                            </i>

                        </div>

                        <div>

                            <h1 class="text-3xl font-bold">

                                Đặt phòng thành công

                            </h1>

                            <p class="mt-2 text-green-100">

                                Đơn đặt phòng của bạn đã được tạo thành công.

                            </p>

                        </div>

                    </div>

                </div>

                {{-- MÃ ĐẶT PHÒNG --}}
                <div class="px-8 py-6 border-b border-slate-200">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                        <div class="flex items-center gap-3">

                            <i class="fa-solid fa-ticket text-blue-600 text-xl">

                            </i>

                            <span class="text-black font-semibold">

                                Mã đặt phòng:

                            </span>

                            <span class="text-xl font-bold text-blue-600">

                                {{ $datPhong->ma_dat_phong }}

                            </span>

                        </div>

                        <div class="flex items-center gap-3">

                            <i class="fa-solid fa-calendar-days text-blue-600">

                            </i>

                            <span class="text-black font-semibold">

                                Ngày đặt:

                            </span>

                            <span class="font-semibold text-slate-800">

                                {{ \Carbon\Carbon::parse($datPhong->ngay_dat)->format('d/m/Y H:i') }}

                            </span>

                        </div>

                    </div>

                </div>
                {{-- THÔNG TIN KHÁCH SẠN --}}
                <div class="px-8 py-8 border-b border-slate-200">

                    <h2 class="text-2xl font-bold text-slate-800 mb-6">

                        Thông tin khách sạn

                    </h2>

                    <div class="grid grid-cols-1 lg:grid-cols-[260px_1fr] gap-8">

                        {{-- Ảnh khách sạn --}}
                        <div>

                            <img src="{{ $datPhong->khachSan->hinhAnh->count()
                    ? asset($datPhong->khachSan->hinhAnh->first()->duong_dan_anh)
                    : asset('images/hotel-default.jpg') }}" alt="{{ $datPhong->khachSan->ten_khach_san }}"
                                class="w-full h-56 object-cover rounded-xl">

                        </div>

                        {{-- Thông tin --}}
                        <div>

                            <h3 class="text-3xl font-bold text-slate-800">

                                {{ $datPhong->khachSan->ten_khach_san }}

                            </h3>

                            <div class="flex items-center gap-1 text-yellow-400 mt-3">

                                @for($i = 1; $i <= $datPhong->khachSan->so_sao_khach_san; $i++)

                                    <i class="fa-solid fa-star"></i>

                                    @endfor

                            </div>

                            <div class="mt-6 space-y-4">

                                <div class="flex gap-3">

                                    <i class="fa-solid fa-location-dot text-red-500 mt-1"></i>

                                    <span>

                                        {{ $datPhong->khachSan->dia_chi }}

                                    </span>

                                </div>

                                <div class="flex gap-3">

                                    <i class="fa-solid fa-phone text-black mt-1"></i>

                                    <span>

                                        {{ $datPhong->khachSan->so_dien_thoai }}

                                    </span>

                                </div>

                                <div class="flex gap-3">

                                    <i class="fa-solid fa-envelope text-slate-500 mt-1"></i>

                                    <span>

                                        {{ $datPhong->khachSan->email }}

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- THÔNG TIN KHÁCH HÀNG --}}
                <div class="px-8 py-8 border-b border-slate-200">

                    <h2 class="text-2xl font-bold text-black mb-6">

                        Thông tin khách hàng

                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] gap-y-5">

                        <div class="font-semibold text-black">

                            Họ và tên

                        </div>

                        <div>

                            {{ $datPhong->ho_va_ten_dem_khach }}
                            {{ $datPhong->ten_khach }}

                        </div>

                        <div class="font-semibold text-black">

                            Số điện thoại

                        </div>

                        <div>

                            {{ $datPhong->so_dien_thoai_khach }}

                        </div>

                        <div class="font-semibold text-black">

                            Email

                        </div>

                        <div>

                            {{ $datPhong->email_khach }}

                        </div>

                        <div class="font-semibold  text-black">

                            Ghi chú

                        </div>

                        <div>

                            {{ $datPhong->ghi_chu ?: 'Không có ghi chú' }}

                        </div>

                    </div>

                </div>
                {{-- THÔNG TIN ĐẶT PHÒNG --}}
                <div class="px-8 py-8 border-b border-slate-200">

                    <h2 class="text-2xl font-bold text-slate-800 mb-6">

                        Thông tin đặt phòng

                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] gap-y-5">

                        <div class="font-semibold text-black">

                            Ngày nhận phòng

                        </div>

                        <div>

                            {{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}

                        </div>

                        <div class="font-semibold text-black">

                            Ngày trả phòng

                        </div>

                        <div>

                            {{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}

                        </div>

                        <div class="font-semibold text-black">

                            Người lớn

                        </div>

                        <div>

                            {{ $datPhong->so_nguoi_truong_thanh }}

                        </div>

                        <div class="font-semibold  text-black">

                            Trẻ em

                        </div>

                        <div>

                            {{ $datPhong->so_tre_em }}

                        </div>

                        <div class="font-semibold  text-black">

                            Người cao tuổi

                        </div>

                        <div>

                            {{ $datPhong->so_nguoi_cao_tuoi }}

                        </div>

                    </div>

                </div>

                {{-- THANH TOÁN --}}
                <div class="px-8 py-8 border-b border-slate-200">

                    <h2 class="text-2xl font-bold text-slate-800 mb-6">

                        Thanh toán

                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] gap-y-5">

                        {{-- Phương thức --}}
                        <div class="font-semibold text-black">

                            Phương thức

                        </div>

                        <div>

                            @if($datPhong->thanhToan->phuong_thuc_thanh_toan == 'TienMat')

                            Thanh toán tại khách sạn

                            @elseif($datPhong->thanhToan->phuong_thuc_thanh_toan == 'VNPay')

                            Thanh toán qua VNPay

                            @else

                            {{ $datPhong->thanhToan->phuong_thuc_thanh_toan }}

                            @endif

                        </div>

                        {{-- Trạng thái thanh toán --}}
                        <div class="font-semibold text-slate-600">

                            Trạng thái thanh toán

                        </div>

                        <div>

                            @if($datPhong->thanhToan->trang_thai_thanh_toan == 'ChuaThanhToan')

                            <span class="px-3 py-1 rounded-full text-black text-sm font-semibold">

                                Chưa thanh toán

                            </span>

                            @elseif($datPhong->thanhToan->trang_thai_thanh_toan == 'DaThanhToan')

                            <span class="px-3 py-1 rounded-full text-black text-sm font-semibold">

                                Đã thanh toán

                            </span>

                            @endif

                        </div>

                        {{-- Trạng thái đơn --}}
                        <div class="font-semibold text-black">

                            Trạng thái đơn

                        </div>

                        <div>

                            @if($datPhong->trang_thai_dat_phong == 'ChoXacNhan')

                            <span class="px-3 py-1 rounded-full text-black text-sm font-semibold">

                                Chờ xác nhận

                            </span>

                            @elseif($datPhong->trang_thai_dat_phong == 'DaXacNhan')

                            <span class="px-3 py-1 rounded-full text-black text-sm font-semibold">

                                Đã xác nhận

                            </span>

                            @elseif($datPhong->trang_thai_dat_phong == 'DaNhanPhong')

                            <span class="px-3 py-1 rounded-full text-black text-sm font-semibold">

                                Đã nhận phòng

                            </span>

                            @elseif($datPhong->trang_thai_dat_phong == 'DaTraPhong')

                            <span class="px-3 py-1 rounded-full text-black text-sm font-semibold">

                                Đã trả phòng

                            </span>

                            @elseif($datPhong->trang_thai_dat_phong == 'DaHuy')

                            <span class="px-3 py-1 rounded-full text-black text-sm font-semibold">

                                Đã hủy

                            </span>

                            @endif

                        </div>

                    </div>

                </div>

                {{-- TỔNG THANH TOÁN --}}
                <div class="px-8 py-8 border-b border-slate-200">

                    <div class="flex items-center justify-between">

                        <span class="text-2xl font-bold text-slate-800">

                            Tổng thanh toán

                        </span>

                        <span class="text-2xl font-bold text-blue-600">

                            {{ number_format($datPhong->tong_tien,0,',','.') }}đ

                        </span>

                    </div>

                </div>

                {{-- NÚT CHỨC NĂNG --}}
                <div class="px-8 py-8">

                    <div class="flex flex-col md:flex-row gap-4">

                        <a href="{{ route('users.index') }}"
                            class="flex-1 text-center bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-semibold transition">

                            Về trang chủ

                        </a>

                        <a href="#"
                            class="flex-1 text-center border border-blue-600 text-blue-600 hover:bg-blue-50 py-4 rounded-xl font-semibold transition">

                            <i class="fa-solid fa-clock-rotate-left mr-2"></i>

                            Lịch sử đặt phòng

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </main>

    @include('components.footer')

</body>

</html>