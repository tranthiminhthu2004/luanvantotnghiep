{{-- THÔNG TIN LƯU TRÚ --}}

<section>

    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-6">

        Thông tin lưu trú

    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

        <!-- Ngày nhận phòng -->
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">

            <div class="text-sm text-slate-500 mb-2">

                Ngày nhận phòng

            </div>

            <div class="text-lg font-semibold text-slate-800">

                {{ $ngayNhanPhong }}

            </div>

        </div>

        <!-- Ngày trả phòng -->
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">

            <div class="text-sm text-slate-500 mb-2">

                Ngày trả phòng

            </div>

            <div class="text-lg font-semibold text-slate-800">

                {{ $ngayTraPhong }}

            </div>

        </div>

        <!-- Số khách -->
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">

            <div class="text-sm text-slate-500 mb-2">

                Số khách

            </div>

            <div class="text-lg font-semibold text-slate-800">

                {{ $tongNguoi }} khách

            </div>

        </div>

    </div>

</section>