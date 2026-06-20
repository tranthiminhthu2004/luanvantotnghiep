<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="min-w-[1000px] w-full">

            <thead class="bg-slate-50">

                <tr class="text-left">

                    <th class="px-6 py-4 text-lg">
                        ID
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Hình ảnh
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Tên khách sạn
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Địa điểm
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Số sao
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Trạng thái
                    </th>

                    <th class="px-6 py-4 text-lg">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($khachSans as $khachSan)

                <tr class="border-t hover:bg-slate-50">

                    <!-- ID -->
                    <td class="px-6 py-4 text-base">

                        {{ $khachSan->ma_khach_san }}

                    </td>

                    <!-- Hình ảnh -->
                    <td class="px-6 py-4">
                        @if($khachSan->hinhAnh->count())

                        <img src="{{ asset($khachSan->hinhAnh->first()->duong_dan_anh) }}"
                            class="w-24 h-16 object-cover rounded-xl">

                        @endif
                    </td>
                    <!-- Tên khách sạn -->
                    <td class="px-6 py-4 font-medium text-base">

                        {{ $khachSan->ten_khach_san }}

                    </td>

                    <!-- Địa điểm -->
                    <td class="px-6 py-4 text-base">

                        {{ $khachSan->diaDiem->ten_dia_diem ?? '-' }}

                    </td>


                    <!-- Số sao -->
                    <td class="px-6 py-4 text-base">

                        @for($i = 1; $i <= $khachSan->so_sao_khach_san; $i++)

                            ⭐

                            @endfor

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-6 py-4">

                        @if($khachSan->trang_thai)

                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-base">

                            Hoạt động

                        </span>

                        @else

                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-base">

                            Tạm dừng

                        </span>

                        @endif

                    </td>

                    <!-- Thao tác -->
                    <td class="px-6 py-4">

                        <div class="flex gap-4">

                            <a href="{{ route('admin.khachsan.show',$khachSan->ma_khach_san) }}"
                                class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">

                                <i class="fa-solid fa-eye"></i>

                            </a>

                            <a href="{{ route('admin.khachsan.edit',$khachSan->ma_khach_san) }}" class=" w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center
                                justify-center">

                                <i class="fa-solid fa-pen"></i>

                            </a>
                            <!-- Quản lý ảnh -->
                            <a href="{{ route('admin.hinhanh.index',$khachSan->ma_khach_san) }}"
                                class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center">

                                <i class="fa-solid fa-image"></i>

                            </a>
                            <a href="{{ route('admin.khachsan.tiennghi',$khachSan->ma_khach_san) }}"
                                class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center">

                                <i class="fa-solid fa-list-check"></i>

                            </a>
                            <form action="{{ route('admin.khachsan.destroy', $khachSan->ma_khach_san) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa khách sạn này?'  );">
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

                    <td colspan="7" class="text-center py-10 text-gray-500 text-base">

                        Chưa có khách sạn nào

                    </td>

                </tr>

                @endforelse

            </tbody>
        </table>

    </div>
    <div class="mt-6 px-6 py-4">
        {{ $khachSans->links() }}
    </div>
</div>