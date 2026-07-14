<div class="bg-white rounded-2xl shadow-sm p-4 mb-6">

    <form method="GET" action="{{ route('admin.doitac.index') }}">

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-3">

            <!-- Mã khách sạn -->
            <input type="text" name="ma_khach_san" value="{{ request('ma_khach_san') }}" placeholder="Mã khách sạn..."
                onkeydown="if(event.key==='Enter'){this.form.submit();}"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

            <!-- Chủ khách sạn -->
            <input type="text" name="chu_khach_san" value="{{ request('chu_khach_san') }}"
                placeholder="Chủ khách sạn..." onkeydown="if(event.key==='Enter'){this.form.submit();}"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

            <!-- Trạng thái duyệt -->
            <select name="trang_thai_duyet" onchange="this.form.submit()"
                class="border rounded-xl px-4 py-2.5 text-sm text-black">

                <option value="">
                    Tất cả trạng thái
                </option>

                <option value="ChoDuyet" {{ request('trang_thai_duyet') == 'ChoDuyet' ? 'selected' : '' }}>
                    Chờ duyệt
                </option>

                <option value="DaDuyet" {{ request('trang_thai_duyet') == 'DaDuyet' ? 'selected' : '' }}>
                    Đã duyệt
                </option>

                <option value="TuChoi" {{ request('trang_thai_duyet') == 'TuChoi' ? 'selected' : '' }}>
                    Từ chối
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
            <a href="{{ route('admin.doitac.index') }}"
                class="bg-red-50 text-red-600 rounded-xl text-sm font-medium hover:bg-red-100 flex items-center justify-center gap-2 py-2">

                <i class="fa-solid fa-rotate-left"></i>

                Xóa lọc

            </a>

        </div>

    </form>

</div>