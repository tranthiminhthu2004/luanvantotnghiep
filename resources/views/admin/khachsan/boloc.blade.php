<div class="bg-white rounded-3xl shadow-sm p-4 mb-6">

    <form id="filterForm" method="GET" action="{{ route('admin.khachsan.index') }}">

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-6 gap-3">

            <!-- Khách sạn -->
            <select name="ma_khach_san" onchange="this.form.submit()" class="border rounded-xl text-sm px-4 py-2.5">

                <option value="">
                    Tất cả khách sạn
                </option>

                @foreach($danhSachKhachSan as $khachSan)

                <option value="{{ $khachSan->ma_khach_san }}"
                    {{ request('ma_khach_san') == $khachSan->ma_khach_san ? 'selected' : '' }}>

                    {{ $khachSan->ten_khach_san }}

                </option>

                @endforeach

            </select>

            <!-- Địa điểm -->
            <select name="ma_dia_diem" onchange="this.form.submit()" class="border rounded-xl text-sm px-4 py-2.5">

                <option value="">
                    Tất cả địa điểm
                </option>

                @foreach($diaDiems as $diaDiem)

                <option value="{{ $diaDiem->ma_dia_diem }}"
                    {{ request('ma_dia_diem') == $diaDiem->ma_dia_diem ? 'selected' : '' }}>

                    {{ $diaDiem->ten_dia_diem }}

                </option>

                @endforeach

            </select>

            <!-- Số sao -->
            <select name="so_sao_khach_san" onchange="this.form.submit()" class="border rounded-xl text-sm px-4 py-2.5">

                <option value="">
                    Tất cả sao
                </option>

                @foreach($soSaos as $soSao)

                <option value="{{ $soSao->so_sao_khach_san }}"
                    {{ request('so_sao_khach_san') == $soSao->so_sao_khach_san ? 'selected' : '' }}>

                    {{ $soSao->so_sao_khach_san }} Sao

                </option>

                @endforeach

            </select>

            <!-- Trạng thái -->
            <select name="trang_thai" onchange="this.form.submit()" class="border rounded-xl text-sm px-4 py-2.5">

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
            <select name="sap_xep" onchange="this.form.submit()" class="border rounded-xl text-sm px-4 py-2.5">

                <option value="desc" {{ request('sap_xep','desc') == 'desc' ? 'selected' : '' }}>
                    Mới nhất
                </option>

                <option value="asc" {{ request('sap_xep') == 'asc' ? 'selected' : '' }}>
                    Cũ nhất
                </option>

            </select>

            <!-- Xóa bộ lọc -->
            <a href="{{ route('admin.khachsan.index') }}"
                class="bg-red-50 text-red-600 rounded-xl text-sm font-medium hover:bg-red-100 flex items-center justify-center gap-2 py-2">

                <i class="fa-solid fa-rotate-left"></i>

                Xóa lọc

            </a>

        </div>

    </form>

</div>