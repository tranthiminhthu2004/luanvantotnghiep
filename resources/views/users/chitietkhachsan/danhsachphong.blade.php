<div class="bg-white rounded-xl shadow p-5">

    <h2 class="font-bold text-2xl mb-5">

        Danh sách phòng

    </h2>

    @for($i=1;$i<=3;$i++) <div class="border rounded-xl p-4 mb-4">

        <div class="flex gap-4">

            <img src="{{ asset('images/phong1.jpg') }}" class="w-52 h-36 rounded-lg object-cover">

            <div class="flex-1">

                <h3 class="font-bold text-lg">

                    Phòng Deluxe View Biển

                </h3>

                <div class="text-gray-500 mt-2">

                    2 người • 30m² • Wifi • Bữa sáng

                </div>

            </div>

            <div class="w-52">

                <div class="text-right">

                    <div class="text-blue-600 font-bold text-2xl">

                        1.250.000đ

                    </div>

                    <div class="text-gray-500">

                        / đêm

                    </div>

                </div>

                <select class="w-full border rounded-lg p-2 mt-4">

                    <option>1 phòng</option>
                    <option>2 phòng</option>
                    <option>3 phòng</option>
                    <option>4 phòng</option>

                </select>

                <button class="w-full bg-blue-600 text-white py-2 rounded-lg mt-3">

                    Đặt phòng

                </button>

            </div>

        </div>

</div>

@endfor

</div>