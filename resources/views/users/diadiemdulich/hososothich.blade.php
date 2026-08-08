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
<div class="border-t border-slate-200 p-6 flex justify-center">

    <form id="formGoiY" method="POST" action="{{ route('diadiemdulich.goiy') }}">

        @csrf

        <button
            type="submit"
            id="btnGoiY"
            class="inline-flex items-center gap-2 bg-[#1040C5] hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition shadow-sm">

            <span>Gợi ý điểm đến cho tôi</span>

        </button>

    </form>

</div>

</section>
<script>

document.addEventListener('DOMContentLoaded', function () {

    const formGoiY = document.getElementById('formGoiY');

    const btnGoiY = document.getElementById('btnGoiY');

    const ketQuaGoiY = document.getElementById('ketQuaGoiY');


    if (!formGoiY || !ketQuaGoiY) {
        return;
    }


    formGoiY.addEventListener('submit', function (event) {

        // Không cho form reload trang
        event.preventDefault();


        // Trạng thái nút
        btnGoiY.disabled = true;

        btnGoiY.innerHTML = `
            <i class="fa-solid fa-spinner fa-spin"></i>
            <span>Đang phân tích sở thích...</span>
        `;


        const formData = new FormData(formGoiY);


        fetch(formGoiY.action, {

            method: 'POST',

            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            },

            body: formData

        })

        .then(response => {

            if (!response.ok) {
                throw new Error('Không thể lấy kết quả gợi ý.');
            }

            return response.text();

        })

        .then(html => {

            // Đổ kết quả vào đúng vị trí
            ketQuaGoiY.innerHTML = html;


            // Khởi tạo lại Swiper nếu có
            if (typeof khoiTaoSwiperGoiY === 'function') {
                khoiTaoSwiperGoiY();
            }


            // Cuộn xuống phần kết quả
            ketQuaGoiY.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });

        })

        .catch(error => {

            console.error(error);

            ketQuaGoiY.innerHTML = `
                <div class="bg-red-50 border border-red-200 rounded-2xl p-8 text-center">

                    <i class="fa-solid fa-circle-exclamation text-red-500 text-3xl"></i>

                    <p class="mt-3 text-red-500 font-medium">
                        Không thể tạo gợi ý. Vui lòng thử lại.
                    </p>

                </div>
            `;

        })

        .finally(() => {

            // Khôi phục nút
            btnGoiY.disabled = false;

            btnGoiY.innerHTML = `
                <i class="fa-solid fa-wand-magic-sparkles"></i>
                <span>Gợi ý điểm đến cho tôi</span>
            `;

        });

    });

});

</script>