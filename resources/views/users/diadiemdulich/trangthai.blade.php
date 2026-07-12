@guest

<section class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8">

    <div class="max-w-2xl mx-auto text-center">

        <div class="w-20 h-20 mx-auto rounded-full bg-blue-100 flex items-center justify-center">

            <i class="fa-solid fa-user-lock text-4xl text-[#1040C5]"></i>

        </div>

        <h2 class="mt-6 text-3xl font-bold text-[#061755]">

            Đăng nhập để nhận gợi ý dành riêng cho bạn

        </h2>

        <p class="mt-4 text-slate-500 leading-8">

            Hệ thống sẽ lưu hồ sơ sở thích của bạn và sẽ gợi ý những điểm đến phù hợp nhất với bạn .

        </p>

        <a href="{{ route('login') }}"
            class="inline-flex items-center gap-2 mt-8 bg-[#1040C5] hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition">

            <i class="fa-solid fa-right-to-bracket"></i>

            Đăng nhập

        </a>

    </div>

</section>

@endguest

@auth

@if(isset($soThichs) && $soThichs->isEmpty())

<section class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8">

    <div class="max-w-2xl mx-auto text-center">

        <div class="w-20 h-20 mx-auto rounded-full bg-blue-100 flex items-center justify-center">

            <i class="fa-solid fa-heart-circle-plus text-4xl text-[#1040C5]"></i>

        </div>

        <h2 class="mt-6 text-3xl font-bold text-[#061755]">

            Bạn chưa thiết lập sở thích

        </h2>

        <p class="mt-4 text-slate-500 leading-8">

            Hãy thiết lập hồ sơ sở thích du lịch để hệ thống
            phân tích và gợi ý những điểm đến phù hợp nhất với bạn.

        </p>

        <a href="{{ route('sothich.index') }}"
            class="inline-flex items-center gap-2 mt-8 bg-[#1040C5] hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition">

            <i class="fa-solid fa-sliders"></i>

            Thiết lập sở thích

        </a>

    </div>

</section>

@endif

@endauth