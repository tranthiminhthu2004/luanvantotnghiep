<div class="bg-white rounded-2xl shadow-sm p-4 mb-6">

    <form id="filterForm" method="GET" action="{{ route('admin.phong.index') }}">

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-6 gap-3">

            <!-- Số phòng -->
            <!-- Số phòng -->
            <select name="so_phong" onchange="this.form.submit()"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

                <option value="">
                    Tất cả số phòng
                </option>

                @foreach($danhSachSoPhong as $phong)

                <option value="{{ $phong->so_phong }}" {{ request('so_phong') == $phong->so_phong ? 'selected' : '' }}>

                    {{ $phong->so_phong }}

                </option>

                @endforeach

            </select>

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

            <!-- Loại phòng -->
            <select name="ma_loai_phong" onchange="this.form.submit()"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

                <option value="">
                    Tất cả loại phòng
                </option>

                @foreach($loaiPhongs as $loaiPhong)

                <option value="{{ $loaiPhong->ma_loai_phong }}"
                    {{ request('ma_loai_phong') == $loaiPhong->ma_loai_phong ? 'selected' : '' }}>

                    {{ $loaiPhong->ten_loai_phong }}

                </option>

                @endforeach

            </select>

            <!-- Trạng thái -->
            <select name="trang_thai_phong" onchange="this.form.submit()"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

                <option value=""
                    {{ request('trang_thai_phong') === null || request('trang_thai_phong') === '' ? 'selected' : '' }}>

                    Tất cả trạng thái

                </option>

                <option value="DangHoatDong" {{ request('trang_thai_phong') == 'DangHoatDong' ? 'selected' : '' }}>

                    Đang hoạt động

                </option>

                <option value="BaoTri" {{ request('trang_thai_phong') == 'BaoTri' ? 'selected' : '' }}>

                    Bảo trì

                </option>

                <option value="NgungHoatDong" {{ request('trang_thai_phong') == 'NgungHoatDong' ? 'selected' : '' }}>

                    Ngưng hoạt động

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
            <a href="{{ route('admin.phong.index') }}"
                class="bg-red-50 text-red-600 rounded-xl text-sm font-medium hover:bg-red-100 flex items-center justify-center gap-2 py-2">

                <i class="fa-solid fa-rotate-left"></i>

                Xóa lọc

            </a>

        </div>

    </form>

</div>