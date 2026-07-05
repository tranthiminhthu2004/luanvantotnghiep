<div class="grid grid-cols-1 lg:grid-cols-4 gap-5 mb-6">

    <!-- Tổng nhu cầu -->
    <div class="lg:col-span-2 bg-white rounded-3xl shadow p-5 flex items-center">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center shrink-0">

                <i class="fa-solid fa-heart text-2xl"></i>

            </div>

            <div>

                <p class="text-black text-sm">

                    Tổng nhu cầu

                </p>

                <h3 class="text-3xl font-bold text-[#061755] mt-1">

                    {{ $tongNhuCau }}

                </h3>

            </div>

        </div>

    </div>

    <!-- Sắp xếp -->
    <div class="flex items-center">

        <form method="GET" action="{{ route('admin.nhucaudulich.index') }}" class="w-full">

            <select name="sap_xep" onchange="this.form.submit()"
                class="w-full border rounded-full px-5 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                <option value="desc" {{ request('sap_xep','desc') == 'desc' ? 'selected' : '' }}>

                    Mới nhất

                </option>

                <option value="asc" {{ request('sap_xep') == 'asc' ? 'selected' : '' }}>

                    Cũ nhất

                </option>

            </select>

        </form>

    </div>

    <!-- Thêm -->
    <div class="flex items-center">

        <a href="{{ route('admin.nhucaudulich.create') }}"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white rounded-full py-4 font-semibold flex items-center justify-center gap-3 transition">

            <i class="fa-solid fa-plus"></i>

            Thêm nhu cầu

        </a>

    </div>

</div>