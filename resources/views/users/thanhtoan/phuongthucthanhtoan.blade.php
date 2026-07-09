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

                <input type="radio" name="phuong_thuc_thanh_toan" value="DatCoc" checked class="w-5 h-5 text-blue-600">

                <div>

                    <div class="font-semibold text-slate-800">

                        Thanh toán tại khách sạn

                    </div>

                    <p class="text-sm text-slate-500 mt-1">

                        Đặt cọc trước 30%

                    </p>

                </div>

            </div>

            <i class="fa-solid fa-money-bill-wave text-3xl text-green-600"></i>

        </label>

        {{-- Thanh toán VNPay --}}
        <label
            class="flex items-center justify-between border border-slate-300 rounded-xl p-5 cursor-pointer hover:border-blue-500 transition">

            <div class="flex items-center gap-4">

                <input type="radio" name="phuong_thuc_thanh_toan" value="ThanhToanToanBo" class="w-5 h-5 text-blue-600">

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

    {{-- Thanh toán --}}
    <div class="mt-8 border-t border-slate-300 pt-6 flex flex-col md:flex-row md:justify-between md:items-center gap-6">

        <div>

            <div class="text-lg font-semibold text-slate-700">

                Số tiền cần thanh toán

            </div>

            <div id="soTienThanhToan" class="text-3xl font-bold text-blue-600 mt-2">

                {{ number_format(round($tongTien * 0.3),0,',','.') }}đ

            </div>

            <p id="ghiChuThanhToan" class="text-sm text-slate-500 mt-2">

                Bạn sẽ thanh toán 70% còn lại tại khách sạn khi nhận phòng.

            </p>

        </div>

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-4 rounded-xl transition">

            <i class="fa-solid fa-credit-card mr-2"></i>

            Xác nhận thanh toán

        </button>

    </div>

    <script>
    const tongTien = {
        {
            $tongTien
        }
    };

    const tienCoc = Math.round(tongTien * 0.3);

    const radioDatCoc = document.querySelector(
        'input[value="DatCoc"]'
    );

    const radioToanBo = document.querySelector(
        'input[value="ThanhToanToanBo"]'
    );

    const soTien = document.getElementById(
        'soTienThanhToan'
    );

    const ghiChu = document.getElementById(
        'ghiChuThanhToan'
    );

    function formatTien(tien) {
        return tien.toLocaleString('vi-VN') + 'đ';
    }

    function capNhat() {
        if (radioDatCoc.checked) {
            soTien.innerText = formatTien(tienCoc);

            ghiChu.innerText =
                'Bạn sẽ thanh toán 70% còn lại tại khách sạn khi nhận phòng.';
        } else {
            soTien.innerText = formatTien(tongTien);

            ghiChu.innerText =
                'Thanh toán toàn bộ giá trị đơn đặt phòng.';
        }
    }

    radioDatCoc.addEventListener(
        'change',
        capNhat
    );

    radioToanBo.addEventListener(
        'change',
        capNhat
    );

    capNhat();
    </script>

</section>