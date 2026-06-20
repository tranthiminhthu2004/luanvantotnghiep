<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="min-w-[1200px] w-full">

            <thead class="bg-slate-50">

                <tr class="text-left text-lg tracking-wider text-black">

                    <th class="px-6 py-4">
                        ID
                    </th>

                    <th class="px-6 py-4">
                        Hình ảnh
                    </th>

                    <th class="px-6 py-4">
                        Khách sạn
                    </th>

                    <th class="px-6 py-4">
                        Loại phòng
                    </th>

                    <th class="px-6 py-4 hidden lg:table-cell">
                        Diện tích
                    </th>

                    <th class="px-6 py-4 hidden lg:table-cell">
                        Giường
                    </th>

                    <th class="px-6 py-4 hidden lg:table-cell">
                        Số người
                    </th>

                    <th class="px-6 py-4">
                        Giá cơ bản
                    </th>

                    <th class="px-6 py-4">
                        Trạng thái
                    </th>

                    <th class="px-6 py-4 text-center">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($loaiPhongs as $loaiPhong)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- ID -->
                    <td class="px-6 py-4 font-semibold">

                        {{ $loaiPhong->ma_loai_phong }}

                    </td>

                    <!-- Hình ảnh -->
                    <td class="px-6 py-4">

                        @if($loaiPhong->hinhAnh->count())

                        <img src="{{ asset($loaiPhong->hinhAnh->first()->duong_dan_anh) }}"
                            class="w-24 h-16 object-cover rounded-xl border">

                        @else

                        <img src="{{ asset('images/no-room.jpg') }}" class="w-24 h-16 object-cover rounded-xl border">

                        @endif

                    </td>

                    <!-- Khách sạn -->
                    <td class="px-6 py-4">

                        <div class="max-w-[220px] truncate font-medium">

                            {{ $loaiPhong->khachSan->ten_khach_san }}

                        </div>

                    </td>

                    <!-- Loại phòng -->
                    <td class="px-6 py-4">

                        <div class="max-w-[180px] truncate font-semibold text-slate-800">

                            {{ $loaiPhong->ten_loai_phong }}

                        </div>

                    </td>

                    <!-- Diện tích -->
                    <td class="px-6 py-4 hidden lg:table-cell">

                        {{ $loaiPhong->dien_tich }} m²

                    </td>

                    <!-- Giường -->
                    <td class="px-6 py-4 hidden lg:table-cell">

                        {{ $loaiPhong->so_giuong }}

                    </td>

                    <!-- Số người -->
                    <td class="px-6 py-4 hidden lg:table-cell">

                        {{ $loaiPhong->so_nguoi_toi_da }}

                    </td>

                    <!-- Giá -->
                    <td class="px-6 py-4 font-bold text-blue-600 whitespace-nowrap">

                        {{ number_format($loaiPhong->gia_co_ban,0,',','.') }}đ

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-6 py-4">

                        @if($loaiPhong->trang_thai)

                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-medium">

                            Hoạt động

                        </span>

                        @else

                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-medium">

                            Tạm dừng

                        </span>

                        @endif

                    </td>

                    <!-- Thao tác -->
                    <td class="px-6 py-4">

                        <div class="flex flex-wrap justify-center gap-2">

                            <a href="{{ route('admin.loaiphong.show', $loaiPhong->ma_loai_phong) }}"
                                class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200">

                                <i class="fa-solid fa-eye"></i>

                            </a>

                            <a href="{{ route('admin.loaiphong.edit', $loaiPhong->ma_loai_phong) }}"
                                class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <a href="{{ route('admin.loaiphong.hinhanh.index', $loaiPhong->ma_loai_phong) }}"
                                class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center hover:bg-purple-200">

                                <i class="fa-solid fa-image"></i>

                            </a>
                            <a href="{{ route( 'admin.loaiphong.tiennghi', $loaiPhong->ma_loai_phong) }}"
                                class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center">

                                <i class="fa-solid fa-list-check"></i>

                            </a>

                            <form action="{{ route('admin.loaiphong.destroy', $loaiPhong->ma_loai_phong) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa loại phòng này?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="w-10 h-10 rounded-full bg-red-100 text-red-600 hover:bg-red-200">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="10" class="text-center py-10 text-gray-500">

                        Chưa có loại phòng nào

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>