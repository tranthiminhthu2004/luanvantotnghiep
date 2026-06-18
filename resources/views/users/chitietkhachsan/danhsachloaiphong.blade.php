<div class="bg-white rounded-xl shadow p-5">

    <h2 class="font-bold text-2xl mb-5">

        Danh sách phòng

    </h2>

    @forelse($khachSan->loaiPhongs as $loaiPhong)

    <div class="border rounded-xl p-4 mb-4">

        <div class="flex gap-4">

            <img src="{{ $loaiPhong->hinhAnh->count()
        ? asset($loaiPhong->hinhAnh->first()->duong_dan_anh)
        : asset('images/phong1.jpg') }}" class="w-52 h-36 rounded-lg object-cover">

            <div class="flex-1">

                <h3 class="font-bold text-lg">

                    {{ $loaiPhong->ten_loai_phong }}

                </h3>

                <div class="text-gray-500 mt-2">

                    {{ $loaiPhong->so_nguoi_toi_da }} người •

                    {{ $loaiPhong->dien_tich }}m² •

                    {{ $loaiPhong->so_giuong }} giường

                </div>

                <div class="mt-3 text-gray-600">

                    {{ $loaiPhong->mo_ta }}

                </div>

            </div>

            <div class="w-60">

                <div class="text-right">

                    <div class="text-blue-600 font-bold text-2xl">

                        {{ number_format($loaiPhong->gia_co_ban,0,',','.') }}đ

                    </div>

                    <div class="text-gray-500">

                        / đêm

                    </div>

                </div>

                <div class="mt-3 text-sm text-green-600 font-medium text-right">

                    Còn {{ $loaiPhong->phongs->count() }} phòng

                </div>

                <div class="mt-3">

                    <label class="text-sm text-gray-500">

                        Số lượng phòng
                    </label>

                    <select class="w-full border rounded-lg px-3 py-2 mt-1">

                        @for($i = 1; $i <= $loaiPhong->phongs->count(); $i++)

                            <option value="{{ $i }}">

                                {{ $i }} phòng

                            </option>

                            @endfor

                    </select>

                </div>

                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg mt-3">

                    Đặt phòng

                </button>

            </div>

        </div>

    </div>

    @empty

    <div class="text-center py-8 text-gray-500">

        Khách sạn chưa có loại phòng nào

    </div>

    @endforelse

</div>