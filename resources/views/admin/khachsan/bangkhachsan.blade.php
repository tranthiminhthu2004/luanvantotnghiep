<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">

        <table class="w-full min-w-[1100px]">

            <thead class="bg-slate-50 border-b">

                <tr class="text-left">

                    <th class="px-4 py-3 text-sm font-semibold text-black">
                        Mã khách sạn
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold  text-black">
                        Ảnh
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold  text-black">
                        Tên khách sạn
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold  text-black">
                        Địa điểm
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold  text-black">
                        Sao
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold  text-black">
                        Trạng thái
                    </th>

                    <th class="px-4 py-3 text-sm font-semibold  text-black">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($khachSans as $khachSan)

                <tr class="border-t hover:bg-slate-50 transition">

                    <td class="px-4 py-3 text-sm">
                        {{ $khachSan->ma_khach_san }}
                    </td>

                    <td class="px-4 py-3 align-middle">

                        @if($khachSan->hinhAnh->count())

                        <img src="{{ asset($khachSan->hinhAnh->first()->duong_dan_anh) }}"
                            class="w-24 h-16 object-cover rounded-lg border">

                        @endif

                    </td>

                    <td class="px-4 py-3 text-sm font-medium whitespace-nowrap">
                        {{ $khachSan->ten_khach_san }}
                    </td>

                    <td class="px-4 py-3 text-sm">
                        {{ $khachSan->diaDiem->ten_dia_diem ?? '-' }}
                    </td>

                    <td class="px-4 py-3 text-sm whitespace-nowrap">

                        @for($i = 1; $i <= $khachSan->so_sao_khach_san; $i++)

                            ⭐

                            @endfor

                    </td>

                    <td class="px-4 py-3">

                        @if($khachSan->trang_thai)

                        <span
                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">

                            Hoạt động

                        </span>

                        @else

                        <span
                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">

                            Tạm dừng

                        </span>

                        @endif

                    </td>

                    <td class="px-4 py-3">

                        <div class="flex items-center gap-2 whitespace-nowrap">

                            <a href="{{ route('admin.khachsan.show',$khachSan->ma_khach_san) }}"
                                class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>

                            <a href="{{ route('admin.khachsan.edit',$khachSan->ma_khach_san) }}"
                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center">

                                <i class="fa-solid fa-pen text-xs"></i>

                            </a>

                            <a href="{{ route('admin.hinhanh.index',$khachSan->ma_khach_san) }}"
                                class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center">

                                <i class="fa-solid fa-image text-xs"></i>

                            </a>

                            <a href="{{ route('admin.khachsan.tiennghi',$khachSan->ma_khach_san) }}"
                                class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center">

                                <i class="fa-solid fa-list-check text-xs"></i>

                            </a>

                            <form action="{{ route('admin.khachsan.destroy', $khachSan->ma_khach_san) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa khách sạn này?');">

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

                    <td colspan="7" class="text-center py-10 text-gray-500 text-sm">

                        Chưa có khách sạn nào

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-4 px-4 py-3 border-t">

        {{ $khachSans->links() }}

    </div>

</div>