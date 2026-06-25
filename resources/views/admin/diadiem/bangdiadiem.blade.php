<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="min-w-[700px] w-full">

            <thead class="bg-slate-50 text-black">

                <tr class="text-left text-sm tracking-wider ">

                    <th class="px-6 py-4 font-semibold">
                        Mã địa điểm
                    </th>

                    <th class="px-6 py-4 font-semibold">
                        Tên địa điểm
                    </th>

                    <th class="px-6 py-4 text-center font-semibold">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($diaDiems as $diaDiem)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- ID -->
                    <td class="px-6 py-4 font-semibold">

                        {{ $diaDiem->ma_dia_diem }}

                    </td>

                    <!-- Tên địa điểm -->
                    <td class="px-6 py-4">

                        {{ $diaDiem->ten_dia_diem }}

                    </td>

                    <!-- Thao tác -->
                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2 flex-wrap">

                            <a href="{{ route('admin.diadiem.show',$diaDiem->ma_dia_diem) }}"
                                class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 transition">

                                <i class="fa-solid fa-eye"></i>

                            </a>

                            <a href="{{ route('admin.diadiem.edit',$diaDiem->ma_dia_diem) }}"
                                class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200 transition">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <form action="{{ route('admin.diadiem.destroy',$diaDiem->ma_dia_diem) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa địa điểm này?');">

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

                    <td colspan="3" class="text-center py-12 text-gray-500">

                        Chưa có địa điểm nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>