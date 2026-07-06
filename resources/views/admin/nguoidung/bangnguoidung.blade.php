<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[1050px] border-collapse">

            <thead class="bg-slate-50">

                <tr class="text-left whitespace-nowrap">

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        ID
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Họ tên
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Email
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Số điện thoại
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Vai trò
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

                @forelse($nguoiDungs as $nguoiDung)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- ID -->
                    <td class="px-4 py-4 text-base font-semibold text-black">

                        {{ $nguoiDung->ma_nguoi_dung }}

                    </td>

                    <!-- Họ tên -->
                    <td class="px-4 py-4">

                        <div class="max-w-[220px] truncate text-base font-medium text-black">

                            {{ $nguoiDung->ho_va_ten_dem }}
                            {{ $nguoiDung->ten }}

                        </div>

                    </td>

                    <!-- Email -->
                    <td class="px-4 py-4">

                        <div class="max-w-[260px] truncate text-base text-black">

                            {{ $nguoiDung->email }}

                        </div>

                    </td>

                    <!-- SĐT -->
                    <td class="px-4 py-4 text-base text-black whitespace-nowrap">

                        {{ $nguoiDung->so_dien_thoai ?? '-' }}

                    </td>

                    <!-- Vai trò -->
                    <td class="px-4 py-4">

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-600 text-sm font-semibold">

                            {{ $nguoiDung->vaiTro->ten_vai_tro ?? '-' }}

                        </span>

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-4 py-4">

                        @if($nguoiDung->trang_thai)

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                            Hoạt động

                        </span>

                        @else

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

                            Đã khóa

                        </span>

                        @endif

                    </td>

                    <!-- Thao tác -->
                    <td class="px-4 py-4">

                        <div class="flex items-center justify-center gap-4 whitespace-nowrap">

                            <a href="{{ route('admin.nguoidung.show',$nguoiDung->ma_nguoi_dung) }}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 flex items-center justify-center transition"
                                title="Chi tiết">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <a href="{{ route('admin.nguoidung.edit',$nguoiDung->ma_nguoi_dung) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-200 flex items-center justify-center transition"
                                title="Chỉnh sửa">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <form action="{{ route('admin.nguoidung.destroy',$nguoiDung->ma_nguoi_dung) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa người dùng này?');">

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

                        Chưa có người dùng nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($nguoiDungs->hasPages())

    <div class="border-t px-4 py-4">

        <div class="flex justify-center">

            {{ $nguoiDungs->links() }}

        </div>

    </div>

    @endif

</div>