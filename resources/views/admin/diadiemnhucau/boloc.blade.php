<div class="bg-white rounded-2xl shadow-sm p-4 mb-6">

    <form method="GET" action="{{ route('admin.diadiemnhucau.index') }}">

        <div class="grid grid-cols-1 sm:grid-cols-4 gap-3">

            <!-- Điểm đến -->
            <select name="ma_dia_diem" onchange="this.form.submit()"
                class="border border-gray-300 rounded-xl px-4 py-3 text-base text-black">

                <option value="">
                    Tất cả điểm đến
                </option>

                @foreach($diaDiems as $diaDiem)

                <option value="{{ $diaDiem->ma_dia_diem }}"
                    {{ request('ma_dia_diem') == $diaDiem->ma_dia_diem ? 'selected' : '' }}>

                    {{ $diaDiem->ten_dia_diem }}

                </option>

                @endforeach

            </select>

            <!-- Nhu cầu du lịch -->
            <select name="ma_nhu_cau" onchange="this.form.submit()"
                class="border border-gray-300 rounded-xl px-4 py-3 text-base text-black">

                <option value="">
                    Tất cả nhu cầu
                </option>

                @foreach($nhuCaus as $nhuCau)

                <option value="{{ $nhuCau->ma_nhu_cau }}"
                    {{ request('ma_nhu_cau') == $nhuCau->ma_nhu_cau ? 'selected' : '' }}>

                    {{ $nhuCau->ten_nhu_cau }}

                </option>

                @endforeach

            </select>

            <!-- Sắp xếp -->
            <select name="sap_xep" onchange="this.form.submit()"
                class="border border-gray-300 rounded-xl px-4 py-3 text-base text-black">

                <option value="desc" {{ request('sap_xep','desc') == 'desc' ? 'selected' : '' }}>

                    Mới nhất

                </option>

                <option value="asc" {{ request('sap_xep') == 'asc' ? 'selected' : '' }}>

                    Cũ nhất

                </option>

            </select>

            <!-- Xóa bộ lọc -->
            <a href="{{ route('admin.diadiemnhucau.index') }}"
                class="bg-red-50 text-red-600 rounded-xl text-base font-medium hover:bg-red-100 transition flex items-center justify-center gap-2 py-3">

                <i class="fa-solid fa-rotate-left"></i>

                Xóa bộ lọc

            </a>

        </div>

    </form>

</div>