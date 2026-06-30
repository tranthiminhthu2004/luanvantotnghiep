<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="min-w-[1400px] w-full">

            <thead class="bg-slate-50 text-black">

                <tr class="text-left text-sm tracking-wider">

                    <th class="px-6 py-4 font-semibold">
                        Mã đơn
                    </th>

                    <th class="px-6 py-4 font-semibold">
                        Khách hàng
                    </th>

                    <th class="px-6 py-4 font-semibold">
                        Số điện thoại
                    </th>

                    <th class="px-6 py-4 font-semibold">
                        Khách sạn
                    </th>

                    <th class="px-6 py-4 font-semibold">
                        Ngày nhận
                    </th>

                    <th class="px-6 py-4 font-semibold">
                        Ngày trả
                    </th>

                    <th class="px-6 py-4 font-semibold">
                        Tổng tiền
                    </th>

                    <th class="px-6 py-4 font-semibold">
                        Trạng thái
                    </th>

                    <th class="px-6 py-4 text-center font-semibold">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($datPhongs as $datPhong)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- Mã đơn -->
                    <td class="px-6 py-4 font-semibold text-blue-600">

                        {{ $datPhong->ma_dat_phong }}

                    </td>

                    <!-- Khách hàng -->
                    <td class="px-6 py-4">

                        <div class="font-medium text-black">

                            {{ $datPhong->ho_va_ten_dem_khach }}
                            {{ $datPhong->ten_khach }}

                        </div>

                        <div class="text-xs text-gray-500 mt-1">

                            {{ $datPhong->email_khach }}

                        </div>

                    </td>

                    <!-- Số điện thoại -->
                    <td class="px-6 py-4 text-sm">

                        {{ $datPhong->so_dien_thoai_khach }}

                    </td>

                    <!-- Khách sạn -->
                    <td class="px-6 py-4 text-sm">

                        {{ $datPhong->khachSan->ten_khach_san ?? '-' }}

                    </td>

                    <!-- Ngày nhận -->
                    <td class="px-6 py-4 text-sm">

                        {{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}

                    </td>

                    <!-- Ngày trả -->
                    <td class="px-6 py-4 text-sm">

                        {{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}

                    </td>

                    <!-- Tổng tiền -->
                    <td class="px-6 py-4 font-semibold text-blue-600 whitespace-nowrap">

                        {{ number_format($datPhong->tong_tien,0,',','.') }}đ

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-6 py-4">

                        <form action="{{ route('admin.datphong.trangthai',$datPhong->ma_don_dat_phong) }}"
                            method="POST">

                            @csrf
                            @method('PUT')

                            <select name="trang_thai_dat_phong" onchange="this.form.submit()" class="px-3 py-2 rounded-full text-sm font-medium border-0 cursor-pointer
    @if($datPhong->trang_thai_dat_phong == 'ChoXacNhan')
        bg-yellow-100 text-yellow-700
    @elseif($datPhong->trang_thai_dat_phong == 'DaXacNhan')
        bg-green-100 text-green-700
    @elseif($datPhong->trang_thai_dat_phong == 'DaNhanPhong')
        bg-blue-100 text-blue-700
    @elseif($datPhong->trang_thai_dat_phong == 'DaTraPhong')
        bg-indigo-100 text-indigo-700
    @elseif($datPhong->trang_thai_dat_phong == 'DaHuy')
        bg-red-100 text-red-700
    @elseif($datPhong->trang_thai_dat_phong == 'KhongDenNhanPhong')
        bg-orange-100 text-orange-700
    @endif" @if(in_array($datPhong->trang_thai_dat_phong,[
                                'DaTraPhong',
                                'DaHuy',
                                'KhongDenNhanPhong'
                                ]))
                                disabled
                                @endif
                                >

                                {{-- Chờ xác nhận --}}
                                @if($datPhong->trang_thai_dat_phong == 'ChoXacNhan')

                                <option value="ChoXacNhan" selected>
                                    Chờ xác nhận
                                </option>

                                <option value="DaXacNhan">
                                    Đã xác nhận
                                </option>

                                <option value="DaHuy">
                                    Đã hủy
                                </option>

                                @endif

                                {{-- Đã xác nhận --}}
                                @if($datPhong->trang_thai_dat_phong == 'DaXacNhan')

                                <option value="DaXacNhan" selected>
                                    Đã xác nhận
                                </option>

                                <option value="DaNhanPhong">
                                    Đã nhận phòng
                                </option>

                                <option value="DaHuy">
                                    Đã hủy
                                </option>

                                <option value="KhongDenNhanPhong">
                                    Không đến
                                </option>

                                @endif

                                {{-- Đã nhận phòng --}}
                                @if($datPhong->trang_thai_dat_phong == 'DaNhanPhong')

                                <option value="DaNhanPhong" selected>
                                    Đã nhận phòng
                                </option>

                                <option value="DaTraPhong">
                                    Đã trả phòng
                                </option>

                                @endif

                                {{-- Đã trả phòng --}}
                                @if($datPhong->trang_thai_dat_phong == 'DaTraPhong')

                                <option value="DaTraPhong" selected>
                                    Đã trả phòng
                                </option>

                                @endif

                                {{-- Đã hủy --}}
                                @if($datPhong->trang_thai_dat_phong == 'DaHuy')

                                <option value="DaHuy" selected>
                                    Đã hủy
                                </option>

                                @endif

                                {{-- Không đến nhận phòng --}}
                                @if($datPhong->trang_thai_dat_phong == 'KhongDenNhanPhong')

                                <option value="KhongDenNhanPhong" selected>
                                    Không đến nhận phòng
                                </option>

                                @endif

                            </select>
                        </form>

                    </td>

                    <!-- Thao tác -->
                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2 flex-wrap">

                            <!-- Xem -->
                            <a href="{{ route('admin.datphong.show',$datPhong->ma_don_dat_phong) }}"
                                class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 transition flex items-center justify-center">

                                <i class="fa-solid fa-eye"></i>

                            </a>

                            <!-- Sửa -->
                            <a href="{{ route('admin.datphong.edit',$datPhong->ma_don_dat_phong) }}"
                                class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-200 transition flex items-center justify-center">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <!-- Xóa -->
                            <form action="{{ route('admin.datphong.destroy',$datPhong->ma_don_dat_phong) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa đơn đặt phòng này?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="w-10 h-10 rounded-full bg-red-100 text-red-600 hover:bg-red-200 transition flex items-center justify-center">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="9" class="text-center py-12 text-gray-500">

                        Chưa có đơn đặt phòng nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- Phân trang -->
    <div class="px-6 py-4 border-t bg-white">

        {{ $datPhongs->links() }}

    </div>

</div>