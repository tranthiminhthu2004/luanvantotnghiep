<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[1100px] border-collapse">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-4 py-4 text-left text-base font-semibold text-black">
                        Mã khách sạn
                    </th>

                    <th class="px-4 py-4 text-left text-base font-semibold text-black">
                        Tên khách sạn
                    </th>

                    <th class="px-4 py-4 text-left text-base font-semibold text-black">
                        Địa điểm
                    </th>

                    <th class="px-4 py-4 text-center text-base font-semibold text-black">
                        Sao
                    </th>

                    <th class="px-4 py-4 text-center text-base font-semibold text-black">
                        Trạng thái duyệt
                    </th>

                    <th class="px-4 py-4 text-center text-base font-semibold text-black">
                        Ngày gửi
                    </th>

                    <th class="px-4 py-4 text-center text-base font-semibold text-black">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($khachSans as $khachSan)

                <tr class="border-t hover:bg-slate-50 transition">

                    {{-- Mã --}}
                    <td class="px-4 py-4 font-semibold">

                        {{$khachSan->ma_khach_san}}

                    </td>

                    {{-- Tên --}}
                    <td class="px-4 py-4">

                        <div class="max-w-[240px] truncate font-medium">

                            {{ $khachSan->ten_khach_san }}

                        </div>

                    </td>

                    {{-- Địa điểm --}}
                    <td class="px-4 py-4">

                        {{ $khachSan->diaDiem->ten_dia_diem ?? '-' }}

                    </td>

                    {{-- Sao --}}
                    <td class="px-4 py-4 text-center">

                        @for($i=1;$i<=$khachSan->so_sao_khach_san;$i++)

                            ⭐

                            @endfor

                    </td>

                    {{-- Trạng thái --}}
                    <td class="px-4 py-4 text-center">

                        @switch($khachSan->trang_thai_duyet)

                        @case('ChoDuyet')

                        <span
                            class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-700">

                            Chờ duyệt

                        </span>

                        @break

                        @case('DaDuyet')

                        <span
                            class="inline-flex rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700">

                            Đã duyệt

                        </span>

                        @break

                        @case('TuChoi')

                        <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-sm font-semibold text-red-700">

                            Bị từ chối

                        </span>

                        @break

                        @endswitch

                    </td>

                    {{-- Ngày gửi --}}
                    <td class="px-4 py-4 text-center">

                        {{ optional($khachSan->ngay_gui_duyet)->format('d/m/Y') }}

                    </td>

                    {{-- Thao tác --}}
                    <td class="px-4 py-4">

                        <div class="flex justify-center gap-3">

                            {{-- Chi tiết --}}
                            <a href="{{route('doitac.khachsan.show', $khachSan->ma_khach_san)}}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 transition"
                                title="Chi tiết">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            {{-- Chỉ sửa khi bị từ chối --}}
                            @if($khachSan->trang_thai_duyet == 'TuChoi')

                            <a href=" {{ route('doitac.khachsan.edit', $khachSan->ma_khach_san) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200 transition"
                                title="Chỉnh sửa">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            @endif

                            {{-- Chỉ xóa khi đang chờ duyệt --}}
                            @if($khachSan->trang_thai_duyet == 'ChoDuyet')

                            <form action=" {{ route('doitac.khachsan.destroy', $khachSan->ma_khach_san) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa khách sạn này?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 transition"
                                    title="Xóa">

                                    <i class="fa-solid fa-trash text-xs"></i>

                                </button>

                            </form>

                            @endif

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="py-16 text-center text-slate-500">

                        Chưa có khách sạn nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>