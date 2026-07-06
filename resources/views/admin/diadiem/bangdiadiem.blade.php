<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[700px] border-collapse">

            <thead class="bg-slate-50">

                <tr class="text-left whitespace-nowrap">

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Mã địa điểm
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Tên địa điểm
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-center text-black">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($diaDiems as $diaDiem)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- ID -->
                    <td class="px-4 py-4 text-base font-semibold text-black">

                        {{ $diaDiem->ma_dia_diem }}

                    </td>

                    <!-- Tên địa điểm -->
                    <td class="px-4 py-4">

                        <div class="max-w-[350px] truncate text-base font-medium text-black">

                            {{ $diaDiem->ten_dia_diem }}

                        </div>

                    </td>

                    <!-- Thao tác -->
                    <td class="px-4 py-4">

                        <div class="flex items-center justify-center gap-4 whitespace-nowrap">

                            <!-- Xem -->
                            <a href="{{ route('admin.diadiem.show',$diaDiem->ma_dia_diem) }}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 flex items-center justify-center transition"
                                title="Chi tiết">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <!-- Sửa -->
                            <a href="{{ route('admin.diadiem.edit',$diaDiem->ma_dia_diem) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-200 flex items-center justify-center transition"
                                title="Chỉnh sửa">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <!-- Xóa -->
                            <form action="{{ route('admin.diadiem.destroy',$diaDiem->ma_dia_diem) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa địa điểm này?');">

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

                    <td colspan="3" class="py-12 text-center text-base text-gray-500">

                        Chưa có địa điểm nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($diaDiems->hasPages())

    <div class="border-t px-4 py-4">

        <div class="flex justify-center">

            {{ $diaDiems->onEachSide(1)->links() }}

        </div>

    </div>

    @endif

</div>