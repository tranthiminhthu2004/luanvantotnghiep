<div class="bg-white rounded-3xl shadow-sm p-4 mb-6">

    <form method="GET" action="{{ route('admin.diadiemdulich.index') }}">

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

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
            <a href="{{ route('admin.diadiemdulich.index') }}"
                class="bg-red-50 text-red-600 rounded-xl text-sm font-medium hover:bg-red-100 flex items-center justify-center gap-2 py-2">

                <i class="fa-solid fa-rotate-left"></i>

                Xóa bộ lọc

            </a>

        </div>

    </form>

</div>