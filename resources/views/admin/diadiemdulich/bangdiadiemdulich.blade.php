<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[1180px]">

            <thead class="bg-slate-50 border-b">

                <tr>

                    <th class="px-4 py-4 text-sm font-semibold text-black w-[90px]">
                        Mã
                    </th>

                    <th class="px-4 py-4 text-sm font-semibold text-black w-[130px]">
                        Ảnh
                    </th>

                    <th class="px-4 py-4 text-sm font-semibold text-black">
                        Tên địa điểm du lịch
                    </th>

                    <th class="px-4 py-4 text-sm font-semibold text-black w-[170px]">
                        Địa điểm
                    </th>

                    <th class="px-4 py-4 text-sm font-semibold text-black">
                        Địa chỉ
                    </th>

                    <th class="px-4 py-4 text-sm font-semibold text-black text-center w-[180px]">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($diaDiemDuLichs as $diaDiemDuLich)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- Mã -->
                    <td class="px-4 py-4 text-sm font-semibold text-black">

                        {{ $diaDiemDuLich->ma_dia_diem_du_lich }}

                    </td>

                    <!-- Ảnh -->
                    <td class="px-4 py-4">

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
                    <td class="px-4 py-4">

                        <div class="max-w-[260px] truncate text-sm font-medium text-black"
                            title="{{ $diaDiemDuLich->ten_dia_diem }}">

                            {{ $diaDiemDuLich->ten_dia_diem }}

                        </div>

                    </td>

                    <!-- Địa điểm -->
                    <td class="px-4 py-4">

                        <span class="text-sm text-black">

                            {{ $diaDiemDuLich->diaDiem->ten_dia_diem }}

                        </span>

                    </td>

                    <!-- Địa chỉ -->
                    <td class="px-4 py-4">

                        <div class="max-w-[330px] truncate text-sm text-gray-600" title="{{ $diaDiemDuLich->dia_chi }}">

                            {{ $diaDiemDuLich->dia_chi ?? '-' }}

                        </div>

                    </td>

                    <!-- Thao tác -->
                    <td class="px-4 py-4">

                        <div class="flex justify-center gap-2">

                            <a href="{{ route('admin.diadiemdulich.show',$diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 transition">

                                <i class="fa-solid fa-eye text-sm"></i>

                            </a>

                            <a href="{{ route('admin.diadiemdulich.edit',$diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                class="w-9 h-9 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200 transition">

                                <i class="fa-solid fa-pen text-sm"></i>

                            </a>
                            <a href="{{ route('admin.hinhanhdiadiem.index',$diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                class="w-9 h-9 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center hover:bg-purple-200 transition">

                                <i class="fa-solid fa-image text-sm"></i>

                            </a>
                            <form
                                action="{{ route('admin.diadiemdulich.destroy',$diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa địa điểm du lịch này?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="w-9 h-9 rounded-full bg-red-100 text-red-600 hover:bg-red-200 flex items-center justify-center transition">

                                    <i class="fa-solid fa-trash text-sm"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center py-12 text-gray-500">

                        Chưa có địa điểm du lịch nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="border-t px-4 py-4">

        {{ $diaDiemDuLichs->links() }}

    </div>

</div>