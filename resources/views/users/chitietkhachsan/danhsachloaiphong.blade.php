<form method="POST" action="{{ route('datphong.xacnhan') }}">
    @csrf

    <input type="hidden" name="ma_khach_san" value="{{ $khachSan->ma_khach_san }}">

    <input type="hidden" name="ngay_nhan_phong" value="{{ request('ngay_nhan_phong') }}">

    <input type="hidden" name="ngay_tra_phong" value="{{ request('ngay_tra_phong') }}">

    <input type="hidden" name="so_nguoi_truong_thanh" value="{{ request('so_nguoi_truong_thanh') }}">

    <input type="hidden" name="so_tre_em" value="{{ request('so_tre_em') }}">

    <input type="hidden" name="so_nguoi_cao_tuoi" value="{{ request('so_nguoi_cao_tuoi') }}">

    <div class="grid grid-cols-12 gap-8">

        {{-- DANH SÁCH LOẠI PHÒNG --}}
        <div class="col-span-12 lg:col-span-8">

            <div class="bg-white rounded-3xl shadow border border-gray-100 p-6">

                <div class="flex items-center justify-between mb-6">

                    <div>

                        <h2 class="text-3xl font-bold">

                            Chọn loại phòng

                        </h2>

                    </div>

                    <div class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">

                        {{ $khachSan->loaiPhongs->count() }}
                        loại phòng

                    </div>

                </div>

                @foreach($khachSan->loaiPhongs as $loaiPhong)

                <div class="room-item border rounded-3xl p-5 mb-6 hover:shadow-lg transition"
                    data-id="{{ $loaiPhong->ma_loai_phong }}" data-name="{{ $loaiPhong->ten_loai_phong }}"
                    data-price="{{ $loaiPhong->gia_co_ban }}" data-stock="{{ $loaiPhong->soPhongConLai }}">

                    <div class="flex gap-6">

                        {{-- ẢNH --}}
                        <div class="relative flex-shrink-0">

                            @if($loaiPhong->so_nguoi_toi_da >= $sucChuaCanThiet)

                            <span
                                class="absolute left-3 top-3 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full">

                                Đề xuất

                            </span>

                            @endif

                            <img src="{{ $loaiPhong->hinhAnh->count()
                                ? asset($loaiPhong->hinhAnh->first()->duong_dan_anh)
                                : asset('images/phong1.jpg') }}" class="w-64 h-44 rounded-2xl object-cover">

                        </div>

                        {{-- THÔNG TIN --}}
                        <div class="flex-1">
                            <div class="flex justify-between items-start">

                                <div>

                                    <h3 class="text-2xl font-bold text-gray-800">

                                        {{ $loaiPhong->ten_loai_phong }}

                                    </h3>

                                    <div class="flex flex-wrap items-center gap-5 mt-3 text-gray-500">

                                        <span>

                                            <i class="fa-solid fa-users text-blue-500"></i>

                                            {{ $loaiPhong->so_nguoi_toi_da }} người

                                        </span>

                                        <span>

                                            <i class="fa-regular fa-square text-blue-500"></i>

                                            {{ $loaiPhong->dien_tich }} m²

                                        </span>

                                        <span>

                                            <i class="fa-solid fa-bed text-blue-500"></i>

                                            {{ $loaiPhong->so_giuong }} giường

                                        </span>

                                    </div>

                                </div>

                                <div class="text-right">

                                    <div class="text-3xl font-bold text-blue-600">

                                        {{ number_format($loaiPhong->gia_co_ban,0,',','.') }}đ

                                    </div>

                                    <div class="text-gray-500">

                                        / đêm

                                    </div>

                                </div>

                            </div>

                            @if($loaiPhong->mo_ta)

                            <p class="mt-5 text-gray-600 leading-7">

                                {{ $loaiPhong->mo_ta }}

                            </p>

                            @endif

                            @if($loaiPhong->tienNghis->count())

                            <div class="mt-5">

                                <div class="text-sm font-semibold text-gray-700 mb-3">

                                    Tiện nghi phòng

                                </div>

                                <div class="flex flex-wrap gap-3">

                                    @foreach($loaiPhong->tienNghis as $tienNghi)

                                    <span
                                        class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 transition px-4 py-2 rounded-full text-sm text-gray-700">

                                        @if($tienNghi->icon)

                                        <i class="{{ $tienNghi->icon }}"></i>

                                        @else

                                        <i class="fa-solid fa-circle-check text-green-600"></i>

                                        @endif

                                        {{ $tienNghi->ten_tien_nghi }}

                                    </span>

                                    @endforeach

                                </div>

                            </div>

                            @endif
                            <div class="mt-6">

                                @if($loaiPhong->soPhongConLai > 0)

                                <div class="flex items-center justify-between">

                                    <div>

                                        <span
                                            class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">

                                            <i class="fa-solid fa-circle-check"></i>

                                            Còn {{ $loaiPhong->soPhongConLai }} phòng

                                        </span>

                                    </div>

                                    <div>

                                        <div class="text-sm text-gray-500 text-center mb-2">

                                            Chọn số lượng

                                        </div>

                                        <div class="flex items-center border rounded-xl overflow-hidden shadow-sm">

                                            <button type="button"
                                                onclick="changeRoom({{ $loaiPhong->ma_loai_phong }},-1)"
                                                class="w-12 h-11 bg-gray-100 hover:bg-gray-200 transition">

                                                <i class="fa-solid fa-minus"></i>

                                            </button>

                                            <input id="room_{{ $loaiPhong->ma_loai_phong }}" type="text" readonly
                                                value="0" class="w-16 text-center font-bold border-x">

                                            <input type="hidden" id="hidden_room_{{ $loaiPhong->ma_loai_phong }}"
                                                name="phong[{{ $loaiPhong->ma_loai_phong }}]" value="0">

                                            <button type="button"
                                                onclick="changeRoom({{ $loaiPhong->ma_loai_phong }},1)"
                                                class="w-12 h-11 bg-gray-100 hover:bg-gray-200 transition">

                                                <i class="fa-solid fa-plus"></i>

                                            </button>

                                        </div>

                                    </div>

                                </div>

                                @else

                                <div class="bg-red-50 border border-red-200 rounded-2xl p-5 flex items-center gap-4">

                                    <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">

                                        <i class="fa-solid fa-circle-xmark text-red-600 text-2xl"></i>

                                    </div>

                                    <div>

                                        <div class="font-bold text-red-700 text-lg">

                                            Hết phòng

                                        </div>

                                        <div class="text-red-500">

                                            Loại phòng này đã hết trong khoảng thời gian bạn chọn.

                                        </div>

                                    </div>

                                </div>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        {{-- CỘT BÊN PHẢI --}}
        <div class="col-span-12 lg:col-span-4">

            <div class="sticky top-24 space-y-5">

                {{-- THÔNG TIN ĐẶT PHÒNG --}}
                <div class="bg-white rounded-3xl shadow border border-gray-100 p-6 max-h-[900px] overflow-y-auto">

                    <h3 class="text-2xl font-bold mb-5">

                        Thông tin đặt phòng

                    </h3>

                    <div class="space-y-4">

                        <div class="flex justify-between">

                            <span class="text-gray-500">

                                <i class="fa-regular fa-calendar-check mr-2 text-blue-600"></i>

                                Nhận phòng

                            </span>

                            <span class="font-semibold">

                                {{ request('ngay_nhan_phong') }}

                            </span>

                        </div>

                        <div class="flex justify-between">

                            <span class="text-gray-500">

                                <i class="fa-regular fa-calendar-xmark mr-2 text-blue-600"></i>

                                Trả phòng

                            </span>

                            <span class="font-semibold">

                                {{ request('ngay_tra_phong') }}

                            </span>

                        </div>

                        <hr>

                        <div class="flex justify-between">

                            <span class="text-gray-500">

                                <i class="fa-solid fa-user mr-2 text-blue-600"></i>

                                Người lớn

                            </span>

                            <span class="font-semibold">

                                {{ request('so_nguoi_truong_thanh') }}

                            </span>

                        </div>

                        <div class="flex justify-between">

                            <span class="text-gray-500">

                                <i class="fa-solid fa-child mr-2 text-blue-600"></i>

                                Trẻ em

                            </span>

                            <span class="font-semibold">

                                {{ request('so_tre_em') }}

                            </span>

                        </div>

                        <div class="flex justify-between">

                            <span class="text-gray-500">

                                <i class="fa-solid fa-person-cane mr-2 text-blue-600"></i>

                                Người cao tuổi

                            </span>

                            <span class="font-semibold">

                                {{ request('so_nguoi_cao_tuoi') }}

                            </span>

                        </div>

                    </div>

                </div>

                {{-- GIỎ ĐẶT PHÒNG --}}
                <div class="bg-white rounded-3xl shadow border border-gray-100 p-6">

                    <h3 class="text-2xl font-bold mb-5">

                        Giỏ đặt phòng

                    </h3>

                    <div id="selectedRooms">

                        <div class="text-center py-8 text-gray-400">

                            <i class="fa-solid fa-cart-shopping text-4xl mb-3"></i>

                            <p>

                                Bạn chưa chọn loại phòng nào

                            </p>

                        </div>

                    </div>

                    <hr class="my-5">

                    <div class="space-y-3">

                        <div class="flex justify-between">

                            <span>

                                Tổng số phòng

                            </span>

                            <span id="totalRooms" class="font-bold">

                                0

                            </span>

                        </div>

                        <div class="flex justify-between text-xl">

                            <span class="font-semibold">

                                Tổng tiền

                            </span>

                            <span id="totalPrice" class="font-bold text-blue-600">

                                0đ

                            </span>

                        </div>

                    </div>

                    <button id="btnDatPhong" type="submit" disabled
                        class="w-full mt-6 py-3 rounded-xl bg-gray-400 text-white font-semibold cursor-not-allowed">

                        Tiếp tục đặt phòng

                    </button>

                </div>

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

    const hidden =
        document.getElementById(
            'hidden_room_' + id
        );

    const room =
        document.querySelector(
            '.room-item[data-id="' + id + '"]'
        );

    const stock =
        parseInt(
            room.dataset.stock
        );

    let current =
        parseInt(
            input.value
        );

    current += amount;

    if (current < 0) {
        current = 0;
    }

    if (current > stock) {
        current = stock;

        alert(
            'Loại phòng này chỉ còn ' +
            stock +
            ' phòng.'
        );
    }

    input.value = current;

    hidden.value = current;

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

            const stock =
                parseInt(
                    room.dataset.stock
                );

            const quantity =
                parseInt(
                    document.getElementById(
                        'room_' + id
                    ).value
                );

            if (quantity > 0) {
                const thanhTien =
                    quantity * price;

                totalRooms += quantity;

                totalPrice += thanhTien;

                html += `
                    <div class="border-b pb-4 mb-4">

                        <div class="flex justify-between">

                            <div>

                                <div class="font-semibold">

                                    ${name}

                                </div>

                                <div class="text-sm text-gray-500">

                                    ${quantity} phòng

                                </div>

                                <div class="text-xs text-green-600">

                                    Còn ${stock} phòng

                                </div>

                            </div>

                            <div class="text-right">

                                <div class="font-bold text-blue-600">

                                    ${thanhTien.toLocaleString('vi-VN')}đ

                                </div>

                            </div>

                        </div>

                    </div>
                `;
            }

        });

    if (html === '') {
        html = `
            <div class="text-center py-8 text-gray-400">

                <i class="fa-solid fa-cart-shopping text-4xl mb-3"></i>

                <p>

                    Bạn chưa chọn loại phòng nào

                </p>

            </div>
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

    const btn =
        document.getElementById(
            'btnDatPhong'
        );

    if (totalRooms > 0) {
        btn.disabled = false;

        btn.classList.remove(
            'bg-gray-400',
            'cursor-not-allowed'
        );

        btn.classList.add(
            'bg-blue-600',
            'hover:bg-blue-700'
        );
    } else {
        btn.disabled = true;

        btn.classList.remove(
            'bg-blue-600',
            'hover:bg-blue-700'
        );

        btn.classList.add(
            'bg-gray-400',
            'cursor-not-allowed'
        );
    }
}

updateCart();
</script>