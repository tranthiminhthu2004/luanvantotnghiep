<section class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 p-6 border-b border-slate-200">

        <div>

            <h2 class="text-4xl font-bold text-[#061755] flex items-center gap-3">

                Hồ sơ sở thích của bạn

            </h2>

        </div>

        <a href="{{ route('sothich.index') }}"
            class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-[#1040C5] text-[#1040C5] hover:bg-blue-50 transition">

            <i class="fa-solid fa-sliders"></i>

            Cập nhật sở thích

        </a>

    </div>

    {{-- Danh sách sở thích --}}
    <div class="p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            @foreach($soThichs as $soThich)

            <div class="flex items-center justify-between rounded-2xl bg-slate-50 border border-slate-200 p-5">

                <div>

                    <h3 class="font-bold text-lg text-[#061755]">

                        {{ $soThich->nhuCau->ten_nhu_cau }}

                    </h3>

                </div>

                <div class="text-right">

                    <div class="flex justify-end gap-1">

                        @for($i = 1; $i <= 5; $i++) <i class="fa-solid fa-star
                        {{ $i <= $soThich->muc_do_uu_tien
                            ? 'text-yellow-400'
                            : 'text-slate-300' }}">
                            </i>

                            @endfor

                    </div>

                    <p class="mt-2 text-[#1040C5] font-bold">

                        {{ $soThich->muc_do_uu_tien }}/5

                    </p>

                </div>

            </div>

            @endforeach

        </div>

    </div>

    {{-- Footer --}}
    {{-- Footer --}}
    <div class="border-t border-slate-200 p-6 flex justify-center">

        <form method="POST" action="{{ route('diadiemdulich.goiy') }}">

            @csrf

            <button type="submit"
                class="inline-flex items-center gap-2 bg-[#1040C5] hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition shadow-sm">

                <i class="fa-solid fa-wand-magic-sparkles"></i>

                Gợi ý điểm đến cho tôi

            </button>

        </form>

    </div>

</section>