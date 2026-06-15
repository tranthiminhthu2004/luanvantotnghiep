<div class="bg-white rounded-3xl shadow p-5 mb-6">

    <form method="GET" action="{{ route('admin.phong.index') }}">

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-4">

            <!-- Số phòng -->
            <input type="text" name="so_phong" placeholder="Số phòng..." value="{{ request('so_phong') }}"
                class="border rounded-full px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <!-- Khách sạn -->
            <select name="ma_khach_san" class="border rounded-full px-5 py-3">

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
            <select name="ma_loai_phong" class="border rounded-full px-5 py-3">

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
            <select name="trang_thai_phong" class="border rounded-full px-5 py-3">

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

            <!-- Button -->
            <button type="submit"
                class="bg-slate-100 hover:bg-slate-200 rounded-full flex items-center justify-center gap-2 px-5 py-3">

                <i class="fa-solid fa-filter"></i>

                Lọc

            </button>

        </div>

    </form>

</div>