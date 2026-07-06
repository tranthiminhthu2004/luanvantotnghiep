<div class="bg-white rounded-2xl shadow-sm p-4 mb-6">

    <form id="filterForm" method="GET" action="{{ route('admin.tiennghi.index') }}">

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-3">

            <!-- Tên tiện nghi -->
            <select name="ten_tien_nghi" onchange="this.form.submit()"
                class="border border-gray-300 rounded-xl px-4 py-3 text-base text-black">

                <option value="">
                    Tất cả tiện nghi
                </option>

                @foreach($danhSachTienNghi as $tienNghi)

                <option value="{{ $tienNghi->ten_tien_nghi }}"
                    {{ request('ten_tien_nghi') == $tienNghi->ten_tien_nghi ? 'selected' : '' }}>

                    {{ $tienNghi->ten_tien_nghi }}

                </option>

                @endforeach

            </select>

            <!-- Trạng thái -->
            <select name="trang_thai" onchange="this.form.submit()"
                class="border border-gray-300 rounded-xl px-4 py-3 text-base text-black">

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
                class="border border-gray-300 rounded-xl px-4 py-3 text-base text-black">

                <option value="desc" {{ request('sap_xep', 'desc') == 'desc' ? 'selected' : '' }}>

                    Mới nhất

                </option>

                <option value="asc" {{ request('sap_xep') == 'asc' ? 'selected' : '' }}>

                    Cũ nhất

                </option>

            </select>

            <!-- Xóa lọc -->
            <a href="{{ route('admin.tiennghi.index') }}"
                class="bg-red-50 text-red-600 rounded-xl text-base font-medium hover:bg-red-100 transition flex items-center justify-center gap-2 py-3">

                <i class="fa-solid fa-rotate-left"></i>

                Xóa lọc

            </a>

        </div>

    </form>

</div>