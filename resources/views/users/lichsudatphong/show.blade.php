<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chi tiết đơn đặt phòng</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100">

    @include('components.navbar')

    <main class="pt-24 pb-16">

        <div class="max-w-4xl mx-auto px-4">

            <div class="bg-white rounded-3xl shadow border border-slate-200 overflow-hidden">

                {{-- Tiêu đề --}}
                <div class="px-8 py-6 border-b border-slate-200">

                    <h1 class="text-3xl font-bold text-center text-slate-800">

                        Chi tiết đơn đặt phòng

                    </h1>

                </div>

                {{-- Thông tin --}}
                <div class="divide-y divide-slate-200">

                    {{-- Mã đơn --}}
                    <div class="grid grid-cols-1 md:grid-cols-[240px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Mã đơn đặt phòng

                        </div>

                        <div class="px-6 py-4">

                            {{ $datPhong->ma_dat_phong }}

                        </div>

                    </div>

                    {{-- Khách sạn --}}
                    <div class="grid grid-cols-1 md:grid-cols-[240px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Khách sạn

                        </div>

                        <div class="px-6 py-4">

                            {{ $datPhong->khachSan->ten_khach_san }}

                        </div>

                    </div>

                    {{-- Địa chỉ --}}
                    <div class="grid grid-cols-1 md:grid-cols-[240px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Địa chỉ

                        </div>

                        <div class="px-6 py-4">

                            {{ $datPhong->khachSan->dia_chi }}

                        </div>

                    </div>

                    {{-- Số điện thoại --}}
                    <div class="grid grid-cols-1 md:grid-cols-[240px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Số điện thoại khách sạn

                        </div>

                        <div class="px-6 py-4">

                            {{ $datPhong->khachSan->so_dien_thoai }}

                        </div>

                    </div>

                    {{-- Ngày đặt --}}
                    <div class="grid grid-cols-1 md:grid-cols-[240px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Ngày đặt

                        </div>

                        <div class="px-6 py-4">

                            {{ \Carbon\Carbon::parse($datPhong->ngay_dat)->format('d/m/Y H:i') }}

                        </div>

                    </div>

                    {{-- Ngày nhận phòng --}}
                    <div class="grid grid-cols-1 md:grid-cols-[240px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Ngày nhận phòng

                        </div>

                        <div class="px-6 py-4">

                            {{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}

                        </div>

                    </div>

                    {{-- Ngày trả phòng --}}
                    <div class="grid grid-cols-1 md:grid-cols-[240px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Ngày trả phòng

                        </div>

                        <div class="px-6 py-4">

                            {{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}

                        </div>

                    </div>
                    {{-- Loại phòng --}}
                    <div class="grid grid-cols-1 md:grid-cols-[240px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Loại phòng

                        </div>

                        <div class="px-6 py-4">

                            @foreach($datPhong->chiTietDatPhong as $chiTiet)

                            <div class="flex justify-between py-1">

                                <span>

                                    {{ $chiTiet->loaiPhong->ten_loai_phong ?? 'Không xác định' }}

                                </span>

                                <span>

                                    x {{ $chiTiet->so_luong_phong }}

                                </span>

                            </div>

                            @endforeach

                        </div>

                    </div>

                    {{-- Số khách --}}
                    <div class="grid grid-cols-1 md:grid-cols-[240px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Số khách

                        </div>

                        <div class="px-6 py-4">

                            {{ $datPhong->so_nguoi_truong_thanh }} Người lớn

                            @if($datPhong->so_tre_em)

                            - {{ $datPhong->so_tre_em }} Trẻ em

                            @endif

                            @if($datPhong->so_nguoi_cao_tuoi)

                            - {{ $datPhong->so_nguoi_cao_tuoi }} Người cao tuổi

                            @endif

                        </div>

                    </div>

                    {{-- Phương thức thanh toán --}}
                    <div class="grid grid-cols-1 md:grid-cols-[240px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Phương thức thanh toán

                        </div>

                        <div class="px-6 py-4">

                            @if($datPhong->thanhToan)

                            @if($datPhong->thanhToan->phuong_thuc_thanh_toan == 'VNPAY')

                            VNPay

                            @else

                            Thanh toán tại khách sạn

                            @endif

                            @else

                            Thanh toán tại khách sạn

                            @endif

                        </div>

                    </div>

                    {{-- Tổng tiền --}}
                    <div class="grid grid-cols-1 md:grid-cols-[240px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Tổng tiền

                        </div>

                        <div class="px-6 py-4 text-blue-600 font-bold text-xl">

                            {{ number_format($datPhong->tong_tien,0,',','.') }}đ

                        </div>

                    </div>

                    {{-- Trạng thái --}}
                    <div class="grid grid-cols-1 md:grid-cols-[240px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Trạng thái

                        </div>

                        <div class="px-6 py-4">

                            @if($datPhong->trang_thai_dat_phong == 'ChoXacNhan')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-semibold">

                                Chờ xác nhận

                            </span>

                            @elseif($datPhong->trang_thai_dat_phong == 'DaXacNhan')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold">

                                Đã xác nhận

                            </span>

                            @elseif($datPhong->trang_thai_dat_phong == 'DaNhanPhong')

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold">

                                Đã nhận phòng

                            </span>

                            @elseif($datPhong->trang_thai_dat_phong == 'DaTraPhong')

                            <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full font-semibold">

                                Đã trả phòng

                            </span>

                            @elseif($datPhong->trang_thai_dat_phong == 'DaHuy')

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full font-semibold">

                                Đã hủy

                            </span>

                            @else

                            <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full font-semibold">

                                Không đến nhận phòng

                            </span>

                            @endif

                        </div>

                    </div>

                    {{-- Ghi chú --}}
                    @if($datPhong->ghi_chu)

                    <div class="grid grid-cols-1 md:grid-cols-[240px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Ghi chú

                        </div>

                        <div class="px-6 py-4 whitespace-pre-line">

                            {{ $datPhong->ghi_chu }}

                        </div>

                    </div>

                    @endif
                </div>

                {{-- Nút --}}
                <div class="px-8 py-8 border-t border-slate-200">

                    <div class="flex justify-center">

                        <a href="{{ route('lichsudatphong.index') }}" class="inline-flex items-center gap-2
                                   bg-blue-600 hover:bg-blue-700
                                   text-white font-semibold
                                   px-8 py-3 rounded-xl
                                   transition duration-300">

                            <i class="fa-solid fa-arrow-left"></i>

                            Quay lại lịch sử đặt phòng

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </main>

    @include('components.footer')

</body>

</html>