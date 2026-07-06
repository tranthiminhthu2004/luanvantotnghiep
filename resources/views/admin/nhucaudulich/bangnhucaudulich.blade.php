<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[900px] border-collapse">

            <thead class="bg-slate-50">

                <tr class="text-left whitespace-nowrap">

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Mã nhu cầu
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Tên nhu cầu
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Mô tả
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-center text-black">
                        Số địa điểm
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-center text-black">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($nhuCaus as $nhuCau)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- Mã -->
                    <td class="px-4 py-4 text-base font-semibold text-black">

                        {{ $nhuCau->ma_nhu_cau }}

                    </td>

                    <!-- Tên -->
                    <td class="px-4 py-4">

                        <div class="max-w-[220px] truncate text-base font-medium text-black">

                            {{ $nhuCau->ten_nhu_cau }}

                        </div>

                    </td>

                    <!-- Mô tả -->
                    <td class="px-4 py-4">

                        <div class="max-w-[320px] truncate text-base text-gray-600">

                            {{ \Illuminate\Support\Str::limit($nhuCau->mo_ta ?? '-', 60) }}

                        </div>

                    </td>

                    <!-- Số địa điểm -->
                    <td class="px-4 py-4 text-center text-base text-black">

                        {{ $nhuCau->dia_diems_count }}

                    </td>

                    <!-- Thao tác -->
                    <td class="px-4 py-4">

                        <div class="flex items-center justify-center gap-4 whitespace-nowrap">

                            <!-- Xem -->
                            <a href="{{ route('admin.nhucaudulich.show',$nhuCau->ma_nhu_cau) }}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 flex items-center justify-center transition"
                                title="Chi tiết">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <!-- Sửa -->
                            <a href="{{ route('admin.nhucaudulich.edit',$nhuCau->ma_nhu_cau) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-200 flex items-center justify-center transition"
                                title="Chỉnh sửa">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <!-- Xóa -->
                            <form action="{{ route('admin.nhucaudulich.destroy',$nhuCau->ma_nhu_cau) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa nhu cầu này?');">

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

                    <td colspan="5" class="py-12 text-center text-base text-gray-500">

                        Chưa có nhu cầu du lịch nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($nhuCaus->hasPages())

    <div class="border-t px-4 py-4">

        <div class="flex justify-center">

            {{ $nhuCaus->links() }}

        </div>

    </div>

    @endif

</div>