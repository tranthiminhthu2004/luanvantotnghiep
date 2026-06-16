<div class="bg-white rounded-3xl shadow p-5 mb-6">

    <div class="flex flex-col lg:flex-row gap-4 justify-between">

        <form method="GET" action="{{ route('admin.tiennghi.index') }}" class="flex-1">

            <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4">

                <!-- Tên tiện nghi -->
                <input type="text" name="ten_tien_nghi" placeholder="Tên tiện nghi..."
                    value="{{ request('ten_tien_nghi') }}"
                    class="border rounded-full text-base px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <!-- Trạng thái -->
                <select name="trang_thai" class="border rounded-full text-base px-5 py-3">

                    <option value="">
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

</div>