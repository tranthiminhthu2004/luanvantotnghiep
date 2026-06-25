<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[1000px]">

            <thead class="bg-slate-50 text-left">

                <tr>

                    <th class="px-4 py-3 text-sm font-semibold text-black">
                        Mã tiện nghi
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold text-black">
                        Icon
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold text-black">
                        Tên tiện nghi
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold text-black">
                        Mô tả
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold text-black">
                        Trạng thái
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold  text-black">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($tienNghis as $tienNghi)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- ID -->
                    <td class="px-4 py-3 text-sm font-semibold text-black">

                        {{ $tienNghi->ma_tien_nghi }}

                    </td>

                    <!-- Icon -->
                    <td class="px-4 py-3">

                        <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center">

                            <i class="fa-solid {{ $tienNghi->icon }} text-base"></i>

                        </div>

                    </td>

                    <!-- Tên -->
                    <td class="px-4 py-3">

                        <div class="max-w-[180px] truncate text-sm font-medium text-black">

                            {{ $tienNghi->ten_tien_nghi }}

                        </div>

                    </td>

                    <!-- Mô tả -->
                    <td class="px-4 py-3">

                        <div class="max-w-[260px] truncate text-sm text-gray-600">

                            {{ $tienNghi->mo_ta }}

                        </div>

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-4 py-3">

                        @if($tienNghi->trang_thai)

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">

                            Hoạt động

                        </span>

                        @else

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">

                            Tạm dừng

                        </span>

                        @endif

                    </td>

                    <!-- Thao tác -->
                    <td class="px-4 py-3">

                        <div class="flex flex-wrap justify-center gap-2">

                            <a href="{{ route('admin.tiennghi.show',$tienNghi->ma_tien_nghi) }}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 transition">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <a href="{{ route('admin.tiennghi.edit',$tienNghi->ma_tien_nghi) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200 transition">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <form action="{{ route('admin.tiennghi.destroy',$tienNghi->ma_tien_nghi) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa tiện nghi này?');">

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

                    <td colspan="6" class="text-center py-10 text-gray-500 text-sm">

                        Chưa có tiện nghi nào

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="border-t px-4 py-3">

        {{ $tienNghis->links() }}

    </div>

</div>