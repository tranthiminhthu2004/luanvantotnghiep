<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[950px] border-collapse">

            <thead class="bg-slate-50">

                <tr class="text-left whitespace-nowrap">

                    <th class="px-4 py-4 text-base font-semibold text-black w-[90px]">
                        Mã
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Tên địa điểm du lịch
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black w-[180px]">
                        Địa điểm
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Địa chỉ
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-center text-black w-[210px]">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($diaDiemDuLichs as $diaDiemDuLich)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- Mã -->
                    <td class="px-4 py-4 text-base font-semibold text-black">

                        {{ $diaDiemDuLich->ma_dia_diem_du_lich }}

                    </td>

                    <!-- Tên -->
                    <td class="px-4 py-4">

                        <div class="max-w-[280px] truncate text-base font-medium text-black"
                            title="{{ $diaDiemDuLich->ten_dia_diem }}">

                            {{ $diaDiemDuLich->ten_dia_diem }}

                        </div>

                    </td>

                    <!-- Địa điểm -->
                    <td class="px-4 py-4 text-base text-black">

                        {{ $diaDiemDuLich->diaDiem->ten_dia_diem }}

                    </td>

                    <!-- Địa chỉ -->
                    <td class="px-4 py-4">

                        <div class="max-w-[350px] truncate text-base text-gray-600"
                            title="{{ $diaDiemDuLich->dia_chi }}">

                            {{ $diaDiemDuLich->dia_chi ?? '-' }}

                        </div>

                    </td>

                    <!-- Thao tác -->
                    <td class="px-4 py-4">

                        <div class="flex items-center justify-center gap-4 whitespace-nowrap">

                            <a href="{{ route('admin.diadiemdulich.show',$diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 flex items-center justify-center transition"
                                title="Chi tiết">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <a href="{{ route('admin.diadiemdulich.edit',$diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-200 flex items-center justify-center transition"
                                title="Chỉnh sửa">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <a href="{{ route('admin.hinhanhdiadiemdulich.index',$diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 hover:bg-purple-200 flex items-center justify-center transition"
                                title="Quản lý ảnh">

                                <i class="fa-solid fa-image text-xs"></i>

                            </a>

                            <form
                                action="{{ route('admin.diadiemdulich.destroy',$diaDiemDuLich->ma_dia_diem_du_lich) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa địa điểm du lịch này?');">

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

                        Chưa có địa điểm du lịch nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($diaDiemDuLichs->hasPages())

    <div class="border-t px-4 py-4">

        <div class="flex justify-center">

            {{ $diaDiemDuLichs->links() }}

        </div>

    </div>

    @endif

</div>