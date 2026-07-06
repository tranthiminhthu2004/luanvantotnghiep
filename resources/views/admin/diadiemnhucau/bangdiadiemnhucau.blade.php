<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    @if(session('error'))

    <div class="m-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">

        <i class="fa-solid fa-circle-exclamation mr-2"></i>

        {{ session('error') }}

    </div>

    @endif

    <div class="overflow-x-auto">

        <table class="w-full min-w-[950px] border-collapse">

            <thead class="bg-slate-50">

                <tr class="text-left whitespace-nowrap">

                    <th class="px-4 py-4 text-base font-semibold text-black w-[90px]">

                        STT

                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">

                        Điểm đến

                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">

                        Nhu cầu du lịch

                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black w-[220px]">

                        Mức độ phù hợp

                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-center text-black w-[160px]">

                        Thao tác

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($duLieuGoiY as $index => $item)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- STT -->
                    <td class="px-4 py-4 text-base font-semibold text-black">

                        {{ $duLieuGoiY->firstItem() + $index }}

                    </td>

                    <!-- Điểm đến -->
                    <td class="px-4 py-4">

                        <div class="max-w-[280px] truncate text-base font-medium text-black"
                            title="{{ $item->ten_dia_diem }}">

                            {{ $item->ten_dia_diem }}

                        </div>

                    </td>

                    <!-- Nhu cầu du lịch -->
                    <td class="px-4 py-4">

                        <div class="max-w-[300px] truncate text-base text-black" title="{{ $item->ten_nhu_cau }}">

                            {{ $item->ten_nhu_cau }}

                        </div>

                    </td>

                    <!-- Mức độ phù hợp -->
                    <td class="px-4 py-4">

                        <div class="flex items-center gap-2 whitespace-nowrap">

                            <span class="text-base font-semibold text-black">

                                {{ $item->muc_do_phu_hop }}/5

                            </span>

                            @if($item->muc_do_phu_hop == 5)

                            <span class="rounded-full bg-green-100 text-green-700 px-3 py-1 text-sm font-semibold">

                                Rất phù hợp

                            </span>

                            @elseif($item->muc_do_phu_hop == 4)

                            <span class="rounded-full bg-blue-100 text-blue-700 px-3 py-1 text-sm font-semibold">

                                Phù hợp

                            </span>

                            @elseif($item->muc_do_phu_hop == 3)

                            <span class="rounded-full bg-yellow-100 text-yellow-700 px-3 py-1 text-sm font-semibold">

                                Trung bình

                            </span>

                            @elseif($item->muc_do_phu_hop == 2)

                            <span class="rounded-full bg-slate-100 text-slate-600 px-3 py-1 text-sm font-semibold">

                                Hơi phù hợp

                            </span>

                            @else

                            <span class="rounded-full bg-slate-100 text-slate-600 px-3 py-1 text-sm font-semibold">

                                Ít phù hợp

                            </span>

                            @endif

                        </div>

                    </td>

                    <!-- Thao tác -->
                    <td class="px-4 py-4">

                        <div class="flex items-center justify-center gap-4 whitespace-nowrap">

                            <a href="{{ route('admin.diadiemnhucau.edit', [$item->ma_dia_diem, $item->ma_nhu_cau]) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-200 flex items-center justify-center transition"
                                title="Chỉnh sửa">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <form
                                action="{{ route('admin.diadiemnhucau.destroy', [$item->ma_dia_diem, $item->ma_nhu_cau]) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa dữ liệu gợi ý này?');">

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

                        Chưa có dữ liệu gợi ý điểm đến nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($duLieuGoiY->hasPages())

    <div class="border-t px-4 py-4">

        <div class="flex justify-center">

            {{ $duLieuGoiY->links() }}

        </div>

    </div>

    @endif

</div>