<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="min-w-[1200px] w-full">

            <thead class="bg-slate-50">

                <tr class="text-left text-sm uppercase tracking-wider text-slate-600">

                    <th class="px-6 py-4">
                        ID
                    </th>

                    <th class="px-6 py-4">
                        Khách sạn
                    </th>

                    <th class="px-6 py-4">
                        Loại phòng
                    </th>

                    <th class="px-6 py-4">
                        Số phòng
                    </th>

                    <th class="px-6 py-4">
                        Tầng
                    </th>

                    <th class="px-6 py-4">
                        Trạng thái
                    </th>

                    <th class="px-6 py-4 text-center">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($phongs as $phong)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- ID -->
                    <td class="px-6 py-4 font-semibold">

                        {{ $phong->ma_phong }}

                    </td>

                    <!-- Khách sạn -->
                    <td class="px-6 py-4">

                        {{ $phong->loaiPhong->khachSan->ten_khach_san }}

                    </td>

                    <!-- Loại phòng -->
                    <td class="px-6 py-4 font-medium">

                        {{ $phong->loaiPhong->ten_loai_phong }}

                    </td>

                    <!-- Số phòng -->
                    <td class="px-6 py-4 font-bold text-blue-600">

                        {{ $phong->so_phong }}

                    </td>

                    <!-- Tầng -->
                    <td class="px-6 py-4">

                        {{ $phong->tang }}

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-6 py-4">

                        @if($phong->trang_thai_phong == 'DangHoatDong')

                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-medium">

                            Đang hoạt động

                        </span>

                        @elseif($phong->trang_thai_phong == 'BaoTri')

                        <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm font-medium">

                            Bảo trì

                        </span>

                        @else

                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-medium">

                            Ngưng hoạt động

                        </span>

                        @endif

                    </td>

                    <!-- Thao tác -->
                    <td class="px-6 py-4">

                        <div class="flex flex-wrap justify-center gap-2">

                            <a href="{{ route('admin.phong.show',$phong->ma_phong) }}"
                                class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200">

                                <i class="fa-solid fa-eye"></i>

                            </a>

                            <a href="{{ route('admin.phong.edit',$phong->ma_phong) }}"
                                class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <form action="{{ route('admin.phong.destroy',$phong->ma_phong) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa phòng này?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="w-10 h-10 rounded-full bg-red-100 text-red-600 hover:bg-red-200">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center py-10 text-gray-500">

                        Chưa có phòng nào

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>