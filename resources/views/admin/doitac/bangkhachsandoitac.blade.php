<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[1100px] border-collapse">

            <thead class="bg-slate-50">

                <tr class="text-left whitespace-nowrap">

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Mã
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Chủ khách sạn
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Khách sạn
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Địa điểm
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-black">
                        Ngày gửi
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-center text-black">
                        Trạng thái
                    </th>

                    <th class="px-4 py-4 text-base font-semibold text-center text-black">
                        Thao tác
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($doiTacs as $doiTac)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- Mã -->
                    <td class="px-4 py-4 text-base font-semibold text-black">

                        {{ $doiTac->ma_khach_san }}

                    </td>

                    <!-- Chủ khách sạn -->
                    <td class="px-4 py-4">

                        <div class="font-medium text-black">

                            {{ $doiTac->nguoiDung->ho_va_ten_dem ?? '' }}
                            {{ $doiTac->nguoiDung->ten ?? '' }}

                        </div>

                    </td>

                    <!-- Khách sạn -->
                    <td class="px-4 py-4">

                        <div class="max-w-[250px] truncate font-medium text-black">

                            {{ $doiTac->ten_khach_san }}

                        </div>

                    </td>

                    <!-- Địa điểm -->
                    <td class="px-4 py-4">

                        {{ $doiTac->diaDiem->ten_dia_diem ?? '' }}

                    </td>

                    <!-- Ngày gửi -->
                    <td class="px-4 py-4">

                        {{ optional($doiTac->ngay_gui_duyet)->format('d/m/Y H:i') }}

                    </td>

                    <!-- Trạng thái -->
                    <td class="px-4 py-4 text-center">

                        @if($doiTac->trang_thai_duyet == 'ChoDuyet')

                        <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-medium">

                            Chờ duyệt

                        </span>

                        @elseif($doiTac->trang_thai_duyet == 'DaDuyet')

                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-medium">

                            Đã duyệt

                        </span>

                        @else

                        <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-medium">

                            Từ chối

                        </span>

                        @endif

                    </td>

                    <!-- Thao tác -->
                    <td class="px-4 py-4">

                        <div class="flex items-center justify-center gap-4 whitespace-nowrap">

                            <!-- Xem -->
                            <a href="{{ route('admin.doitac.show',$doiTac->ma_khach_san) }}" class=" w-8 h-8 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 flex
                                items-center justify-center transition" title="Chi tiết">

                                <i class="fa-solid fa-eye text-xs"></i>

                            </a>


                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="py-12 text-center text-base text-gray-500">

                        Chưa có hồ sơ đối tác nào.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($doiTacs->hasPages())

    <div class="border-t px-4 py-4">

        <div class="flex justify-center">

            {{ $doiTacs->onEachSide(1)->links() }}

        </div>

    </div>

    @endif

</div>