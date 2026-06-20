<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr class="text-left">

                    <th class="px-6 py-4 text-lg">
                        ID
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Ảnh đại diện
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Họ tên
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Email
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Số điện thoại
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Vai trò
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

                @forelse($nguoiDungs as $nguoiDung)

                <tr class="border-t hover:bg-slate-50">

                    <!-- ID -->
                    <td class="px-6 py-4 text-base">

                        {{ $nguoiDung->ma_nguoi_dung }}

                    </td>

                    <!-- Avatar -->
                    <td class="px-6 py-4">

                        <img src="{{ $nguoiDung->anh_dai_dien
                                ? asset($nguoiDung->anh_dai_dien)
                                : asset('images/avatar-default.png') }}"
                            class="w-14 h-14 rounded-full object-cover border">

                    </td>

                    <!-- Họ tên -->
                    <td class="px-6 py-4 font-medium text-base">

                        {{ $nguoiDung->ho_va_ten_dem }}
                        {{ $nguoiDung->ten }}

                    </td>

                    <!-- Email -->
                    <td class="px-6 py-4 text-base">

                        {{ $nguoiDung->email }}

                    </td>

                    <!-- SĐT -->
                    <td class="px-6 py-4 text-base">

                        {{ $nguoiDung->so_dien_thoai ?? '-' }}

                    </td>

                    <!-- Vai trò -->
                    <td class="px-6 py-4">

                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">

                            {{ $nguoiDung->vaiTro->ten_vai_tro ?? '-' }}

                        </span>

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-6 py-4">

                        @if($nguoiDung->trang_thai)

                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">

                            Hoạt động

                        </span>

                        @else

                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">

                            Đã khóa

                        </span>

                        @endif

                    </td>

                    <!-- Thao tác -->
                    <td class="px-6 py-4">

                        <div class="flex gap-3">

                            <!-- Xem -->
                            <a href="{{ route('admin.nguoidung.show',$nguoiDung->ma_nguoi_dung) }}"
                                class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">

                                <i class="fa-solid fa-eye"></i>

                            </a>

                            <!-- Sửa -->
                            <a href="{{ route('admin.nguoidung.edit',$nguoiDung->ma_nguoi_dung) }}"
                                class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <!-- Xóa -->
                            <form action="{{ route('admin.nguoidung.destroy',$nguoiDung->ma_nguoi_dung) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa người dùng này?');">

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

                        Chưa có người dùng nào

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6 px-6 pt-4">

        {{ $nguoiDungs->links() }}

    </div>

</div>