<div class="mt-16">

    <h2 class="text-6xl font-bold mb-6 text-[#061755]">

        Khách sạn gần địa điểm

    </h2>

    <div class="grid grid-cols-4 gap-6">

        @for($i = 0; $i < 4; $i++) <div class="bg-white rounded-2xl shadow overflow-hidden">

            <img src="{{ asset('images/muonthanh2.png') }}" class="w-full h-48 object-cover">

            <div class="p-4">

                <h3 class="font-bold text-xl">

                    Mường Thanh Luxury

                </h3>

                <p class="text-gray-500 mt-2">

                    Cách địa điểm 300m
                </p>

                <div class="text-blue-600 font-bold text-xl mt-3">

                    1.250.000đ
                </div>

                <a href="/chitietkhachsan" class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg">

                    Xem khách sạn

                </a>

            </div>

    </div>

    @endfor

</div>

</div>