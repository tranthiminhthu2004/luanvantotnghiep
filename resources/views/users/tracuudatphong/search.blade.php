<section class="relative min-h-[560px] lg:h-[620px]">

    <!-- Ảnh nền -->
    <img src="{{ asset('images/tcdp.png') }}" alt="Tra cứu đặt phòng"
        class="absolute inset-0 w-full h-full object-cover">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/35"></div>

    <!-- Nội dung -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 lg:px-8 pt-8 lg:pt-20">

        <!-- Tiêu đề -->
        <div class="max-w-2xl text-white">

            <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold leading-tight">

                TRA CỨU
                <br>
                ĐƠN ĐẶT PHÒNG

            </h1>

            <p class="mt-4 lg:mt-6 text-lg lg:text-xl text-white/90">

                Nhập mã đặt phòng và email hoặc số điện thoại đã sử dụng khi đặt
                để tra cứu thông tin đơn đặt phòng của bạn.

            </p>

        </div>

        <!-- Search -->
        <div class="mt-14 lg:mt-40">

            <form method="POST" action="{{ route('tracuudatphong.tracuu') }}">

                @csrf

                <div class="bg-white rounded-2xl shadow-2xl p-5">

                    <div class="grid grid-cols-12 gap-4 items-end">

                        <!-- Mã đặt phòng -->
                        <div class="col-span-12 lg:col-span-4">

                            <label class="font-semibold text-black">

                                Mã đặt phòng

                            </label>

                            <input type="text" name="ma_dat_phong" value="{{ old('ma_dat_phong', $maDatPhong ?? '') }}"
                                placeholder="Ví dụ: DP000123" class="mt-2 w-full border rounded-xl px-4 py-3">

                            <div class="h-5 mt-1">

                                @error('ma_dat_phong')

                                <p class="text-red-500 text-sm">

                                    {{ $message }}

                                </p>

                                @enderror

                            </div>

                        </div>

                        <!-- Email hoặc số điện thoại -->
                        <div class="col-span-12 lg:col-span-6">

                            <label class="font-semibold text-black">

                                Email hoặc số điện thoại

                            </label>

                            <input type="text" name="thong_tin" value="{{ old('thong_tin', $thongTin ?? '') }}"
                                placeholder="Nhập email hoặc số điện thoại"
                                class="mt-2 w-full border rounded-xl px-4 py-3">
                            <div class="h-5 mt-1">

                                @error('thong_tin')

                                <p class="text-red-500 text-sm">

                                    {{ $message }}

                                </p>

                                @enderror

                            </div>

                        </div>

                        <!-- Button -->
                        <div class="col-span-12 lg:col-span-2">

                            <button type="submit"
                                class="w-full h-[52px] mt-2 rounded-xl bg-[#1040C5] hover:bg-blue-700 text-white font-semibold transition">

                                <i class="fa-solid fa-magnifying-glass mr-2"></i>

                                Tra cứu

                            </button>

                            <div class="h-5 mt-1"></div>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</section>