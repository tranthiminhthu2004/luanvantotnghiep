@extends('admin.trangchinh.admin')

@section('title','Sửa đơn đặt phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <h2 class="text-4xl font-bold text-[#061755] mb-8">

            Sửa đơn đặt phòng

        </h2>

        <form action="{{ route('admin.datphong.update',$datPhong->ma_don_dat_phong) }}" method="POST">

            @csrf
            @method('PUT')

            <!-- Thông tin đơn -->
            <div class="bg-slate-50 rounded-2xl p-6 mb-6">

                <h3 class="text-xl font-bold mb-4">

                    Thông tin đơn đặt phòng

                </h3>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="font-medium">
                            Mã đặt phòng
                        </label>

                        <input type="text" value="{{ $datPhong->ma_dat_phong }}" disabled
                            class="w-full mt-2 border rounded-xl px-4 py-3 bg-white">

                    </div>

                    <div>

                        <label class="font-medium">
                            Khách sạn
                        </label>

                        <input type="text" value="{{ $datPhong->khachSan->ten_khach_san ?? '' }}" disabled
                            class="w-full mt-2 border rounded-xl px-4 py-3 bg-white">

                    </div>

                </div>

            </div>

            <!-- Thông tin lưu trú -->
            <div class="bg-slate-50 rounded-2xl p-6 mb-6">

                <h3 class="text-xl font-bold mb-4">

                    Thông tin lưu trú

                </h3>

                <div class="grid md:grid-cols-3 gap-6">

                    <div>

                        <label class="font-medium">
                            Ngày nhận phòng
                        </label>

                        <input type="text"
                            value="{{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}" disabled
                            class="w-full mt-2 border rounded-xl px-4 py-3 bg-white">

                    </div>

                    <div>

                        <label class="font-medium">
                            Ngày trả phòng
                        </label>

                        <input type="text"
                            value="{{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}" disabled
                            class="w-full mt-2 border rounded-xl px-4 py-3 bg-white">

                    </div>

                    <div>

                        <label class="font-medium">
                            Tổng tiền
                        </label>

                        <input type="text" value="{{ number_format($datPhong->tong_tien,0,',','.') }}đ" disabled
                            class="w-full mt-2 border rounded-xl px-4 py-3 bg-white">

                    </div>

                </div>

                <div class="grid md:grid-cols-3 gap-6 mt-6">

                    <div>

                        <label class="font-medium">
                            Người lớn
                        </label>

                        <input type="text" value="{{ $datPhong->so_nguoi_truong_thanh }}" disabled
                            class="w-full mt-2 border rounded-xl px-4 py-3 bg-white">

                    </div>

                    <div>

                        <label class="font-medium">
                            Trẻ em
                        </label>

                        <input type="text" value="{{ $datPhong->so_tre_em }}" disabled
                            class="w-full mt-2 border rounded-xl px-4 py-3 bg-white">

                    </div>

                    <div>

                        <label class="font-medium">
                            Người cao tuổi
                        </label>

                        <input type="text" value="{{ $datPhong->so_nguoi_cao_tuoi }}" disabled
                            class="w-full mt-2 border rounded-xl px-4 py-3 bg-white">

                    </div>

                </div>

            </div>

            <!-- Thông tin khách hàng -->
            <div class="bg-slate-50 rounded-2xl p-6 mb-6">

                <h3 class="text-xl font-bold mb-4">

                    Thông tin khách hàng

                </h3>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="font-medium">
                            Họ và tên đệm
                        </label>

                        <input type="text" name="ho_va_ten_dem_khach" value="{{ $datPhong->ho_va_ten_dem_khach }}"
                            class="w-full mt-2 border rounded-xl px-4 py-3">

                    </div>

                    <div>

                        <label class="font-medium">
                            Tên
                        </label>

                        <input type="text" name="ten_khach" value="{{ $datPhong->ten_khach }}"
                            class="w-full mt-2 border rounded-xl px-4 py-3">

                    </div>

                    <div>

                        <label class="font-medium">
                            Email
                        </label>

                        <input type="email" name="email_khach" value="{{ $datPhong->email_khach }}"
                            class="w-full mt-2 border rounded-xl px-4 py-3">

                    </div>

                    <div>

                        <label class="font-medium">
                            Số điện thoại
                        </label>

                        <input type="text" name="so_dien_thoai_khach" value="{{ $datPhong->so_dien_thoai_khach }}"
                            class="w-full mt-2 border rounded-xl px-4 py-3">

                    </div>

                </div>

            </div>

            <!-- Chi tiết phòng -->
            <div class="bg-slate-50 rounded-2xl p-6">

                <h3 class="text-xl font-bold mb-4">

                    Chi tiết loại phòng đã đặt

                </h3>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead>

                            <tr class="border-b">

                                <th class="text-left py-3">
                                    Loại phòng
                                </th>

                                <th class="text-left py-3">
                                    Số lượng
                                </th>

                                <th class="text-left py-3">
                                    Giá đặt
                                </th>

                                <th class="text-left py-3">
                                    Số đêm
                                </th>

                                <th class="text-left py-3">
                                    Thành tiền
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($datPhong->chiTietDatPhong as $chiTiet)

                            <tr class="border-b">

                                <td class="py-4">

                                    {{ $chiTiet->loaiPhong->ten_loai_phong ?? '' }}

                                </td>

                                <td>

                                    {{ $chiTiet->so_luong_phong }}

                                </td>

                                <td>

                                    {{ number_format($chiTiet->gia_dat_thuc_te,0,',','.') }}đ

                                </td>

                                <td>

                                    {{ $chiTiet->so_dem }}

                                </td>

                                <td class="font-bold text-blue-600">

                                    {{ number_format($chiTiet->thanh_tien,0,',','.') }}đ

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="mt-8 flex gap-4">

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                    Cập nhật

                </button>

                <a href="{{ route('admin.datphong.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection