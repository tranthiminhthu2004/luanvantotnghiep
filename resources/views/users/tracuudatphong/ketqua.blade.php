@php

$hinhAnh = $datPhong->khachSan->hinhAnh->first();

@endphp

<section class="py-10 bg-gray-100">

    <div class="max-w-7xl mx-auto px-4">

        <div class="mb-8">

            <h2 class="text-4xl font-bold text-[#061755]">

                Kết quả tra cứu đơn đặt phòng

            </h2>


        </div>

        <!-- Thông tin khách sạn -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-200">

            <div class="px-6 py-5 border-b">

                <h3 class="text-3xl font-bold text-[#061755]">

                    Thông tin khách sạn

                </h3>

            </div>

            <div class="p-6">

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                    <!-- Ảnh -->
                    <div class="lg:col-span-3">

                        @if($hinhAnh)

                        <img src="{{ asset($hinhAnh->duong_dan_anh) }}"
                            class="w-full h-60 rounded-2xl object-cover shadow">

                        @else

                        <img src="{{ asset('images/no-image.jpg') }}"
                            class="w-full h-60 rounded-2xl object-cover shadow">

                        @endif

                    </div>

                    <!-- Nội dung -->
                    <div class="lg:col-span-9">

                        <div class="flex justify-between items-start flex-wrap gap-4">

                            <div>

                                <h2 class="text-3xl font-bold text-gray-800">

                                    {{ $datPhong->khachSan->ten_khach_san }}

                                </h2>

                                <div class="mt-2">

                                    @for($i = 1; $i <= $datPhong->khachSan->so_sao_khach_san; $i++)

                                        <i class="fa-solid fa-star text-yellow-400"></i>

                                        @endfor

                                </div>

                            </div>

                            <div>

                                @switch($datPhong->trang_thai_dat_phong)

                                @case('DaXacNhan')

                                <span class="px-5 py-2 rounded-full bg-green-100 text-green-700 font-semibold">

                                    <i class="fa-solid fa-circle-check mr-2"></i>

                                    Đã xác nhận

                                </span>

                                @break

                                @case('ChoXacNhan')

                                <span class="px-5 py-2 rounded-full bg-yellow-100 text-yellow-700 font-semibold">

                                    <i class="fa-solid fa-clock mr-2"></i>

                                    Chờ xác nhận

                                </span>

                                @break

                                @case('DaHuy')

                                <span class="px-5 py-2 rounded-full bg-red-100 text-red-700 font-semibold">

                                    <i class="fa-solid fa-circle-xmark mr-2"></i>

                                    Đã hủy

                                </span>

                                @break

                                @default

                                <span class="px-5 py-2 rounded-full bg-gray-100 text-gray-700 font-semibold">

                                    {{ $datPhong->trang_thai_dat_phong }}

                                </span>

                                @endswitch

                            </div>

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-5 mt-8">

                            <div class="flex">

                                <i class="fa-solid fa-location-dot text-[#1040C5] mt-1 mr-3"></i>

                                <div>

                                    <p class="text-gray-500">

                                        Địa chỉ

                                    </p>

                                    <p class="font-medium">

                                        {{ $datPhong->khachSan->dia_chi }}

                                    </p>

                                </div>

                            </div>

                            <div class="flex">

                                <i class="fa-solid fa-phone text-[#1040C5] mt-1 mr-3"></i>

                                <div>

                                    <p class="text-gray-500">

                                        Số điện thoại

                                    </p>

                                    <p class="font-medium">

                                        {{ $datPhong->khachSan->so_dien_thoai }}

                                    </p>

                                </div>

                            </div>

                            <div class="flex">

                                <i class="fa-solid fa-envelope text-[#1040C5] mt-1 mr-3"></i>

                                <div>

                                    <p class="text-gray-500">

                                        Email

                                    </p>

                                    <p class="font-medium">

                                        {{ $datPhong->khachSan->email }}

                                    </p>

                                </div>

                            </div>

                            <div class="flex">

                                <i class="fa-solid fa-receipt text-[#1040C5] mt-1 mr-3"></i>

                                <div>

                                    <p class="text-gray-500">

                                        Mã đặt phòng

                                    </p>

                                    <p class="font-semibold text-[#1040C5]">

                                        {{ $datPhong->ma_dat_phong }}

                                    </p>

                                </div>

                            </div>

                            <div class="flex">

                                <i class="fa-solid fa-door-open text-[#1040C5] mt-1 mr-3"></i>

                                <div>

                                    <p class="text-gray-500">

                                        Check-in

                                    </p>

                                    <p class="font-medium">

                                        {{ $datPhong->khachSan->gio_check_in }}

                                    </p>

                                </div>

                            </div>

                            <div class="flex">

                                <i class="fa-solid fa-door-closed text-[#1040C5] mt-1 mr-3"></i>

                                <div>

                                    <p class="text-gray-500">

                                        Check-out

                                    </p>

                                    <p class="font-medium">

                                        {{ $datPhong->khachSan->gio_check_out }}

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

                    <!-- Thông tin khách hàng -->
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm">

                        <div class="px-6 py-5 border-b">

                            <h3 class="text-3xl font-bold text-[#061755]">


                                Thông tin khách hàng

                            </h3>

                        </div>

                        <div class="p-6">

                            <div class="space-y-5">

                                <div class="grid grid-cols-12">

                                    <div class="col-span-4 text-gray-500">

                                        Họ và tên

                                    </div>

                                    <div class="col-span-8 font-medium">

                                        {{ $datPhong->ho_va_ten_dem_khach }}
                                        {{ $datPhong->ten_khach }}

                                    </div>

                                </div>

                                <div class="grid grid-cols-12">

                                    <div class="col-span-4 text-gray-500">

                                        Số điện thoại

                                    </div>

                                    <div class="col-span-8 font-medium">

                                        {{ $datPhong->so_dien_thoai_khach }}

                                    </div>

                                </div>

                                <div class="grid grid-cols-12">

                                    <div class="col-span-4 text-gray-500">

                                        Email

                                    </div>

                                    <div class="col-span-8 font-medium break-all">

                                        {{ $datPhong->email_khach }}

                                    </div>

                                </div>

                                <div class="grid grid-cols-12">

                                    <div class="col-span-4 text-gray-500">

                                        Ghi chú

                                    </div>

                                    <div class="col-span-8 font-medium">

                                        {{ $datPhong->ghi_chu ?: 'Không có ghi chú' }}

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Thông tin đặt phòng -->
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm">

                        <div class="px-6 py-5 border-b">

                            <h3 class="text-3xl font-bold text-[#061755]">


                                Thông tin đặt phòng

                            </h3>

                        </div>

                        <div class="p-6">

                            <div class="space-y-5">

                                <div class="grid grid-cols-12">

                                    <div class="col-span-5 text-gray-500">

                                        Ngày nhận phòng

                                    </div>

                                    <div class="col-span-7 font-medium">

                                        {{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}

                                    </div>

                                </div>

                                <div class="grid grid-cols-12">

                                    <div class="col-span-5 text-gray-500">

                                        Ngày trả phòng

                                    </div>

                                    <div class="col-span-7 font-medium">

                                        {{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}

                                    </div>

                                </div>

                                <div class="grid grid-cols-12">

                                    <div class="col-span-5 text-gray-500">

                                        Người lớn

                                    </div>

                                    <div class="col-span-7 font-medium">

                                        {{ $datPhong->so_nguoi_truong_thanh }}

                                    </div>

                                </div>

                                <div class="grid grid-cols-12">

                                    <div class="col-span-5 text-gray-500">

                                        Trẻ em

                                    </div>

                                    <div class="col-span-7 font-medium">

                                        {{ $datPhong->so_tre_em }}

                                    </div>

                                </div>

                                <div class="grid grid-cols-12">

                                    <div class="col-span-5 text-gray-500">

                                        Người cao tuổi

                                    </div>

                                    <div class="col-span-7 font-medium">

                                        {{ $datPhong->so_nguoi_cao_tuoi }}

                                    </div>

                                </div>

                                <div class="grid grid-cols-12">

                                    <div class="col-span-5 text-gray-500">

                                        Ngày đặt

                                    </div>

                                    <div class="col-span-7 font-medium">

                                        {{ \Carbon\Carbon::parse($datPhong->ngay_dat)->format('d/m/Y H:i') }}

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- Loại phòng đã đặt -->
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm mt-8">

                    <div class="px-6 py-5 border-b">

                        <h3 class="text-3xl font-bold text-[#061755]">


                            Loại phòng đã đặt

                        </h3>

                    </div>

                    <div class="p-6 overflow-x-auto">

                        <table class="w-full border border-gray-200 rounded-xl overflow-hidden">

                            <thead class="bg-gray-50">

                                <tr>

                                    <th class="text-left px-6 py-4 font-semibold text-gray-700">

                                        Loại phòng

                                    </th>

                                    <th class="text-center px-6 py-4 font-semibold text-gray-700">

                                        Số lượng

                                    </th>

                                    <th class="text-center px-6 py-4 font-semibold text-gray-700">

                                        Số đêm

                                    </th>

                                    <th class="text-right px-6 py-4 font-semibold text-gray-700">

                                        Giá / đêm

                                    </th>

                                    <th class="text-right px-6 py-4 font-semibold text-gray-700">

                                        Thành tiền

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach($datPhong->chiTietDatPhong as $chiTiet)

                                <tr class="border-t hover:bg-gray-50 transition">

                                    <td class="px-6 py-5">

                                        <div>

                                            <p class="font-semibold text-gray-800">

                                                {{ $chiTiet->loaiPhong->ten_loai_phong }}

                                            </p>

                                        </div>

                                    </td>

                                    <td class="text-center px-6 py-5">

                                        {{ $chiTiet->so_luong_phong }}

                                    </td>

                                    <td class="text-center px-6 py-5">

                                        {{ $chiTiet->so_dem }}

                                    </td>

                                    <td class="text-right px-6 py-5">

                                        {{ number_format($chiTiet->gia_dat_thuc_te,0,',','.') }}
                                        đ

                                    </td>

                                    <td class="text-right px-6 py-5">

                                        <span class="font-bold text-[#1040C5] text-lg">

                                            {{ number_format($chiTiet->thanh_tien,0,',','.') }}
                                            đ

                                        </span>

                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>
                @php

                $thanhToan = $datPhong->thanhToans->last();

                $daThanhToan = $datPhong->thanhToans->sum('so_tien');

                $conLai = max($datPhong->tong_tien - $daThanhToan, 0);

                @endphp

                <!-- Thanh toán -->
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm mt-8">

                    <div class="px-6 py-5 border-b">

                        <h3 class="text-3xl font-bold text-[#061755]">

                            Thông tin thanh toán

                        </h3>

                    </div>

                    <div class="p-6">

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                            <!-- Cột trái -->
                            <div class="space-y-5">

                                <div class="flex justify-between">

                                    <span class="text-gray-500">

                                        Loại thanh toán

                                    </span>

                                    <span class="font-semibold">

                                        {{ $thanhToan?->loai_thanh_toan ?? '-' }}

                                    </span>

                                </div>

                                <div class="flex justify-between">

                                    <span class="text-gray-500">

                                        Phương thức

                                    </span>

                                    <span class="font-semibold">

                                        {{ $thanhToan?->phuong_thuc_thanh_toan ?? '-' }}

                                    </span>

                                </div>

                            </div>

                            <!-- Cột phải -->
                            <div class="space-y-5">

                                <div class="flex justify-between">

                                    <span class="text-gray-500">

                                        Trạng thái

                                    </span>

                                    <span class="font-semibold">

                                        {{ $thanhToan?->trang_thai_thanh_toan ?? '-' }}

                                    </span>

                                </div>

                                <div class="flex justify-between">

                                    <span class="text-gray-500">

                                        Ngày thanh toán

                                    </span>

                                    <span class="font-semibold">

                                        {{ $thanhToan?->ngay_thanh_toan
                                            ? \Carbon\Carbon::parse($thanhToan->ngay_thanh_toan)->format('d/m/Y H:i')
                                            : '-' }}

                                    </span>

                                </div>

                            </div>

                        </div>

                        <hr class="my-8">

                        <!-- Tổng tiền -->
                        <div class="space-y-4">

                            <div class="flex justify-between text-lg">

                                <span>

                                    Tổng tiền phòng

                                </span>

                                <span class="font-bold">

                                    {{ number_format($datPhong->tong_tien,0,',','.') }} đ

                                </span>

                            </div>

                            <div class="flex justify-between text-lg">

                                <span>

                                    Đã thanh toán

                                </span>

                                <span class="font-bold text-green-600">

                                    {{ number_format($daThanhToan,0,',','.') }} đ

                                </span>

                            </div>

                            <div class="flex justify-between text-xl border-t pt-5">

                                <span class="font-bold">

                                    Còn phải thanh toán

                                </span>

                                <span class="font-bold text-red-600">

                                    {{ number_format($conLai,0,',','.') }} đ

                                </span>

                            </div>

                        </div>

                        <div class="flex justify-end gap-4 mt-10">

                            @if($datPhong->trang_thai_dat_phong != 'DaHuy')

                            <form action="{{ route('tracuudatphong.huy', $datPhong->ma_dat_phong) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn đặt phòng này?')">

                                @csrf

                                <button type="submit"
                                    class="px-8 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white transition">

                                    Hủy đặt phòng

                                </button>

                            </form>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>