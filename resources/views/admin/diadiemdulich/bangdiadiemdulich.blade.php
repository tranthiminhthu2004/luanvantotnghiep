<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[1100px]">

            <thead class="bg-slate-50 border-b">

                <tr class="text-left">

                    <th class="px-4 py-3 text-sm font-semibold text-black">
                        Mã
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold text-black">
                        Ảnh
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold text-black">
                        Tên địa điểm du lịch
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold text-black">
                        Địa điểm
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold text-black">
                        Địa chỉ
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold text-black text-center">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($diaDiemDuLichs as $diaDiemDuLich)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- Mã -->
                    <td class="px-4 py-3 text-sm font-medium">

                        {{ $diaDiemDuLich->ma_dia_diem_du_lich }}

                    </td>

                    <!-- Ảnh -->
                    <td class="px-4 py-3">

                        @if($diaDiemDuLich->hinhAnhs->count())

                        <img src="{{ asset($diaDiemDuLich->hinhAnhs->first()->duong_dan_anh) }}"
                            class="w-24 h-16 rounded-lg object-cover border">

                        @else

                        <div
                            class="w-24 h-16 rounded-lg border bg-gray-100 flex items-center justify-center text-gray-400">

                            <i class="fa-solid fa-image"></i>

                        </div>

                        @endif

                    </td>

                    <!-- Tên -->
                    <td class="px-4 py-3 text-sm font-medium">

                        {{ $diaDiemDuLich->ten_dia_diem }}

                    </td>

                    <!-- Địa điểm -->
                    <td class="px-4 py-3 text-sm">

                        {{ $diaDiemDuLich->diaDiem->ten_dia_diem }}

                    </td>

                    <!-- Địa chỉ -->
                    <td class="px-4 py-3 text-sm text-gray-600">

                        {{ $diaDiemDuLich->dia_chi ?? '-' }}

                    </td>

                    <!-- Thao tác -->
                    <td class="px-4 py-3">

                        <div class="flex justify-center gap-2">

                            <a href="{{ route('admin.diadiemdulich.show',$diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <a href="{{ route('admin.diadiemdulich.edit',$diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <a href="{{ route('admin.hinhanhdiadiemdulich.index',$diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center">

                                <i class="fa-solid fa-image text-xs"></i>

                            </a>

                            <form
                                action="{{ route('admin.diadiemdulich.destroy',$diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa địa điểm du lịch này?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center">

                                    <i class="fa-solid fa-trash text-xs"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center py-10 text-gray-500 text-sm">

                        Chưa có địa điểm du lịch nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-4 px-4 py-3 border-t">

        {{ $diaDiemDuLichs->links() }}

    </div>

</div>