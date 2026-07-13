<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    {{-- Tổng khách sạn --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                <i class="fa-solid fa-hotel text-2xl text-[#1040C5]"></i>

            </div>

            <div>

                <p class="text-base text-black">

                    Tổng khách sạn

                </p>

                <h2 class="mt-2 text-4xl font-bold text-[#061755]">

                    {{ $tongKhachSan ?? 0 }}

                </h2>

            </div>

        </div>

    </div>

    {{-- Chờ duyệt --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-yellow-100 flex items-center justify-center">

                <i class="fa-solid fa-clock text-2xl text-yellow-500"></i>

            </div>

            <div>

                <p class="text-base  text-black">

                    Chờ duyệt

                </p>

                <h2 class="mt-2 text-4xl font-bold text-yellow-500">

                    {{ $choDuyet ?? 0 }}

                </h2>

            </div>

        </div>

    </div>

    {{-- Đã duyệt --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                <i class="fa-solid fa-circle-check text-2xl text-green-600"></i>

            </div>

            <div>

                <p class="text-base text-black">

                    Đã duyệt

                </p>

                <h2 class="mt-2 text-4xl font-bold text-green-600">

                    {{ $daDuyet ?? 0 }}

                </h2>

            </div>

        </div>

    </div>

    {{-- Bị từ chối --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center">

                <i class="fa-solid fa-circle-xmark text-2xl text-red-600"></i>

            </div>

            <div>

                <p class="text-base text-black">

                    Bị từ chối

                </p>

                <h2 class="mt-2 text-4xl font-bold text-red-600">

                    {{ $biTuChoi ?? 0 }}

                </h2>

            </div>

        </div>

    </div>

</div>