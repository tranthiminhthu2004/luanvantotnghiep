<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="min-w-[1200px] w-full">

            <thead class="bg-slate-50">

                <tr class="text-left">

                    <th class="px-6 py-4 text-lg">
                        ID
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Khách hàng
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Khách sạn
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Ngày nhận
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Ngày trả
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Tổng tiền
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Trạng thái
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($datPhongs as $datPhong)

                <tr class="border-t hover:bg-slate-50">

                    <!-- ID -->
                    <td class="px-6 py-4 text-base">

                        {{ $datPhong->ma_dat_phong }}

                    </td>

                    <!-- Khách hàng -->
                    <td class="px-6 py-4">

                        <div class="font-medium">

                            {{ $datPhong->ho_va_ten_dem_khach }}
                            {{ $datPhong->ten_khach }}

                        </div>

                        <div class="text-sm text-gray-500">

                            {{ $datPhong->email_khach }}

                        </div>

                    </td>

                    <!-- Khách sạn -->
                    <td class="px-6 py-4">

                        {{ $datPhong->khachSan->ten_khach_san ?? '-' }}

                    </td>

                    <!-- Ngày nhận -->
                    <td class="px-6 py-4">

                        {{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}

                    </td>

                    <!-- Ngày trả -->
                    <td class="px-6 py-4">

                        {{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}

                    </td>

                    <!-- Tổng tiền -->
                    <td class="px-6 py-4 font-bold text-blue-600">

                        {{ number_format($datPhong->tong_tien,0,',','.') }}đ

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-6 py-4">

                        @if($datPhong->trang_thai_dat_phong == 'ChoXacNhan')

                        <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full">

                            Chờ xác nhận

                        </span>

                        @elseif($datPhong->trang_thai_dat_phong == 'DaXacNhan')

                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full">

                            Đã xác nhận

                        </span>

                        @elseif($datPhong->trang_thai_dat_phong == 'DaHuy')

                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full">

                            Đã hủy

                        </span>

                        @elseif($datPhong->trang_thai_dat_phong == 'HoanThanh')

                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full">

                            Hoàn thành

                        </span>

                        @endif

                    </td>

                    <!-- Thao tác -->
                    <td class="px-6 py-4">

                        <div class="flex gap-4">

                            <a href="{{ route('admin.datphong.show',$datPhong->ma_don_dat_phong) }}"
                                class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">

                                <i class="fa-solid fa-eye"></i>

                            </a>

                            <a href="{{ route('admin.datphong.edit',$datPhong->ma_don_dat_phong) }}"
                                class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <form action="{{ route('admin.datphong.destroy',$datPhong->ma_don_dat_phong) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa đơn đặt phòng này?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="w-10 h-10 rounded-full bg-red-100 text-red-600">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8" class="text-center py-10 text-gray-500 text-base">

                        Chưa có đơn đặt phòng nào

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6 px-6 py-4">

        {{ $datPhongs->links() }}

    </div>

</div>