<section class="max-w-7xl mx-auto px-4 lg:px-8 pt-10 lg:pt-10">

    <div class="mb-8">

        <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-[#061755] leading-tight">

            Chọn điểm đến theo sở thích của bạn

        </h2>

    </div>

    <form method="POST" action="{{ route('goiy.xuly') }}">

        @csrf

        <div id="danhSachNhuCau" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-3 md:gap-4">

            @foreach($nhuCaus as $index => $nhuCau)

            <label class="block cursor-pointer {{ $index >= 10 ? 'nhu-cau-an hidden' : '' }}">

                <input type="checkbox" name="nhu_cau[]" value="{{ $nhuCau->ma_nhu_cau }}" class="peer hidden"
                    {{ isset($nhuCauNguoiDung) && in_array($nhuCau->ma_nhu_cau, $nhuCauNguoiDung) ? 'checked' : '' }}>

                <div class="h-[72px] rounded-2xl border border-slate-200 bg-white px-4 flex items-center justify-center text-center shadow-sm transition
                        hover:shadow-md
                        peer-checked:border-[#1040C5]
                        peer-checked:bg-blue-50
                        peer-checked:ring-2
                        peer-checked:ring-[#1040C5]">

                    <h3 class="font-semibold text-[#061755] text-sm md:text-base leading-5">

                        {{ $nhuCau->ten_nhu_cau }}

                    </h3>

                </div>

            </label>

            @endforeach

        </div>

        @if($nhuCaus->count() > 10)

        <div class="mt-5 flex justify-center">

            <button type="button" id="btnXemTatCaNhuCau" class="text-[#1040C5] font-semibold hover:underline">

                Xem tất cả

            </button>

        </div>

        @endif

        @error('nhu_cau')

        <p class="text-red-500 mt-4 text-sm text-center">

            {{ $message }}

        </p>

        @enderror

        <div class="mt-8 flex justify-center">

            <button type="submit"
                class="bg-[#1040C5] hover:bg-blue-700 text-white px-8 py-3 rounded-full font-semibold transition">

                Gợi ý điểm đến phù hợp

            </button>

        </div>

    </form>

</section>

<script>
document.addEventListener('DOMContentLoaded', function() {

    const btnXemTatCa =
        document.getElementById('btnXemTatCaNhuCau');

    if (!btnXemTatCa) {
        return;
    }

    btnXemTatCa.addEventListener('click', function() {

        const danhSachAn =
            document.querySelectorAll('.nhu-cau-an');

        danhSachAn.forEach(function(item) {

            item.classList.remove('hidden');

        });

        btnXemTatCa.remove();

    });

});
</script>