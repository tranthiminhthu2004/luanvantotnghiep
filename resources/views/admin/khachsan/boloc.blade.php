<div class="bg-white rounded-3xl shadow p-5 mb-6">

    <form method="GET" action="{{ route('admin.khachsan.index') }}">

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-6 gap-4">

            <!-- Tên khách sạn -->
            <input type="text" name="ten_khach_san" placeholder="Tên khách sạn..."
                value="{{ request('ten_khach_san') }}"
                class="border rounded-full text-base px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <!-- Thành phố -->
            <select name="thanh_pho" class="border rounded-full text-base px-5 py-3">

                <option value="">
                    Tất cả thành phố
                </option>

                @foreach($thanhPhos as $thanhPho)

                <option value="{{ $thanhPho->thanh_pho }}"
                    {{ request('thanh_pho') == $thanhPho->thanh_pho ? 'selected' : '' }}>

                    {{ $thanhPho->thanh_pho }}

                </option>

                @endforeach

            </select>
            <!-- Số sao -->
            <select name="so_sao_khach_san" class="border rounded-full text-base px-5 py-3">

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
                class="bg-slate-100 rounded-full text-base hover:bg-slate-200 flex items-center justify-center gap-2">

                <i class="fa-solid fa-filter"></i>

                Lọc

            </button>

        </div>

    </form>

</div>