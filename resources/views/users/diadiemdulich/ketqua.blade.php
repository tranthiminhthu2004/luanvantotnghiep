<section class="bg-white rounded-3xl border border-slate-100 shadow-sm p-5 lg:p-7">

    <div class="mb-6">

        <h2 class="text-3xl font-bold text-[#1040C5]">

            Kết quả gợi ý

        </h2>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- DANH SÁCH KẾT QUẢ --}}
        <div class="lg:col-span-2">

            @if(count($ketQuaGoiY) > 0)

            <div class="space-y-4">

                @foreach($ketQuaGoiY as $index => $ketQua)

                @php
                $diaDiem = $ketQua['dia_diem'];

                $phanTram = $ketQua['phan_tram'];
                @endphp

                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-4 hover:shadow-md transition">

                    <div class="flex flex-col md:flex-row md:items-center gap-4">

                        {{-- Số thứ tự --}}
                        <div class="flex items-center gap-4 flex-1">

                            <div
                                class="w-12 h-12 rounded-full bg-[#1040C5] text-white flex items-center justify-center font-bold text-lg shrink-0">

                                {{ $index + 1 }}

                            </div>

                            <div class="flex-1 min-w-0">

                                <h3 class="text-xl font-bold text-[#061755]">

                                    {{ $diaDiem->ten_dia_diem }}

                                </h3>

                                <p class="text-sm text-gray-500 mt-1 leading-6">

                                    Điểm đến được hệ thống gợi ý dựa trên mức độ tương đồng
                                    với các nhu cầu du lịch bạn đã chọn.

                                </p>

                            </div>

                        </div>

                        {{-- Phần trăm phù hợp --}}
                        <div class="md:w-40 text-left md:text-right">

                            <p class="text-2xl font-bold text-green-500">

                                {{ $phanTram }}%

                            </p>

                            <p class="text-sm text-gray-500">

                                Mức độ phù hợp

                            </p>

                        </div>

                    </div>

                    {{-- Thanh phần trăm --}}
                    <div class="mt-4">

                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">

                            <div class="h-full bg-green-500 rounded-full" style="width: {{ $phanTram }}%">
                            </div>

                        </div>

                    </div>

                    {{-- Nút chuyển sang trang kết quả tìm kiếm --}}
                    <div class="mt-4">

                        <a href="{{ route('timkiem.trangchu', ['ma_dia_diem' => $diaDiem->ma_dia_diem]) }}"
                            class="inline-flex items-center justify-center gap-2 text-[#1040C5] font-semibold hover:underline">

                            Xem địa điểm du lịch và khách sạn

                            <i class="fa-solid fa-arrow-right text-sm"></i>

                        </a>

                    </div>

                </div>

                @endforeach

            </div>

            @else

            <div class="border border-dashed border-slate-300 rounded-3xl p-10 text-center">

                <div class="w-20 h-20 rounded-full bg-blue-50 text-[#1040C5] flex items-center justify-center mx-auto">

                    <i class="fa-solid fa-map-location-dot text-3xl"></i>

                </div>

                <h3 class="text-2xl font-bold text-slate-700 mt-5">

                    Chưa tìm thấy điểm đến phù hợp

                </h3>

                <p class="text-gray-500 mt-2">

                    Bạn thử chọn thêm nhu cầu hoặc thay đổi mức độ ưu tiên.

                </p>

            </div>

            @endif

        </div>

        {{-- THÔNG TIN BÊN PHẢI --}}
        <div class="space-y-5">


            {{-- Nhu cầu đã chọn --}}
            @if(isset($nhuCauDaChon) && $nhuCauDaChon->count() > 0)

            <div class="bg-white border border-slate-100 rounded-3xl p-5">

                <h3 class="font-bold text-[#061755] flex items-center gap-2">

                    <i class="fa-solid fa-list-check text-[#1040C5]"></i>

                    Nhu cầu đã chọn

                </h3>

                <div class="mt-4 space-y-3">

                    @foreach($nhuCauDaChon as $nhuCau)

                    @php
                    $mucDo = $mucDoUuTienNguoiDung[$nhuCau->ma_nhu_cau] ?? null;
                    @endphp

                    <div class="flex items-center justify-between gap-3 bg-slate-50 rounded-2xl px-4 py-3">

                        <span class="text-sm font-semibold text-[#061755]">

                            {{ $nhuCau->ten_nhu_cau }}

                        </span>

                        @if($mucDo)

                        <span class="text-sm font-bold text-[#1040C5]">

                            {{ $mucDo }}/5

                        </span>

                        @endif

                    </div>

                    @endforeach

                </div>

            </div>

            @endif

        </div>

    </div>

</section>