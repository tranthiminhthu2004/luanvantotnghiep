<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[1050px] border-collapse">

            <thead class="bg-slate-50">

                <tr class="text-left whitespace-nowrap">

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Mã phòng
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Khách sạn
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Loại phòng
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Số phòng
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-center text-black">
                        Tầng
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

                @forelse($phongs as $phong)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- Mã phòng -->
                    <td class="px-4 py-4 text-base font-semibold text-black">

                        {{ $phong->ma_phong }}

                    </td>

                    <!-- Khách sạn -->
                    <td class="px-4 py-4">

                        <div class="max-w-[220px] truncate text-base font-medium text-black">

                            {{ $phong->loaiPhong->khachSan->ten_khach_san }}

                        </div>

                    </td>

                    <!-- Loại phòng -->
                    <td class="px-4 py-4">

                        <div class="max-w-[180px] truncate text-base font-semibold text-black">

                            {{ $phong->loaiPhong->ten_loai_phong }}

                        </div>

                    </td>

                    <!-- Số phòng -->
                    <td class="px-4 py-4">

                        <span class="text-blue-600 font-bold text-base">

                            {{ $phong->so_phong }}

                        </span>

                    </td>

                    <!-- Tầng -->
                    <td class="px-4 py-4 text-center text-base text-black">

                        {{ $phong->tang }}

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-4 py-4">

                        @if($phong->trang_thai_phong == 'DangHoatDong')

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                            Đang hoạt động

                        </span>

                        @elseif($phong->trang_thai_phong == 'BaoTri')

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">

                            Bảo trì

                        </span>

                        @else

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

                            Ngưng hoạt động

                        </span>

                        @endif

                    </td>

                    <!-- Thao tác -->
                    <td class="px-4 py-4">

                        <div class="flex items-center justify-center gap-4 whitespace-nowrap">

                            <!-- Xem -->
                            <a href="{{ route('admin.phong.show',$phong->ma_phong) }}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 flex items-center justify-center transition"
                                title="Chi tiết">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <!-- Sửa -->
                            <a href="{{ route('admin.phong.edit',$phong->ma_phong) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-200 flex items-center justify-center transition"
                                title="Chỉnh sửa">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <!-- Xóa -->
                            <form action="{{ route('admin.phong.destroy',$phong->ma_phong) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa phòng này?');">

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

                    <td colspan="7" class="py-12 text-center text-base text-gray-500">

                        Chưa có phòng nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($phongs->hasPages())

    <div class="border-t px-4 py-4">

        {{ $phongs->links() }}

    </div>

    @endif

</div>