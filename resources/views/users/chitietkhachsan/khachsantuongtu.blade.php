<div class="bg-white rounded-xl shadow p-5 mt-5">

    <h2 class="font-bold text-2xl mb-5">

        Khách sạn tương tự

    </h2>

    <div class="grid grid-cols-4 gap-4">

        @for($i=1;$i<=4;$i++) <div class="border rounded-xl overflow-hidden">

            <img src="{{ asset('images/intercontinental.jpg') }}" class="w-full h-40 object-cover">

            <div class="p-3">

                <h3 class="font-semibold">

                    Sala Danang Beach Hotel

                </h3>

                <div class="text-yellow-400 mt-1">

                    ⭐⭐⭐⭐⭐

                </div>

                <div class="text-blue-600 font-bold mt-2">

                    1.800.000đ
                </div>

            </div>

    </div>

    @endfor

</div>

</div>