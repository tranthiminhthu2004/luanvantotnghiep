<div class="bg-white rounded-2xl shadow-sm p-4 mb-6">

    <form id="filterForm" method="GET" action="{{ route('admin.datphong.index') }}">

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-6 gap-3">

            <!-- Mã đặt phòng -->
            <input type="text" name="ma_dat_phong" value="{{ request('ma_dat_phong') }}" placeholder="Mã đặt phòng..."
                onkeydown="if(event.key==='Enter'){this.form.submit();}"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

            <!-- Khách hàng -->
            <input type="text" name="khach_hang" value="{{ request('khach_hang') }}" placeholder="Tên khách hàng..."
                onkeydown="if(event.key==='Enter'){this.form.submit();}"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

            <!-- Khách sạn -->
            <select name="ma_khach_san" onchange="this.form.submit()"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

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
            <select name="trang_thai_dat_phong" onchange="this.form.submit()"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

                <option value="">
                    Tất cả trạng thái
                </option>

                <option value="DaXacNhan" {{ request('trang_thai_dat_phong') == 'DaXacNhan' ? 'selected' : '' }}>

                    Đã xác nhận

                </option>

                <option value="DaNhanPhong" {{ request('trang_thai_dat_phong') == 'DaNhanPhong' ? 'selected' : '' }}>

                    Đã nhận phòng

                </option>

                <option value="DaTraPhong" {{ request('trang_thai_dat_phong') == 'DaTraPhong' ? 'selected' : '' }}>

                    Đã trả phòng

                </option>

                <option value="DaHuy" {{ request('trang_thai_dat_phong') == 'DaHuy' ? 'selected' : '' }}>

                    Đã hủy

                </option>

                <option value="KhongDen" {{ request('trang_thai_dat_phong') == 'KhongDen' ? 'selected' : '' }}>

                    Không đến

                </option>

            </select>

            <!-- Sắp xếp -->
            <select name="sap_xep" onchange="this.form.submit()"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

                <option value="desc" {{ request('sap_xep','desc') == 'desc' ? 'selected' : '' }}>

                    Mới nhất

                </option>

                <option value="asc" {{ request('sap_xep') == 'asc' ? 'selected' : '' }}>

                    Cũ nhất

                </option>

            </select>

            <!-- Xóa lọc -->
            <a href="{{ route('admin.datphong.index') }}"
                class="bg-red-50 text-red-600 rounded-xl text-sm font-medium hover:bg-red-100 flex items-center justify-center gap-2 py-2">

                <i class="fa-solid fa-rotate-left"></i>

                Xóa lọc

            </a>

        </div>

    </form>

</div>