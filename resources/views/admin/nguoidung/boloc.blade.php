<div class="bg-white rounded-2xl shadow-sm p-4 mb-6">

    <form id="filterForm" method="GET" action="{{ route('admin.nguoidung.index') }}">

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-3">

            <!-- Tìm kiếm -->
            <input type="text" name="tu_khoa" value="{{ request('tu_khoa') }}" placeholder="Tên hoặc email..."
                onkeydown="if(event.key==='Enter'){this.form.submit();}"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

            <!-- Vai trò -->
            <select name="ma_vai_tro" onchange="this.form.submit()"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

                <option value="">
                    Tất cả vai trò
                </option>

                @foreach($vaiTros as $vaiTro)

                <option value="{{ $vaiTro->ma_vai_tro }}"
                    {{ request('ma_vai_tro') == $vaiTro->ma_vai_tro ? 'selected' : '' }}>

                    {{ $vaiTro->ten_vai_tro }}

                </option>

                @endforeach

            </select>

            <!-- Trạng thái -->
            <select name="trang_thai" onchange="this.form.submit()"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

                <option value="" {{ request('trang_thai') === null || request('trang_thai') === '' ? 'selected' : '' }}>

                    Tất cả trạng thái

                </option>

                <option value="1" {{ request('trang_thai') === '1' ? 'selected' : '' }}>

                    Hoạt động

                </option>

                <option value="0" {{ request('trang_thai') === '0' ? 'selected' : '' }}>

                    Đã khóa

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
            <a href="{{ route('admin.nguoidung.index') }}"
                class="bg-red-50 text-red-600 rounded-xl text-sm font-medium hover:bg-red-100 flex items-center justify-center gap-2 py-2">

                <i class="fa-solid fa-rotate-left"></i>

                Xóa lọc

            </a>

        </div>

    </form>

</div>