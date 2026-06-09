<section class="relative h-[600px]">

    <!-- Ảnh nền -->
    <img src="{{ asset('images/diadiem.png') }}" alt="Banner" class="absolute inset-0 w-full h-full object-cover">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/20"></div>

    <!-- Nội dung -->
    <div class="relative z-10 max-w-7xl mx-auto px-8 pt-10">

        <!-- Text -->
        <div class="max-w-2xl text-white mb-30">

            <h1 class="text-6xl font-bold leading-tight">
                KHÁM PHÁ NHỮNG ĐIỂM ĐẾN DU LỊCH HẤP DẪN
            </h1>

            <p class="mt-6 text-xl text-white/90">
                Tìm kiếm những điểm đến phù hợp với sở thích và nhu cầu du lịch của bạn
            </p>

        </div>

        <!-- Search Box -->
        <div class="mt-32">

            <div class=" bg-white rounded-2xl shadow-2xl p-5">

                <div class="grid grid-cols-3 gap-10">

                    <!-- Địa điểm -->
                    <div>

                        <label class="text-lg font-semibold text-black">

                            Địa điểm

                        </label>

                        <select class="mt-2 w-full border rounded-xl px-4 py-3">

                            <option>
                                Chọn địa điểm
                            </option>

                            <option>
                                Đà Nẵng
                            </option>

                            <option>
                                Đà Lạt
                            </option>

                            <option>
                                Nha Trang
                            </option>

                            <option>
                                Phú Quốc
                            </option>

                            <option>
                                Hội An
                            </option>

                        </select>

                    </div>

                    <!-- Nhu cầu -->
                    <div>

                        <label class="text-lg font-semibold text-black">

                            Nhu cầu du lịch

                        </label>

                        <select class="mt-2 w-full border rounded-xl px-4 py-3">

                            <option>
                                Chọn nhu cầu
                            </option>

                            <option>
                                Nghỉ dưỡng
                            </option>

                            <option>
                                Du lịch biển
                            </option>

                            <option>
                                Du lịch gia đình
                            </option>

                            <option>
                                Khám phá thiên nhiên
                            </option>

                            <option>
                                Du lịch văn hóa
                            </option>

                            <option>
                                Du lịch ẩm thực
                            </option>

                        </select>

                    </div>

                    <!-- Button -->
                    <div class="flex items-end justify-center">

                        <button
                            class="w-[200px] bg-[#1040C5] hover:bg-blue-700 text-white text-lg font-semibold py-3 rounded-full">

                            Tìm kiếm

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>