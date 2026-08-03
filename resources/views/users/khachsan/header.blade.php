<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">

    <div>

        <h1 class="text-2xl md:text-4xl lg:text-6xl font-bold text-[#061755] mb-2">

            Tất cả khách sạn

        </h1>

    </div>

    <form method="GET">

        @foreach(request()->except('sap_xep') as $key => $value)

        @if(is_array($value))

        @foreach($value as $item)

        <input type="hidden" name="{{ $key }}[]" value="{{ $item }}">

        @endforeach

        @else

        <input type="hidden" name="{{ $key }}" value="{{ $value }}">

        @endif

        @endforeach

        <select name="sap_xep" onchange="this.form.submit()"
            class="w-full lg:w-auto border rounded-xl px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

            <option value="" {{ request('sap_xep') == '' ? 'selected' : '' }}>

                Tất cả

            </option>

            <option value="moi_nhat" {{ request('sap_xep') == 'moi_nhat' ? 'selected' : '' }}>

                Mới nhất

            </option>

            <option value="cu_nhat" {{ request('sap_xep') == 'cu_nhat' ? 'selected' : '' }}>

                Cũ nhất

            </option>

        </select>

    </form>

</div>