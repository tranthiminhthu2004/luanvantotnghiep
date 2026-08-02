<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[1050px] border-collapse">

            <thead class="bg-slate-50">

                <tr class="text-left whitespace-nowrap">

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Mã tiện nghi
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Icon
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Tên tiện nghi
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Mô tả
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

                @forelse($tienNghis as $tienNghi)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- Mã tiện nghi -->
                    <td class="px-4 py-4 text-base font-semibold text-black">

                        {{ $tienNghi->ma_tien_nghi }}

                    </td>

                    <!-- Icon -->
                    <td class="px-4 py-4">

                        <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center">

                            <i class="fa-solid {{ $tienNghi->icon }} text-lg"></i>

                        </div>

                    </td>

                    <!-- Tên tiện nghi -->
                    <td class="px-4 py-4">

                        <div class="max-w-[220px] truncate text-base font-medium text-black">

                            {{ $tienNghi->ten_tien_nghi }}

                        </div>

                    </td>

                    <!-- Mô tả -->
                    <td class="px-4 py-4">

                        <div class="max-w-[300px] text-base text-gray-600">

                            {{ \Illuminate\Support\Str::limit($tienNghi->mo_ta,80) }}

                        </div>

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-4 py-4">

                        @if($tienNghi->trang_thai)

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

                            <!-- Xem -->
                            <a href="{{ route('admin.tiennghi.show',$tienNghi->ma_tien_nghi) }}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 flex items-center justify-center transition"
                                title="Chi tiết">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <!-- Sửa -->
                            <a href="{{ route('admin.tiennghi.edit',$tienNghi->ma_tien_nghi) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-200 flex items-center justify-center transition"
                                title="Chỉnh sửa">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <!-- Xóa -->
                            <form action="{{ route('admin.tiennghi.destroy',$tienNghi->ma_tien_nghi) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa tiện nghi này?');">

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

                        Chưa có tiện nghi nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>
    <div class="border-t px-4 py-4">

        <div class="flex justify-center">

            {{ $tienNghis->links() }}

        </div>

    </div>

</div>