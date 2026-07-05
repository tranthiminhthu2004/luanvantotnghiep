<div class="bg-white rounded-2xl shadow-sm p-5 md:p-6 mb-6">

    <form id="filterForm" method="GET" action="{{ route('admin.loaiphong.index') }}">

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-4">

            <!-- Tên loại phòng -->
            <select name="ten_loai_phong" onchange="this.form.submit()"
                class="w-full border border-slate-300 rounded-xl px-4 py-3 text-base text-black focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">

                <option value="">
                    Tất cả loại phòng
                </option>

                @foreach($danhSachLoaiPhong as $loaiPhong)

                <option value="{{ $loaiPhong->ten_loai_phong }}"
                    {{ request('ten_loai_phong') == $loaiPhong->ten_loai_phong ? 'selected' : '' }}>

                    {{ $loaiPhong->ten_loai_phong }}

                </option>

                @endforeach

            </select>

            <!-- Khách sạn -->
            <select name="ma_khach_san" onchange="this.form.submit()"
                class="w-full border border-slate-300 rounded-xl px-4 py-3 text-base text-black focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">

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
            <select name="trang_thai" onchange="this.form.submit()"
                class="w-full border border-slate-300 rounded-xl px-4 py-3 text-base text-black focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">

                <option value="" {{ request('trang_thai') === null || request('trang_thai') === '' ? 'selected' : '' }}>

                    Tất cả trạng thái

                </option>

                <option value="1" {{ request('trang_thai') === '1' ? 'selected' : '' }}>

                    Hoạt động

                </option>

                <option value="0" {{ request('trang_thai') === '0' ? 'selected' : '' }}>

                    Tạm dừng

                </option>

            </select>

            <!-- Sắp xếp -->
            <select name="sap_xep" onchange="this.form.submit()"
                class="w-full border border-slate-300 rounded-xl px-4 py-3 text-base text-black focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">

                <option value="desc" {{ request('sap_xep','desc') == 'desc' ? 'selected' : '' }}>

                    Mới nhất

                </option>

                <option value="asc" {{ request('sap_xep') == 'asc' ? 'selected' : '' }}>

                    Cũ nhất

                </option>

            </select>

            <!-- Xóa bộ lọc -->
            <a href="{{ route('admin.loaiphong.index') }}"
                class="w-full bg-red-50 hover:bg-red-100 border border-red-200 rounded-xl px-4 py-3 text-base font-semibold text-red-600 flex items-center justify-center gap-2 transition">

                <i class="fa-solid fa-rotate-left"></i>

                Xóa lọc

            </a>

        </div>

    </form>

</div>