<div class="bg-white rounded-3xl shadow p-5 mb-6">

    <form method="GET" action="{{ route('admin.datphong.index') }}">

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-6 gap-4">

            <!-- Mã đơn -->
            <input type="text" name="ma_don_dat_phong" placeholder="Mã đơn..." value="{{ request('ma_don_dat_phong') }}"
                class="border rounded-full text-base px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <!-- Khách hàng -->
            <input type="text" name="khach_hang" placeholder="Tên khách hàng..." value="{{ request('khach_hang') }}"
                class="border rounded-full text-base px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <!-- Khách sạn -->
            <select name="ma_khach_san" class="border rounded-full text-base px-5 py-3">

                <option value="">
                    Tất cả khách sạn
                </option>

                @foreach($khachSans as $khachSan)

                <option value="{{ $khachSan->ma_khach_san }}"
                    {{ request('ma_khach_san') == $khachSan->ma_khach_san ? 'selected' : '' }}>

                    {{ $khachSan->ten_khach_san }}

                </option>

                @endforeach

            </select>

            <!-- Trạng thái -->
            <select name="trang_thai_dat_phong" class="border rounded-full text-base px-5 py-3">

                <option value="">
                    Tất cả trạng thái
                </option>

                <option value="ChoXacNhan" {{ request('trang_thai_dat_phong') == 'ChoXacNhan' ? 'selected' : '' }}>

                    Chờ xác nhận

                </option>

                <option value="DaXacNhan" {{ request('trang_thai_dat_phong') == 'DaXacNhan' ? 'selected' : '' }}>

                    Đã xác nhận

                </option>

                <option value="DaHuy" {{ request('trang_thai_dat_phong') == 'DaHuy' ? 'selected' : '' }}>

                    Đã hủy

                </option>

                <option value="HoanThanh" {{ request('trang_thai_dat_phong') == 'HoanThanh' ? 'selected' : '' }}>

                    Hoàn thành

                </option>

            </select>

            <!-- Sắp xếp -->
            <select name="sap_xep" class="border rounded-full text-base px-5 py-3">

                <option value="desc" {{ request('sap_xep','desc') == 'desc' ? 'selected' : '' }}>

                    Mới nhất

                </option>

                <option value="asc" {{ request('sap_xep') == 'asc' ? 'selected' : '' }}>

                    Cũ nhất

                </option>

            </select>

            <!-- Nút lọc -->
            <button type="submit"
                class="bg-slate-100 rounded-full text-base hover:bg-slate-200 flex items-center justify-center gap-2">

                <i class="fa-solid fa-filter"></i>

                Lọc

            </button>

        </div>

    </form>

</div>