<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="w-full overflow-x-auto">

        <table class="w-full min-w-[1150px] border-collapse">

            <thead class="bg-slate-50">

                <tr class="text-left whitespace-nowrap">

                    <th class="px-3 py-3 text-sm font-semibold text-black">
                        Mã
                    </th>

                    <th class="px-3 py-3 text-sm font-semibold text-black">
                        Hình ảnh
                    </th>

                    <th class="px-3 py-3 text-sm font-semibold text-black">
                        Khách sạn
                    </th>

                    <th class="px-3 py-3 text-sm font-semibold text-black">
                        Loại phòng
                    </th>

                    <th class="px-3 py-3 text-sm font-semibold text-black text-center">
                        Diện tích
                    </th>

                    <th class="px-3 py-3 text-sm font-semibold text-black text-center">
                        Giường
                    </th>

                    <th class="px-3 py-3 text-sm font-semibold text-black text-center">
                        Người
                    </th>

                    <th class="px-3 py-3 text-sm font-semibold text-black">
                        Giá
                    </th>

                    <th class="px-3 py-3 text-sm font-semibold text-black">
                        Trạng thái
                    </th>

                    <th class="px-3 py-3 text-sm font-semibold text-black text-center">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($loaiPhongs as $loaiPhong)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- ID -->
                    <td class="px-3 py-3 text-sm font-semibold text-black">

                        {{ $loaiPhong->ma_loai_phong }}

                    </td>

                    <!-- Hình -->
                    <td class="px-3 py-3">

                        @if($loaiPhong->hinhAnh->count())

                        <img src="{{ asset($loaiPhong->hinhAnh->first()->duong_dan_anh) }}"
                            class="w-16 h-12 md:w-20 md:h-14 object-cover rounded-lg border">

                        @else

                        <img src="{{ asset('images/no-room.jpg') }}"
                            class="w-16 h-12 md:w-20 md:h-14 object-cover rounded-lg border">

                        @endif

                    </td>

                    <!-- Khách sạn -->
                    <td class="px-3 py-3">

                        <div class="max-w-[170px] lg:max-w-[220px] truncate text-sm font-medium text-black">

                            {{ $loaiPhong->khachSan->ten_khach_san }}

                        </div>

                    </td>

                    <!-- Loại phòng -->
                    <td class="px-3 py-3">

                        <div class="max-w-[140px] lg:max-w-[180px] truncate text-sm font-semibold text-black">

                            {{ $loaiPhong->ten_loai_phong }}

                        </div>

                    </td>

                    <!-- Diện tích -->
                    <td class="px-3 py-3 text-sm text-center text-black">

                        {{ $loaiPhong->dien_tich }} m²

                    </td>

                    <!-- Giường -->
                    <td class="px-3 py-3 text-sm text-center text-black">

                        {{ $loaiPhong->so_giuong }}

                    </td>

                    <!-- Người -->
                    <td class="px-3 py-3 text-sm text-center text-black">

                        {{ $loaiPhong->so_nguoi_toi_da }}

                    </td>

                    <!-- Giá -->
                    <td class="px-3 py-3 whitespace-nowrap">

                        <span class="text-blue-600 font-semibold text-sm">

                            {{ number_format($loaiPhong->gia_co_ban,0,',','.') }}đ

                        </span>

                    </td> <!-- Trạng thái -->
                    <td class="px-3 py-3">

                        @if($loaiPhong->trang_thai)

                        <span
                            class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 whitespace-nowrap">

                            Hoạt động

                        </span>

                        @else

                        <span
                            class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700 whitespace-nowrap">

                            Tạm dừng

                        </span>

                        @endif

                    </td>

                    <!-- Thao tác -->
                    <td class="px-3 py-3">

                        <div class="flex items-center justify-center gap-2 whitespace-nowrap">

                            <!-- Xem -->
                            <a href="{{ route('admin.loaiphong.show', $loaiPhong->ma_loai_phong) }}"
                                class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 transition"
                                title="Chi tiết">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <!-- Sửa -->
                            <a href="{{ route('admin.loaiphong.edit', $loaiPhong->ma_loai_phong) }}"
                                class="w-9 h-9 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200 transition"
                                title="Chỉnh sửa">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <!-- Hình ảnh -->
                            <a href="{{ route('admin.loaiphong.hinhanh.index', $loaiPhong->ma_loai_phong) }}"
                                class="w-9 h-9 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center hover:bg-purple-200 transition"
                                title="Hình ảnh">

                                <i class="fa-solid fa-image text-xs"></i>

                            </a>

                            <!-- Tiện nghi -->
                            <a href="{{ route('admin.loaiphong.tiennghi', $loaiPhong->ma_loai_phong) }}"
                                class="w-9 h-9 rounded-full bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 transition"
                                title="Tiện nghi">

                                <i class="fa-solid fa-list-check text-xs"></i>

                            </a>

                            <!-- Xóa -->
                            <form action="{{ route('admin.loaiphong.destroy', $loaiPhong->ma_loai_phong) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa loại phòng này?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="w-9 h-9 rounded-full bg-red-100 text-red-600 hover:bg-red-200 flex items-center justify-center transition"
                                    title="Xóa">

                                    <i class="fa-solid fa-trash text-xs"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="10" class="py-10 text-center text-sm text-gray-500">

                        Chưa có loại phòng nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($loaiPhongs->hasPages())

    <div class="border-t bg-white px-4 py-4">

        {{ $loaiPhongs->links() }}

    </div>

    @endif

</div>