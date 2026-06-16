<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">
                <tr class="text-left">

                    <th class="px-6 py-4">
                        ID
                    </th>

                    <th class="px-6 py-4">
                        Icon
                    </th>

                    <th class="px-6 py-4">
                        Tên tiện nghi
                    </th>

                    <th class="px-6 py-4">
                        Mô tả
                    </th>

                    <th class="px-6 py-4">
                        Trạng thái
                    </th>

                    <th class="px-6 py-4">
                        Thao tác
                    </th>

                </tr>


            </thead>
            @forelse($tienNghis as $tienNghi)

            <tr class="border-t hover:bg-slate-50">

                <!-- ID -->
                <td class="px-6 py-4 text-base">

                    {{ $tienNghi->ma_tien_nghi }}

                </td>

                <!-- Icon -->
                <td class="px-6 py-4">

                    <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center">

                        <i class="fa-solid {{ $tienNghi->icon }} text-xl"></i>

                    </div>

                </td>

                <!-- Tên tiện nghi -->
                <td class="px-6 py-4 font-medium text-base">

                    {{ $tienNghi->ten_tien_nghi }}

                </td>

                <!-- Mô tả -->
                <td class="px-6 py-4 text-base">

                    {{ $tienNghi->mo_ta }}

                </td>

                <!-- Trạng thái -->
                <td class="px-6 py-4">

                    @if($tienNghi->trang_thai)

                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-base">

                        Hoạt động

                    </span>

                    @else

                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-base">

                        Tạm dừng

                    </span>

                    @endif

                </td>

                <!-- Thao tác -->
                <td class="px-6 py-4">

                    <div class="flex gap-4">

                        <a href="{{ route('admin.tiennghi.show',$tienNghi->ma_tien_nghi) }}"
                            class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">

                            <i class="fa-solid fa-eye"></i>

                        </a>

                        <a href="{{ route('admin.tiennghi.edit',$tienNghi->ma_tien_nghi) }}"
                            class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center">

                            <i class="fa-solid fa-pen"></i>

                        </a>

                        <form action="{{ route('admin.tiennghi.destroy',$tienNghi->ma_tien_nghi) }}" method="POST"
                            onsubmit="return confirm('Bạn có chắc muốn xóa tiện nghi này?');">

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

                <td colspan="6" class="text-center py-10 text-gray-500 text-base">

                    Chưa có tiện nghi nào

                </td>

            </tr>

            @endforelse


            </tbody>

        </table>

    </div>

</div>