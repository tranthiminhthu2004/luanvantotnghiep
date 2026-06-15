<section class="relative min-h-[700px] lg:h-[700px]">

    <!-- Ảnh nền -->
    <img src="{{ asset('images/tc.png') }}" alt="Banner" class="absolute inset-0 w-full h-full object-cover">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/30"></div>

    <!-- Nội dung -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 lg:px-8 pt-10 lg:pt-20">

        <!-- Text -->
        <div class="max-w-2xl text-white">

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">

                KHÁCH SẠN

            </h1>

            <p class="mt-4 lg:mt-6 text-lg lg:text-xl text-white/90">

                Khám phá và đặt phòng khách sạn phù hợp cho những chuyến đi của bạn

            </p>

        </div>

        <!-- Search Box -->
        <div class="mt-10 lg:mt-80">

            <div class="bg-white rounded-2xl shadow-2xl p-5">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">

                    <!-- Điểm đến -->
                    <div>

                        <label class="text-base lg:text-lg font-semibold text-black">

                            Bạn muốn đến đâu?

                        </label>

                        <input type="text" placeholder="Nhập nơi bạn muốn đến"
                            class="mt-2 w-full border rounded-xl px-4 py-3">

                    </div>

                    <!-- Nhận phòng -->
                    <div>

                        <label class="text-base lg:text-lg font-semibold text-black">

                            Ngày nhận phòng

                        </label>

                        <input type="date" class="mt-2 w-full border rounded-xl px-4 py-3">

                    </div>

                    <!-- Trả phòng -->
                    <div>

                        <label class="text-base lg:text-lg font-semibold text-black">

                            Ngày trả phòng

                        </label>

                        <input type="date" class="mt-2 w-full border rounded-xl px-4 py-3">

                    </div>

                    <!-- Số người -->
                    <div>

                        <label class="text-base lg:text-lg font-semibold text-black">

                            Số người và số phòng

                        </label>

                        <select class="mt-2 w-full border rounded-xl px-4 py-3">

                            <option>1 người</option>
                            <option>2 người</option>
                            <option>3 người</option>
                            <option>4 người</option>

                        </select>

                    </div>

                    <!-- Button -->
                    <div class="flex items-end">

                        <button
                            class="w-full bg-[#1040C5] hover:bg-blue-700 text-white text-lg font-semibold py-3 rounded-full">

                            Tìm kiếm

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>