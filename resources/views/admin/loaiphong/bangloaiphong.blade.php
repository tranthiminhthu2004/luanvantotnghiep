<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[1050px] border-collapse">

            <thead class="bg-slate-50">

                <tr class="text-left whitespace-nowrap">

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Mã loại phòng
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Khách sạn
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Loại phòng
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-center text-black">
                        Diện tích
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-center text-black">
                        Giường
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-center text-black">
                        Người
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Giá
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

                @forelse($loaiPhongs as $loaiPhong)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- Mã -->
                    <td class="px-4 py-4 text-base font-semibold text-black">

                        {{ $loaiPhong->ma_loai_phong }}

                    </td>

                    <!-- Khách sạn -->
                    <td class="px-4 py-4">

                        <div class="max-w-[220px] truncate text-base font-medium text-black">

                            {{ $loaiPhong->khachSan->ten_khach_san }}

                        </div>

                    </td>

                    <!-- Loại phòng -->
                    <td class="px-4 py-4">

                        <div class="max-w-[180px] truncate text-base font-semibold text-black">

                            {{ $loaiPhong->ten_loai_phong }}

                        </div>

                    </td>

                    <!-- Diện tích -->
                    <td class="px-4 py-4 text-center text-base text-black">

                        {{ $loaiPhong->dien_tich }} m²

                    </td>

                    <!-- Giường -->
                    <td class="px-4 py-4 text-center text-base text-black">

                        {{ $loaiPhong->so_giuong }}

                    </td>

                    <!-- Người -->
                    <td class="px-4 py-4 text-center text-base text-black">

                        {{ $loaiPhong->so_nguoi_toi_da }}

                    </td>

                    <!-- Giá -->
                    <td class="px-4 py-4 whitespace-nowrap">

                        <span class="text-blue-600 font-semibold text-base">

                            {{ number_format($loaiPhong->gia_co_ban,0,',','.') }}đ

                        </span>

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-4 py-4">

                        @if($loaiPhong->trang_thai)

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                            Hoạt động

                        </span>

                        @else

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

                            Tạm dừng

                        </span>

                        @endif

                    </td>

                    <!-- Thao tác -->
                    <td class="px-4 py-4">

                        <div class="flex items-center justify-center gap-4 whitespace-nowrap">

                            <a href="{{ route('admin.loaiphong.show',$loaiPhong->ma_loai_phong) }}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 transition"
                                title="Chi tiết">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <a href="{{ route('admin.loaiphong.edit',$loaiPhong->ma_loai_phong) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200 transition"
                                title="Chỉnh sửa">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <a href="{{ route('admin.loaiphong.hinhanh.index',$loaiPhong->ma_loai_phong) }}"
                                class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center hover:bg-purple-200 transition"
                                title="Hình ảnh">

                                <i class="fa-solid fa-image text-xs"></i>

                            </a>

                            <a href="{{ route('admin.loaiphong.tiennghi',$loaiPhong->ma_loai_phong) }}"
                                class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 transition"
                                title="Tiện nghi">

                                <i class="fa-solid fa-list-check text-xs"></i>

                            </a>

                            <form action="{{ route('admin.loaiphong.destroy',$loaiPhong->ma_loai_phong) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa loại phòng này?');">

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

                    <td colspan="9" class="py-12 text-center text-base text-gray-500">

                        Chưa có loại phòng nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($loaiPhongs->hasPages())

    <div class="border-t px-4 py-4">

        {{ $loaiPhongs->links() }}

    </div>

    @endif

</div>