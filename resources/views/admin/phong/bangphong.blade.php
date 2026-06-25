<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[1100px]">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-4 py-3 text-left text-sm font-semibold text-black">
                        Mã phòng
                    </th>

                    <th class="px-4 py-3 text-left  text-sm font-semibold text-black">
                        Khách sạn
                    </th>

                    <th class="px-4 py-3 text-left  text-sm font-semibold text-black">
                        Loại phòng
                    </th>

                    <th class="px-4 py-3 text-left text-sm font-semibold text-black">
                        Số phòng
                    </th>

                    <th class="px-4 py-3 text-left  text-sm font-semibold text-black">
                        Tầng
                    </th>

                    <th class="px-4 py-3 text-sm text-left  font-semibold text-black">
                        Trạng thái
                    </th>

                    <th class="px-4 py-3 text-sm text-left font-semibold  text-black">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($phongs as $phong)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- ID -->
                    <td class="px-4 py-3 text-sm font-semibold text-black">

                        {{ $phong->ma_phong }}

                    </td>

                    <!-- Khách sạn -->
                    <td class="px-4 py-3">

                        <div class="max-w-[220px] truncate text-sm text-black font-medium">

                            {{ $phong->loaiPhong->khachSan->ten_khach_san }}

                        </div>

                    </td>

                    <!-- Loại phòng -->
                    <td class="px-4 py-3">

                        <div class="max-w-[170px] truncate text-sm font-semibold text-black">

                            {{ $phong->loaiPhong->ten_loai_phong }}

                        </div>

                    </td>

                    <!-- Số phòng -->
                    <td class="px-4 py-3">

                        <span class="font-bold text-blue-600">

                            {{ $phong->so_phong }}

                        </span>

                    </td>

                    <!-- Tầng -->
                    <td class="px-4 py-3 text-sm text-black">

                        {{ $phong->tang }}

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-4 py-3">

                        @if($phong->trang_thai_phong == 'DangHoatDong')

                        <span
                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">

                            Đang hoạt động

                        </span>

                        @elseif($phong->trang_thai_phong == 'BaoTri')

                        <span
                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">

                            Bảo trì

                        </span>

                        @else

                        <span
                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">

                            Ngưng hoạt động

                        </span>

                        @endif

                    </td>

                    <!-- Thao tác -->
                    <td class="px-4 py-3">

                        <div class="flex flex-wrap justify-center gap-2">
                            <a href="{{ route('admin.phong.show',$phong->ma_phong) }}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 flex items-center justify-center transition">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <a href="{{ route('admin.phong.edit',$phong->ma_phong) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-200 flex items-center justify-center transition">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <form action="{{ route('admin.phong.destroy',$phong->ma_phong) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa phòng này?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="w-8 h-8 rounded-full bg-red-100 text-red-600 hover:bg-red-200 flex items-center justify-center transition">

                                    <i class="fa-solid fa-trash text-xs"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center py-10 text-gray-500 text-sm">

                        Chưa có phòng nào

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="border-t px-4 py-3">

        {{ $phongs->links() }}

    </div>

</div>