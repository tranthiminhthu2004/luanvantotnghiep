<div class="bg-white rounded-3xl shadow p-5 mb-6">

    <form method="GET" action="{{ route('admin.loaiphong.index') }}">

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-4">

            <!-- Tên loại phòng -->
            <input type="text" name="ten_loai_phong" placeholder="Tên loại phòng..."
                value="{{ request('ten_loai_phong') }}"
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
            <select name="trang_thai" class="border rounded-full text-base px-5 py-3">

                <option value="1" {{ request('trang_thai') === '1' ? 'selected' : '' }}>

                    Hoạt động

                </option>

                <option value="0" {{ request('trang_thai') === '0' ? 'selected' : '' }}>

                    Tạm dừng

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
                class="bg-slate-100 rounded-full text-base hover:bg-slate-200 flex items-center justify-center gap-2 p-3">

                <i class="fa-solid fa-filter"></i>

                Lọc

            </button>

        </div>

    </form>

</div>