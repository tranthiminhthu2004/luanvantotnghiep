<section class="relative h-[560px] lg:h-[580px]">

    <!-- Ảnh nền -->
    <img src="{{ asset('images/timkiem.png') }}" alt="Banner" class="absolute inset-0 w-full h-full object-cover">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/20"></div>

    <!-- Nội dung -->
    <div class="relative z-10 max-w-[1320px] mx-auto px-4 lg:px-6 pt-10">

        <!-- Text -->
        <div class="max-w-[650px] text-white">

            <h1 class="text-4xl lg:text-5xl font-bold leading-tight">

                KHÁM PHÁ NHỮNG ĐIỂM ĐẾN PHÙ HỢP VỚI BẠN

            </h1>

            <p class="mt-5 text-lg text-white/90 leading-7">

                Tìm kiếm khách sạn và địa điểm du lịch
                cho chuyến đi hoàn hảo của bạn

            </p>

        </div>

        <!-- Search Box -->
        <div class="mt-40 translate-y-10">

            <div class="bg-white rounded-2xl shadow-xl p-4 lg:p-5">

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-4">

                    <!-- Điểm đến -->
                    <div>

                        <label class="block text-base font-semibold text-black">

                            Bạn muốn đến đâu?

                        </label>

                        <input type="text" placeholder="Nhập nơi bạn muốn đến"
                            class="mt-2 w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>

                    <!-- Nhận phòng -->
                    <div>

                        <label class="block text-base font-semibold text-black">

                            Ngày nhận phòng

                        </label>

                        <input type="date"
                            class="mt-2 w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>

                    <!-- Trả phòng -->
                    <div>

                        <label class="block text-base font-semibold text-black">

                            Ngày trả phòng

                        </label>

                        <input type="date"
                            class="mt-2 w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>

                    <!-- Số người -->
                    <div>

                        <label class="block text-base font-semibold text-black">

                            Số người và số phòng

                        </label>

                        <select
                            class="mt-2 w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                            <option>1 người</option>
                            <option>2 người</option>
                            <option>3 người</option>
                            <option>4 người</option>

                        </select>

                    </div>

                    <!-- Button -->
                    <div class="flex items-end">

                        <button
                            class="w-full bg-[#1040C5] hover:bg-blue-700 text-white text-base font-semibold py-2.5 rounded-full transition">

                            Tìm kiếm

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>