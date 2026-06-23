<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="px-6 py-5 border-b">

        <h2 class="text-2xl font-bold">
            Danh sách phòng đã chọn
        </h2>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-50">

                <tr>

                    <th class="px-6 py-4 text-left font-semibold text-gray-700">
                        Loại phòng
                    </th>

                    <th class="px-4 py-4 text-center font-semibold text-gray-700">
                        Số lượng
                    </th>

                    <th class="px-4 py-4 text-right font-semibold text-gray-700">
                        Đơn giá (1 đêm)
                    </th>

                    <th class="px-4 py-4 text-center font-semibold text-gray-700">
                        Số đêm
                    </th>

                    <th class="px-6 py-4 text-right font-semibold text-gray-700">
                        Thành tiền
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($phongsDaChon as $phong)

                <tr class="border-t">

                    <td class="px-6 py-4">

                        <div class="flex items-center gap-3">

                            <div>

                                <div class="font-semibold">

                                    {{ $phong['ten'] }}

                                </div>

                            </div>

                        </div>

                    </td>

                    <td class="px-4 py-4 text-center">

                        {{ $phong['so_luong'] }} phòng

                    </td>

                    <td class="px-4 py-4 text-right">

                        {{ number_format($phong['gia'],0,',','.') }}đ

                    </td>

                    <td class="px-4 py-4 text-center">

                        {{ $soDem }} đêm

                    </td>

                    <td class="px-6 py-4 text-right font-bold">

                        {{ number_format($phong['thanh_tien'],0,',','.') }}đ

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="border-t bg-gray-50 px-6 py-4">

        <div class="flex justify-between items-center">

            <span class="text-lg font-semibold">

                Tổng tiền phòng

            </span>

            <span class="text-2xl font-bold text-blue-600">

                {{ number_format($tongTien,0,',','.') }}đ

            </span>

        </div>

    </div>


</div>