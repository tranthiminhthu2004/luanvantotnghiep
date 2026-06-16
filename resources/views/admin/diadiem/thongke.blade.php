<div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-6">

    <!-- Tổng địa điểm -->
    <div class="lg:col-span-2 bg-white rounded-3xl shadow px-5 h-20 flex items-center">

        <div class="flex items-center gap-4">

            <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">

                <i class="fa-solid fa-location-dot"></i>

            </div>

            <div>

                <p class="text-gray-500 text-sm">
                    Tổng địa điểm
                </p>

                <h3 class="text-2xl font-bold">

                    {{ $tongDiaDiem }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Sắp xếp -->
    <div>

        <form method="GET" action="{{ route('admin.diadiem.index') }}">

            <select name="sap_xep" onchange="this.form.submit()" class="w-full h-20 bg-white shadow rounded-full px-5">

                <option value="desc" {{ request('sap_xep','desc') == 'desc' ? 'selected' : '' }}>

                    Mới nhất

                </option>

                <option value="asc" {{ request('sap_xep') == 'asc' ? 'selected' : '' }}>

                    Cũ nhất

                </option>

            </select>

        </form>

    </div>

    <!-- Thêm địa điểm -->
    <div>

        <a href="{{ route('admin.diadiem.create') }}"
            class="w-full h-20 bg-blue-600 hover:bg-blue-700 text-white rounded-full font-semibold flex items-center justify-center gap-3 transition">

            <i class="fa-solid fa-plus"></i>

            Thêm địa điểm

        </a>

    </div>

</div>