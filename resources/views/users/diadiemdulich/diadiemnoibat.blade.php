<div>

    <h2 class="text-6xl font-bold mb-6 text-[#061755]">

        Địa điểm nổi bật

    </h2>

    <div class="grid grid-cols-4 gap-4">

        @for($i = 0; $i < 4; $i++) <div class="relative rounded-2xl overflow-hidden h-[220px]">

            <img src="{{ asset('images/danang.jpg') }}" class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/30"></div>

            <div class="absolute bottom-4 left-4 text-white">

                <h3 class="font-bold text-xl">

                    Biển Mỹ Khê

                </h3>

                <p>

                    Đà Nẵng

                </p>

            </div>

    </div>

    @endfor

</div>

</div>