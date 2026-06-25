<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead class="bg-slate-50">

                <tr class="text-left">

                    <th class="px-5 py-4 text-sm font-semibold text-black whitespace-nowrap">
                        ID
                    </th>

                    <th class="px-5 py-4 text-sm font-semibold text-black whitespace-nowrap">
                        Ảnh đại diện
                    </th>

                    <th class="px-5 py-4 text-sm font-semibold text-black whitespace-nowrap">
                        Họ tên
                    </th>

                    <th class="px-5 py-4 text-sm font-semibold text-black whitespace-nowrap">
                        Email
                    </th>

                    <th class="px-5 py-4 text-sm font-semibold text-black whitespace-nowrap">
                        Số điện thoại
                    </th>

                    <th class="px-5 py-4 text-sm font-semibold text-black whitespace-nowrap">
                        Vai trò
                    </th>

                    <th class="px-5 py-4 text-sm font-semibold text-black whitespace-nowrap">
                        Trạng thái
                    </th>

                    <th class="px-5 py-4 text-sm font-semibold text-black whitespace-nowrap">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($nguoiDungs as $nguoiDung)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- ID -->
                    <td class="px-5 py-4 text-sm">

                        {{ $nguoiDung->ma_nguoi_dung }}

                    </td>

                    <!-- Avatar -->
                    <td class="px-5 py-4">

                        <img src="{{ $nguoiDung->anh_dai_dien
                                ? asset($nguoiDung->anh_dai_dien)
                                : asset('images/avatar-default.png') }}"
                            class="w-12 h-12 rounded-full object-cover border">

                    </td>

                    <!-- Họ tên -->
                    <td class="px-5 py-4 font-medium text-sm whitespace-nowrap">

                        {{ $nguoiDung->ho_va_ten_dem }}
                        {{ $nguoiDung->ten }}

                    </td>

                    <!-- Email -->
                    <td class="px-5 py-4 text-sm">

                        {{ $nguoiDung->email }}

                    </td>

                    <!-- SĐT -->
                    <td class="px-5 py-4 text-sm whitespace-nowrap">

                        {{ $nguoiDung->so_dien_thoai ?? '-' }}

                    </td>

                    <!-- Vai trò -->
                    <td class="px-5 py-4">

                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">

                            {{ $nguoiDung->vaiTro->ten_vai_tro ?? '-' }}

                        </span>

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-5 py-4">

                        @if($nguoiDung->trang_thai)

                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-medium">

                            Hoạt động

                        </span>

                        @else

                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-medium">

                            Đã khóa

                        </span>

                        @endif

                    </td>

                    <!-- Thao tác -->
                    <td class="px-5 py-4">

                        <div class="flex items-center gap-2">

                            <!-- Xem -->
                            <a href="{{ route('admin.nguoidung.show',$nguoiDung->ma_nguoi_dung) }}"
                                class="w-9 h-9 rounded-full bg-blue-100 hover:bg-blue-200 text-blue-600 flex items-center justify-center transition">

                                <i class="fa-solid fa-eye text-sm"></i>

                            </a>

                            <!-- Sửa -->
                            <a href="{{ route('admin.nguoidung.edit',$nguoiDung->ma_nguoi_dung) }}"
                                class="w-9 h-9 rounded-full bg-yellow-100 hover:bg-yellow-200 text-yellow-600 flex items-center justify-center transition">

                                <i class="fa-solid fa-pen text-sm"></i>

                            </a>

                            <!-- Xóa -->
                            <form action="{{ route('admin.nguoidung.destroy',$nguoiDung->ma_nguoi_dung) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa người dùng này?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="w-9 h-9 rounded-full bg-red-100 hover:bg-red-200 text-red-600 transition">

                                    <i class="fa-solid fa-trash text-sm"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8" class="text-center py-10 text-gray-500 text-sm">

                        Chưa có người dùng nào

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="px-5 py-4 border-t">

        {{ $nguoiDungs->links() }}

    </div>

</div>