@extends('admin.trangchinh.admin')

@section('title','Sửa đơn đặt phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <form action="{{ route('admin.datphong.update',$datPhong->ma_don_dat_phong) }}" method="POST">

        @csrf
        @method('PUT')

        @if ($errors->any())

        <div class="bg-red-100 border border-red-300 text-red-700 rounded-xl p-4 mb-6">

            <ul class="list-disc ml-5">

                @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

        @endif

        <!-- Tiêu đề -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">

            <h2 class="text-3xl font-bold text-[#061755]">

                Sửa đơn đặt phòng

            </h2>

            <p class="text-gray-500 mt-2">

                Cập nhật thông tin khách hàng của đơn đặt phòng.

            </p>

        </div>

        <!-- Thông tin đơn -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">

            <h3 class="text-xl font-bold text-black mb-6">

                Thông tin đơn đặt phòng

            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <label class="block text-sm font-semibold text-black">

                        Mã đặt phòng

                    </label>

                    <input type="text" value="{{ $datPhong->ma_dat_phong }}" readonly
                        class="w-full mt-2 border rounded-xl px-4 py-3 bg-slate-100 text-black">

                </div>

                <div>

                    <label class="block text-sm font-semibold text-black">

                        Khách sạn

                    </label>

                    <input type="text" value="{{ $datPhong->khachSan->ten_khach_san }}" readonly
                        class="w-full mt-2 border rounded-xl px-4 py-3 bg-slate-100 text-black">

                </div>

                <div>

                    <label class="block text-sm font-semibold text-black">

                        Trạng thái

                    </label>

                    <input type="text" value="@switch($datPhong->trang_thai_dat_phong)
    @case('DaXacNhan')
        Đã xác nhận
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

    @case('KhongDen')
        Không đến
        @break

    @default
        Không xác định
@endswitch" readonly class="w-full mt-2 border rounded-xl px-4 py-3 bg-slate-100 text-black">

                </div>

                <div>

                    <label class="block text-sm font-semibold text-black">

                        Tổng tiền

                    </label>

                    <input type="text" value="{{ number_format($datPhong->tong_tien,0,',','.') }}đ" readonly
                        class="w-full mt-2 border rounded-xl px-4 py-3 bg-slate-100 text-blue-600 font-semibold">

                </div>

            </div>

        </div>

        <!-- Thông tin lưu trú -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">

            <h3 class="text-xl font-bold text-black mb-6">

                Thông tin lưu trú

            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div>

                    <label class="block text-sm font-semibold text-black">

                        Ngày nhận phòng

                    </label>

                    <input type="text" value="{{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}"
                        readonly class="w-full mt-2 border rounded-xl px-4 py-3 bg-slate-100 text-black">

                </div>

                <div>

                    <label class="block text-sm font-semibold text-black">

                        Ngày trả phòng

                    </label>

                    <input type="text" value="{{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}"
                        readonly class="w-full mt-2 border rounded-xl px-4 py-3 bg-slate-100 text-black">

                </div>

                <div>

                    <label class="block text-sm font-semibold text-black">

                        Số đêm

                    </label>

                    <input type="text"
                        value="{{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->diffInDays(\Carbon\Carbon::parse($datPhong->ngay_tra_phong)) }}"
                        readonly class="w-full mt-2 border rounded-xl px-4 py-3 bg-slate-100 text-black">

                </div>

                <div>

                    <label class="block text-sm font-semibold text-black">

                        Người lớn

                    </label>

                    <input type="text" value="{{ $datPhong->so_nguoi_truong_thanh }}" readonly
                        class="w-full mt-2 border rounded-xl px-4 py-3 bg-slate-100 text-black">

                </div>

                <div>

                    <label class="block text-sm font-semibold text-black">

                        Trẻ em

                    </label>

                    <input type="text" value="{{ $datPhong->so_tre_em }}" readonly
                        class="w-full mt-2 border rounded-xl px-4 py-3 bg-slate-100 text-black">

                </div>

                <div>

                    <label class="block text-sm font-semibold text-black">

                        Người cao tuổi

                    </label>

                    <input type="text" value="{{ $datPhong->so_nguoi_cao_tuoi }}" readonly
                        class="w-full mt-2 border rounded-xl px-4 py-3 bg-slate-100 text-black">

                </div>

            </div>

        </div> <!-- Thông tin khách hàng -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">

            <h3 class="text-xl font-bold text-black mb-6">

                Thông tin khách hàng

            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Họ và tên đệm -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Họ và tên đệm

                    </label>

                    <input type="text" name="ho_va_ten_dem_khach"
                        value="{{ old('ho_va_ten_dem_khach',$datPhong->ho_va_ten_dem_khach) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-black focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    @error('ho_va_ten_dem_khach')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Tên -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Tên <span class="text-red-500">*</span>

                    </label>

                    <input type="text" name="ten_khach" value="{{ old('ten_khach',$datPhong->ten_khach) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-black focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    @error('ten_khach')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Email -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Email <span class="text-red-500">*</span>

                    </label>

                    <input type="email" name="email_khach" value="{{ old('email_khach',$datPhong->email_khach) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-black focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    @error('email_khach')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Số điện thoại -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Số điện thoại <span class="text-red-500">*</span>

                    </label>

                    <input type="text" name="so_dien_thoai_khach"
                        value="{{ old('so_dien_thoai_khach',$datPhong->so_dien_thoai_khach) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-black focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    @error('so_dien_thoai_khach')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

            </div>

        </div>

        <!-- Ghi chú -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">

            <h3 class="text-xl font-bold text-black mb-6">

                Ghi chú

            </h3>

            <textarea name="ghi_chu" rows="5" maxlength="500"
                placeholder="Ví dụ: Phòng tầng cao, thêm nôi em bé, gần thang máy..."
                class="w-full border rounded-xl px-4 py-3 text-black resize-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('ghi_chu',$datPhong->ghi_chu) }}</textarea>

            <div class="flex justify-between mt-2">

                @error('ghi_chu')

                <p class="text-red-500 text-sm">

                    {{ $message }}

                </p>

                @else

                <span></span>

                @enderror

                <span class="text-gray-400 text-sm">

                    Tối đa 500 ký tự

                </span>

            </div>

        </div>
        <!-- Chi tiết loại phòng -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

            <div class="p-6 border-b">

                <h3 class="text-xl font-bold text-black">

                    Chi tiết loại phòng đã đặt

                </h3>

            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-black">

                                Loại phòng

                            </th>

                            <th class="px-6 py-4 text-center text-sm font-semibold text-black">

                                Số lượng

                            </th>

                            <th class="px-6 py-4 text-right text-sm font-semibold text-black">

                                Giá đặt

                            </th>

                            <th class="px-6 py-4 text-center text-sm font-semibold text-black">

                                Số đêm

                            </th>

                            <th class="px-6 py-4 text-right text-sm font-semibold text-black">

                                Thành tiền

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($datPhong->chiTietDatPhong as $chiTiet)

                        <tr class="border-t hover:bg-slate-50">

                            <td class="px-6 py-4 text-black">

                                {{ $chiTiet->loaiPhong->ten_loai_phong }}

                            </td>

                            <td class="px-6 py-4 text-center text-black">

                                {{ $chiTiet->so_luong_phong }}

                            </td>

                            <td class="px-6 py-4 text-right text-black">

                                {{ number_format($chiTiet->gia_dat_thuc_te,0,',','.') }}đ

                            </td>

                            <td class="px-6 py-4 text-center text-black">

                                {{ $chiTiet->so_dem }}

                            </td>

                            <td class="px-6 py-4 text-right font-semibold text-blue-600">

                                {{ number_format($chiTiet->thanh_tien,0,',','.') }}đ

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Nút -->
        <div class="flex flex-wrap gap-4 mt-8">

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-full transition">

                <i class="fa-solid fa-floppy-disk mr-2"></i>

                Cập nhật đơn đặt phòng

            </button>

            <a href="{{ route('admin.datphong.index') }}"
                class="bg-slate-200 hover:bg-slate-300 text-black font-semibold px-6 py-3 rounded-full transition">

                <i class="fa-solid fa-arrow-left mr-2"></i>

                Quay lại

            </a>

        </div>

    </form>

</div>

@endsection