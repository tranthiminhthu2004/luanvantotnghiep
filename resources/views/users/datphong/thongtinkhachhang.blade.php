{{-- THÔNG TIN KHÁCH HÀNG --}}

<section>

    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-6">

        Thông tin khách hàng

    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        {{-- Họ và tên --}}
        <div>

            <label class="block mb-2 text-sm font-medium text-slate-700">

                Họ và tên <span class="text-red-500">*</span>

            </label>

            <input type="text" name="ho_ten" autocomplete="name"
                value="{{ old('ho_ten', auth()->check() ? auth()->user()->ho_va_ten_dem . ' ' . auth()->user()->ten : '') }}"
                class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            @error('ho_ten')

            <p class="text-red-500 text-sm mt-2">

                {{ $message }}

            </p>

            @enderror

        </div>

        {{-- Số điện thoại --}}
        <div>

            <label class="block mb-2 text-sm font-medium text-slate-700">

                Số điện thoại <span class="text-red-500">*</span>

            </label>

            <input type="text" name="so_dien_thoai" autocomplete="tel"
                value="{{ old('so_dien_thoai', auth()->check() ? auth()->user()->so_dien_thoai : '') }}"
                class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            @error('so_dien_thoai')

            <p class="text-red-500 text-sm mt-2">

                {{ $message }}

            </p>

            @enderror

        </div>

        {{-- Email --}}
        <div class="md:col-span-2">

            <label class="block mb-2 text-sm font-medium text-slate-700">

                Email <span class="text-red-500">*</span>

            </label>

            <input type="email" name="email" autocomplete="email"
                value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}"
                class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            @error('email')

            <p class="text-red-500 text-sm mt-2">

                {{ $message }}

            </p>

            @enderror

        </div>

        {{-- Ghi chú --}}
        <div class="md:col-span-2">

            <label class="block mb-2 text-sm font-medium text-slate-700">

                Ghi chú

            </label>

            <textarea name="ghi_chu" rows="4" autocomplete="off"
                placeholder="Ví dụ: Nhận phòng muộn, phòng tầng cao, giường đôi..."
                class="w-full border border-slate-300 rounded-xl px-4 py-3 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('ghi_chu') }}</textarea>

            @error('ghi_chu')

            <p class="text-red-500 text-sm mt-2">

                {{ $message }}

            </p>

            @enderror

        </div>

    </div>

</section>