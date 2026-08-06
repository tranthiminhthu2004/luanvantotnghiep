<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[1400px] border-collapse">

            <thead class="bg-slate-50">

                <tr class="text-left whitespace-nowrap">

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Mã đơn
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Khách hàng
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Khách sạn
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Ngày nhận
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Ngày trả
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Tổng tiền
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Trạng thái
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-center text-black">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($datPhongs as $datPhong)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- Mã đơn -->
                    <td class="px-4 py-4 font-semibold text-[#061755]">

                        {{ $datPhong->ma_dat_phong }}

                    </td>

                    <!-- Khách hàng -->
                    <td class="px-4 py-4">

                        <div class="max-w-[240px]">

                            <div class="text-base font-medium text-black">

                                {{ $datPhong->ho_va_ten_dem_khach }}
                                {{ $datPhong->ten_khach }}

                            </div>

                            <div class="text-sm text-gray-500 mt-1 truncate">

                                {{ $datPhong->email_khach }}

                            </div>

                        </div>

                    </td>

                    <!-- Khách sạn -->
                    <td class="px-4 py-4">

                        <div class="max-w-[220px] truncate text-base text-black">

                            {{ $datPhong->khachSan->ten_khach_san ?? '-' }}

                        </div>

                    </td>

                    <!-- Ngày nhận -->
                    <td class="px-4 py-4 text-base text-black whitespace-nowrap">

                        {{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}

                    </td>

                    <!-- Ngày trả -->
                    <td class="px-4 py-4 text-base text-black whitespace-nowrap">

                        {{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}

                    </td>

                    <!-- Tổng tiền -->
                    <td class="px-4 py-4 font-semibold text-[#061755] whitespace-nowrap">

                        {{ number_format($datPhong->tong_tien,0,',','.') }} đ

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-4 py-4">

                        <form action="{{ route('admin.datphong.trangthai',$datPhong->ma_don_dat_phong) }}"
                            method="POST">

                            @csrf
                            @method('PUT')

                            <select name="trang_thai_dat_phong" onchange="this.form.submit()" class="px-3 py-2 rounded-full text-sm font-medium border-0 cursor-pointer

    @if($datPhong->trang_thai_dat_phong == 'ChoThanhToan')
        bg-orange-100 text-orange-700
    @elseif($datPhong->trang_thai_dat_phong == 'DaXacNhan')
        bg-green-100 text-green-700
    @elseif($datPhong->trang_thai_dat_phong == 'DaNhanPhong')
        bg-blue-100 text-blue-700
    @elseif($datPhong->trang_thai_dat_phong == 'DaTraPhong')
        bg-indigo-100 text-indigo-700
    @elseif($datPhong->trang_thai_dat_phong == 'DaHuy')
        bg-red-100 text-red-700
    @elseif($datPhong->trang_thai_dat_phong == 'KhongDen')
        bg-orange-100 text-orange-700
    @endif
    " @if(in_array($datPhong->trang_thai_dat_phong,[
                                'DaTraPhong',
                                'DaHuy',
                                'KhongDen'
                                ]))
                                disabled
                                @endif
                                >
                                @if($datPhong->trang_thai_dat_phong == 'ChoThanhToan')

                                <option value="ChoThanhToan" selected>
                                Chờ thanh toán
                                </option>

                                <option value="DaXacNhan">
                                Đã xác nhận
                                </option>
                                @endif
                                @if($datPhong->trang_thai_dat_phong == 'DaXacNhan')
                                <option value="DaXacNhan" selected>Đã xác nhận</option>
                                <option value="DaNhanPhong">Đã nhận phòng</option>
                                <option value="DaHuy">Đã hủy</option>
                                <option value="KhongDen">Không đến</option>
                                @endif

                                @if($datPhong->trang_thai_dat_phong == 'DaNhanPhong')
                                <option value="DaNhanPhong" selected>Đã nhận phòng</option>
                                <option value="DaTraPhong">Đã trả phòng</option>
                                @endif

                                @if($datPhong->trang_thai_dat_phong == 'DaTraPhong')
                                <option value="DaTraPhong" selected>Đã trả phòng</option>
                                @endif

                                @if($datPhong->trang_thai_dat_phong == 'DaHuy')
                                <option value="DaHuy" selected>Đã hủy</option>
                                @endif

                                @if($datPhong->trang_thai_dat_phong == 'KhongDen')
                                <option value="KhongDen" selected>Không đến</option>
                                @endif

                            </select>

                        </form>

                    </td>

                    <!-- Thao tác -->
                    <td class="px-4 py-4">

                        <div class="flex items-center justify-center gap-4 whitespace-nowrap">

                            <a href="{{ route('admin.datphong.show',$datPhong->ma_don_dat_phong) }}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 flex items-center justify-center transition"
                                title="Chi tiết">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <a href="{{ route('admin.datphong.edit',$datPhong->ma_don_dat_phong) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-200 flex items-center justify-center transition"
                                title="Chỉnh sửa">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <form action="{{ route('admin.datphong.destroy',$datPhong->ma_don_dat_phong) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa đơn đặt phòng này?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="w-8 h-8 rounded-full bg-red-100 text-red-600 hover:bg-red-200 flex items-center justify-center transition"
                                    title="Xóa">

                                    <i class="fa-solid fa-trash text-xs"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8" class="py-12 text-center text-base text-gray-500">

                        Chưa có đơn đặt phòng nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($datPhongs->hasPages())

    <div class="border-t px-4 py-4">

        <div class="flex justify-center">

            {{ $datPhongs->links() }}

        </div>

    </div>

    @endif

</div>