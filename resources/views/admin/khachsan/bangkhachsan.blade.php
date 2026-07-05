<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[1050px] border-collapse">

            <thead class="bg-slate-50">

                <tr class="text-left whitespace-nowrap">

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Mã khách sạn
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Tên khách sạn
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Địa điểm
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-center text-black">
                        Sao
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

                @forelse($khachSans as $khachSan)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- Mã -->
                    <td class="px-4 py-4 text-base font-semibold text-black">

                        {{ $khachSan->ma_khach_san }}

                    </td>

                    <!-- Tên -->
                    <td class="px-4 py-4">

                        <div class="max-w-[220px] truncate text-base font-medium text-black">

                            {{ $khachSan->ten_khach_san }}

                        </div>

                    </td>

                    <!-- Địa điểm -->
                    <td class="px-4 py-4">

                        <div class="max-w-[180px] truncate text-base text-black">

                            {{ $khachSan->diaDiem->ten_dia_diem ?? '-' }}

                        </div>

                    </td>

                    <!-- Sao -->
                    <td class="px-4 py-4 text-center whitespace-nowrap text-base">

                        @for($i = 1; $i <= $khachSan->so_sao_khach_san; $i++)

                            ⭐

                            @endfor

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-4 py-4">

                        @if($khachSan->trang_thai)

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

                            <a href="{{ route('admin.khachsan.show',$khachSan->ma_khach_san) }}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 transition"
                                title="Chi tiết">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <a href="{{ route('admin.khachsan.edit',$khachSan->ma_khach_san) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200 transition"
                                title="Chỉnh sửa">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <a href="{{ route('admin.hinhanh.index',$khachSan->ma_khach_san) }}"
                                class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center hover:bg-purple-200 transition"
                                title="Hình ảnh">

                                <i class="fa-solid fa-image text-xs"></i>

                            </a>

                            <a href="{{ route('admin.khachsan.tiennghi',$khachSan->ma_khach_san) }}"
                                class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 transition"
                                title="Tiện nghi">

                                <i class="fa-solid fa-list-check text-xs"></i>

                            </a>

                            <form action="{{ route('admin.khachsan.destroy',$khachSan->ma_khach_san) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa khách sạn này?');">

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

                    <td colspan="6" class="py-12 text-center text-base text-gray-500">

                        Chưa có khách sạn nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="border-t px-4 py-4">

        {{ $khachSans->links() }}

    </div>

</div>