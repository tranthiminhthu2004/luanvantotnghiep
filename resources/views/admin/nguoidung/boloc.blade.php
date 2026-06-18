<div class="bg-white rounded-3xl shadow p-5 mb-6">

    <form method="GET" action="{{ route('admin.nguoidung.index') }}">

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-4">

            <!-- Tìm kiếm -->
            <input type="text" name="tu_khoa" placeholder="Tên hoặc email..." value="{{ request('tu_khoa') }}"
                class="border rounded-full text-base px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <!-- Vai trò -->
            <select name="ma_vai_tro" class="border rounded-full text-base px-5 py-3 text-black">

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
            <select name="trang_thai" class="border rounded-full text-base px-5 py-3">

                <option value="1" {{ request('trang_thai') === '1' ? 'selected' : '' }}>

                    Hoạt động

                </option>

                <option value="0" {{ request('trang_thai') === '0' ? 'selected' : '' }}>

                    Đã khóa

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