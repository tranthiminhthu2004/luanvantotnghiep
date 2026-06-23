<form method="POST" action="{{ route('datphong.xacnhan') }}">
    @csrf

    <input type="hidden" name="ma_khach_san" value="{{ $khachSan->ma_khach_san }}">

    <input type="hidden" name="ngay_nhan_phong" value="{{ request('ngay_nhan_phong') }}">

    <input type="hidden" name="ngay_tra_phong" value="{{ request('ngay_tra_phong') }}">

    <input type="hidden" name="so_nguoi_truong_thanh" value="{{ request('so_nguoi_truong_thanh') }}">

    <input type="hidden" name="so_tre_em" value="{{ request('so_tre_em') }}">

    <input type="hidden" name="so_nguoi_cao_tuoi" value="{{ request('so_nguoi_cao_tuoi') }}">
    <div class="grid grid-cols-12 gap-6">

        {{-- DANH SÁCH PHÒNG --}}
        <div class="col-span-12 lg:col-span-8">

            {{-- PHÒNG ĐỀ XUẤT --}}
            <div class="bg-white rounded-2xl shadow p-6 mb-6">

                <h2 class="text-3xl font-bold mb-5">

                    Loại phòng được đề xuất

                </h2>

                @forelse($loaiPhongsDeXuat as $loaiPhong)

                <div class="border rounded-2xl p-4 mb-4 room-item" data-id="{{ $loaiPhong->ma_loai_phong }}"
                    data-name="{{ $loaiPhong->ten_loai_phong }}" data-price="{{ $loaiPhong->gia_co_ban }}">

                    <div class="flex gap-4">

                        <img src="{{ $loaiPhong->hinhAnh->count()
                            ? asset($loaiPhong->hinhAnh->first()->duong_dan_anh)
                            : asset('images/phong1.jpg') }}" class="w-56 h-40 rounded-xl object-cover">

                        <div class="flex-1">

                            <h3 class="font-bold text-xl">

                                {{ $loaiPhong->ten_loai_phong }}

                            </h3>

                            <div class="text-gray-500 mt-2">

                                {{ $loaiPhong->so_nguoi_toi_da }} người •

                                {{ $loaiPhong->dien_tich }}m² •

                                {{ $loaiPhong->so_giuong }} giường

                            </div>

                            <p class="mt-3 text-gray-600">

                                {{ $loaiPhong->mo_ta }}

                            </p>

                        </div>

                        <div class="w-64 flex flex-col items-end">

                            <div class="text-right">

                                <div class="text-blue-600 font-bold text-3xl">

                                    {{ number_format($loaiPhong->gia_co_ban,0,',','.') }}đ

                                </div>

                                <div class="text-gray-500">

                                    / đêm

                                </div>

                            </div>

                            <div class="mt-3 text-green-600 font-medium">

                                Còn {{ $loaiPhong->phongs->count() }} phòng

                            </div>

                            <div class="mt-6 w-full">

                                <label class="block text-sm text-gray-500 mb-2 text-right">

                                    Số lượng phòng

                                </label>

                                <div class="flex justify-end">

                                    <div class="flex border rounded-full overflow-hidden">

                                        <button type="button" onclick="changeRoom({{ $loaiPhong->ma_loai_phong }},-1)"
                                            class="w-12 h-10 bg-gray-50 hover:bg-gray-100">

                                            -

                                        </button>

                                        <input type="text" readonly value="0" id="room_{{ $loaiPhong->ma_loai_phong }}"
                                            class="w-14 text-center border-x">

                                        <input type="hidden" name="phong[{{ $loaiPhong->ma_loai_phong }}]" value="0"
                                            id="hidden_room_{{ $loaiPhong->ma_loai_phong }}">

                                        <button type="button" onclick="changeRoom({{ $loaiPhong->ma_loai_phong }},1)"
                                            class="w-12 h-10 bg-gray-50 hover:bg-gray-100">

                                            +

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                @empty

                <div class="text-center text-gray-500 py-8">

                    Không có loại phòng được đề xuất

                </div>

                @endforelse

            </div>

            {{-- TẤT CẢ PHÒNG --}}
            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="text-3xl font-bold mb-5">

                    Tất cả loại phòng

                </h2>

                @foreach($khachSan->loaiPhongs as $loaiPhong)

                <div class="border rounded-2xl p-4 mb-4">

                    <div class="flex gap-4">

                        <img src="{{ $loaiPhong->hinhAnh->count()
                            ? asset($loaiPhong->hinhAnh->first()->duong_dan_anh)
                            : asset('images/phong1.jpg') }}" class="w-56 h-40 rounded-xl object-cover">

                        <div class="flex-1">

                            <h3 class="font-bold text-xl">

                                {{ $loaiPhong->ten_loai_phong }}

                            </h3>

                            <div class="text-gray-500 mt-2">

                                {{ $loaiPhong->so_nguoi_toi_da }} người •

                                {{ $loaiPhong->dien_tich }}m² •

                                {{ $loaiPhong->so_giuong }} giường

                            </div>

                            <p class="mt-3 text-gray-600">

                                {{ $loaiPhong->mo_ta }}

                            </p>

                        </div>

                        <div class="w-64">

                            <div class="text-right">

                                <div class="text-blue-600 font-bold text-3xl">

                                    {{ number_format($loaiPhong->gia_co_ban,0,',','.') }}đ

                                </div>

                                <div class="text-gray-500">

                                    / đêm

                                </div>

                            </div>

                            <div class="text-right mt-2 text-green-600 font-medium">

                                Còn {{ $loaiPhong->phongs->count() }} phòng

                            </div>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        {{-- GIỎ ĐẶT PHÒNG --}}
        <div class="col-span-12 lg:col-span-4">

            <div class="bg-white rounded-2xl shadow p-6 sticky top-24">

                <h3 class="text-2xl font-bold mb-4">

                    Giỏ đặt phòng

                </h3>

                <div id="selectedRooms">

                    <p class="text-gray-500">

                        Chưa chọn phòng nào

                    </p>

                </div>

                <hr class="my-4">

                <div class="flex justify-between">

                    <span>Tổng phòng</span>

                    <span id="totalRooms">0</span>

                </div>

                <div class="flex justify-between mt-3">

                    <span>Tổng tiền dự kiến</span>

                    <span id="totalPrice">0đ</span>

                </div>

                <button type="submit" class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl">

                    Tiếp tục đặt phòng

                </button>

            </div>

        </div>

    </div>
</form>
<script>
function changeRoom(id, amount) {
    const input =
        document.getElementById(
            'room_' + id
        );

    let current =
        parseInt(input.value);

    current += amount;

    if (current < 0) {
        current = 0;
    }

    input.value = current;

    document.getElementById(
        'hidden_room_' + id
    ).value = current;

    updateCart();
}

function updateCart() {
    let totalRooms = 0;
    let totalPrice = 0;

    let html = '';

    document
        .querySelectorAll('.room-item')
        .forEach(room => {
            const id =
                room.dataset.id;

            const name =
                room.dataset.name;

            const price =
                parseInt(
                    room.dataset.price
                );

            const input =
                document.getElementById(
                    'room_' + id
                );

            if (!input) {
                return;
            }

            const quantity =
                parseInt(
                    input.value
                );

            if (quantity > 0) {
                const thanhTien =
                    quantity * price;

                totalRooms += quantity;

                totalPrice += thanhTien;

                html += `
                    <div class="mb-3 pb-3 border-b">

                        <div class="font-semibold">
                            ${name}
                        </div>

                        <div class="text-sm text-gray-500">
                            ${quantity} phòng
                        </div>

                        <div class="text-blue-600 font-bold">
                            ${thanhTien.toLocaleString('vi-VN')}đ
                        </div>

                    </div>
                `;
            }
        });

    if (html === '') {
        html =
            `
        <p class="text-gray-500">
            Chưa chọn phòng nào
        </p>
        `;
    }

    document.getElementById(
        'selectedRooms'
    ).innerHTML = html;

    document.getElementById(
        'totalRooms'
    ).innerText = totalRooms;

    document.getElementById(
            'totalPrice'
        ).innerText =
        totalPrice.toLocaleString('vi-VN') + 'đ';
}

updateCart();
</script>