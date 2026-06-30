{{-- PHƯƠNG THỨC THANH TOÁN --}}

<section>

    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-6">

        Phương thức thanh toán

    </h2>

    <div class="space-y-5">

        {{-- Thanh toán tại khách sạn --}}
        <label
            class="flex items-center justify-between border border-slate-300 rounded-xl p-5 cursor-pointer hover:border-blue-500 transition">

            <div class="flex items-center gap-4">

                <input type="radio" name="phuong_thuc_thanh_toan" value="TienMat" checked class="w-5 h-5 text-blue-600">

                <div>

                    <div class="font-semibold text-slate-800">

                        Thanh toán tại khách sạn

                    </div>

                    <p class="text-sm text-slate-500 mt-1">

                        Thanh toán khi nhận phòng.

                    </p>

                </div>

            </div>

            <i class="fa-solid fa-money-bill-wave text-3xl text-green-600"></i>

        </label>

        {{-- VNPay --}}
        <label
            class="flex items-center justify-between border border-slate-300 rounded-xl p-5 cursor-pointer hover:border-blue-500 transition">

            <div class="flex items-center gap-4">

                <input type="radio" name="phuong_thuc_thanh_toan" value="VNPay" class="w-5 h-5 text-blue-600">

                <div>

                    <div class="font-semibold text-slate-800">

                        Thanh toán bằng VNPay

                    </div>

                    <p class="text-sm text-slate-500 mt-1">

                        Thanh toán trực tuyến qua cổng VNPay.

                    </p>

                </div>

            </div>

            <img src="{{ asset('images/vnpay.png') }}" alt="VNPay" class="h-10">

        </label>


    </div>


    {{-- Tổng tiền --}}
    <div class="mt-8 border-t border-slate-300 pt-6 flex flex-col md:flex-row md:justify-between md:items-center gap-6">

        <div>

            <div class="text-lg font-semibold text-slate-700">

                Tổng thanh toán

            </div>

            <div class="text-3xl font-bold text-blue-600 mt-2">

                {{ number_format($tongTien,0,',','.') }}đ

            </div>

        </div>

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-4 rounded-xl transition">

            <i class="fa-solid fa-credit-card mr-2"></i>

            Xác nhận thanh toán

        </button>

    </div>

</section>