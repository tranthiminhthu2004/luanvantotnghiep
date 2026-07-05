<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="min-w-[900px] w-full">

            <thead class="bg-slate-50 text-black">

                <tr class="text-left text-sm tracking-wider">

                    <th class="px-6 py-4 font-semibold">
                        Mã nhu cầu
                    </th>

                    <th class="px-6 py-4 font-semibold">
                        Tên nhu cầu
                    </th>

                    <th class="px-6 py-4 font-semibold">
                        Mô tả
                    </th>

                    <th class="px-6 py-4 text-center font-semibold">
                        Số địa điểm
                    </th>

                    <th class="px-6 py-4 text-center font-semibold">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($nhuCaus as $nhuCau)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- Mã -->
                    <td class="px-6 py-4 font-semibold">

                        {{ $nhuCau->ma_nhu_cau }}

                    </td>

                    <!-- Tên -->
                    <td class="px-6 py-4">

                        {{ $nhuCau->ten_nhu_cau }}

                    </td>

                    <!-- Mô tả -->
                    <td class="px-6 py-4 text-gray-600">

                        {{ \Illuminate\Support\Str::limit($nhuCau->mo_ta ?? '-', 60) }}

                    </td>

                    <!-- Số địa điểm -->
                    <td class="px-6 py-4 text-center">

                        {{ $nhuCau->dia_diems_count }}

                    </td>

                    <!-- Thao tác -->
                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2 flex-wrap">

                            <!-- Xem -->
                            <a href="{{ route('admin.nhucaudulich.show',$nhuCau->ma_nhu_cau) }}"
                                class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 transition">

                                <i class="fa-solid fa-eye"></i>

                            </a>

                            <!-- Sửa -->
                            <a href="{{ route('admin.nhucaudulich.edit',$nhuCau->ma_nhu_cau) }}"
                                class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200 transition">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <!-- Xóa -->
                            <form action="{{ route('admin.nhucaudulich.destroy',$nhuCau->ma_nhu_cau) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa nhu cầu này?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="w-10 h-10 rounded-full bg-red-100 text-red-600 hover:bg-red-200 transition">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center py-12 text-gray-500">

                        Chưa có nhu cầu du lịch nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="px-6 py-4 border-t bg-white">

        <div class="flex justify-center mt-8">

            {{ $nhuCaus->links() }}

        </div>

    </div>

</div>