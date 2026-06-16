<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr class="text-left">

                    <th class="px-6 py-4">
                        ID
                    </th>

                    <th class="px-6 py-4">
                        Tên địa điểm
                    </th>

                    <th class="px-6 py-4">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($diaDiems as $diaDiem)

                <tr class="border-t hover:bg-slate-50">

                    <!-- ID -->
                    <td class="px-6 py-4 text-base">

                        {{ $diaDiem->ma_dia_diem }}

                    </td>

                    <!-- Tên địa điểm -->
                    <td class="px-6 py-4 font-medium text-base">

                        {{ $diaDiem->ten_dia_diem }}

                    </td>

                    <!-- Thao tác -->
                    <td class="px-6 py-4">

                        <div class="flex gap-4">

                            <a href="{{ route('admin.diadiem.show',$diaDiem->ma_dia_diem) }}"
                                class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">

                                <i class="fa-solid fa-eye"></i>

                            </a>

                            <a href="{{ route('admin.diadiem.edit',$diaDiem->ma_dia_diem) }}"
                                class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <form action="{{ route('admin.diadiem.destroy',$diaDiem->ma_dia_diem) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa địa điểm này?');">

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

                    <td colspan="3" class="text-center py-10 text-gray-500 text-base">

                        Chưa có địa điểm nào

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>