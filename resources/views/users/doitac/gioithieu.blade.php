<section>

    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden mt-10">

        <div class="grid grid-cols-1 lg:grid-cols-2">

            {{-- Nội dung --}}
            <div class="p-8 lg:p-14 flex flex-col justify-center ">

                <h1 class="mt-1 text-4xl lg:text-5xl font-bold text-[#061755] leading-tight">

                    Trở thành đối tác của chúng tôi

                </h1>

                <p class="mt-8 text-slate-600 text-lg leading-8 text-justify">

                    Đưa khách sạn của bạn tiếp cận nhiều khách hàng hơn thông qua
                    hệ thống đặt phòng trực tuyến. Sau khi gửi thông tin khách
                    sạn, đội ngũ quản trị sẽ xem xét và phê duyệt trước khi hiển
                    thị trên hệ thống.

                </p>

                <div class="mt-8 flex flex-wrap gap-4">

                    <a href="{{ route('register', ['role' => 'doitac']) }}"
                        class="inline-flex items-center gap-2 bg-[#1040C5] hover:bg-blue-700 text-white px-8 py-4 rounded-full font-semibold transition">

                        Đăng ký đối tác

                    </a>


                </div>

            </div>

            {{-- Ảnh --}}
            <div class="bg-gradient-to-br from-blue-50 to-blue-100">

                <img src="{{ asset('images/anhhoptac.png') }}" alt="Đối tác" class="w-full h-full object-cover">

            </div>
        </div>

    </div>

</section>