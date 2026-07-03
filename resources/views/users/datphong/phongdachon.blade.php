{{-- DANH SÁCH PHÒNG ĐÃ CHỌN --}}

<section>

    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-6">

        Danh sách phòng đã chọn

    </h2>

    <div class="overflow-hidden rounded-xl border border-slate-200">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[760px]">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">

                            Loại phòng

                        </th>

                        <th class="px-4 py-4 text-center text-sm font-semibold text-slate-700">

                            Số lượng

                        </th>

                        <th class="px-4 py-4 text-right text-sm font-semibold text-slate-700">

                            Đơn giá (1 đêm)

                        </th>

                        <th class="px-4 py-4 text-center text-sm font-semibold text-slate-700">

                            Số đêm

                        </th>

                        <th class="px-6 py-4 text-right text-sm font-semibold text-slate-700">

                            Thành tiền

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($phongsDaChon as $phong)

                    <tr class="border-t border-slate-200 hover:bg-slate-50 transition">

                        <td class="px-6 py-4">

                            <div class="font-semibold text-slate-800">

                                {{ $phong['ten_loai_phong'] }}

                            </div>

                        </td>

                        <td class="px-4 py-4 text-center text-slate-700">

                            {{ $phong['so_luong'] }} phòng

                        </td>

                        <td class="px-4 py-4 text-right text-slate-700">

                            {{ number_format($phong['gia'],0,',','.') }}đ

                        </td>

                        <td class="px-4 py-4 text-center text-slate-700">

                            {{ $soDem }} đêm

                        </td>

                        <td class="px-6 py-4 text-right font-bold text-slate-800">

                            {{ number_format($phong['thanh_tien'],0,',','.') }}đ

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="border-t border-slate-200 bg-slate-50 px-6 py-5">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                <div class="flex justify-between items-center">

                    <span class="text-lg font-semibold text-slate-700">

                        Tổng tiền phòng

                    </span>

                    <span class="text-2xl font-bold text-blue-600 ml-6">

                        {{ number_format($tongTien,0,',','.') }}đ

                    </span>

                </div>

                <button type="submit" form="datPhongForm"
                    class="w-full lg:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl transition duration-300">

                    <i class="fa-solid fa-calendar-check mr-2"></i>

                    Đặt phòng

                </button>

            </div>

        </div>

    </div>

</section>