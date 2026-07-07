<section class="bg-white rounded-3xl border border-slate-100 shadow-sm p-5 lg:p-7 mb-8">

    <div class="mb-6">

        <h2 class="text-3xl font-bold text-[#1040C5]">

            Chọn nhu cầu du lịch của bạn

        </h2>

        <p class="text-gray-500 mt-2">

            Đánh giá mức độ ưu tiên cho từng nhu cầu từ 1 đến 5.
            Trong đó 1 là ít ưu tiên, 5 là rất ưu tiên.

        </p>

    </div>

    <form method="POST" action="{{ route('diadiemdulich.goiy') }}">

        @csrf

        <div id="danhSachNhuCau" class="grid grid-cols-1 md:grid-cols-2 gap-4">

            @foreach($nhuCaus as $index => $nhuCau)

            @php
            $mucDoDaChon = $mucDoUuTienNguoiDung[$nhuCau->ma_nhu_cau] ?? null;
            @endphp

            <div class="nhu-cau-item {{ $index >= 10 ? 'nhu-cau-an hidden' : '' }}
                    rounded-2xl border border-slate-200 bg-white p-4 hover:shadow-md transition">

                <div class="flex items-center gap-4">

                    {{-- Nội dung --}}
                    <div class="flex-1">

                        <h3 class="font-bold text-[#061755]">

                            {{ $nhuCau->ten_nhu_cau }}

                        </h3>

                        <div class="mt-3 grid grid-cols-5 gap-3">

                            @for($i = 1; $i <= 5; $i++) <label class="cursor-pointer text-center labelMucDoUuTien">

                                <span class="block text-xs font-semibold text-slate-600 mb-1">

                                    {{ $i }}

                                </span>

                                <input type="radio" name="muc_do_uu_tien[{{ $nhuCau->ma_nhu_cau }}]" value="{{ $i }}"
                                    class="peer hidden radioMucDoUuTien" {{ $mucDoDaChon == $i ? 'checked' : '' }}>

                                <span class="w-4 h-4 rounded-full border border-slate-300 inline-flex items-center justify-center transition
                                            peer-checked:border-[#1040C5]
                                            peer-checked:bg-[#1040C5]
                                            peer-checked:ring-4
                                            peer-checked:ring-blue-100">
                                </span>

                                </label>

                                @endfor

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        @if($nhuCaus->count() > 10)

        <div class="mt-5 flex justify-center">

            <button type="button" id="btnXemTatCaNhuCau" class="text-[#1040C5] font-semibold hover:underline">

                Xem tất cả nhu cầu

            </button>

        </div>

        @endif

        @error('muc_do_uu_tien')

        <p class="text-red-500 mt-4 text-sm text-center">

            {{ $message }}

        </p>

        @enderror

        <div class="mt-6 flex flex-col items-center gap-3">

            <div class="flex items-center gap-3 text-sm text-gray-500">

                <span>1: Ít ưu tiên</span>

                <div class="w-48 h-[2px] bg-gradient-to-r from-orange-400 to-green-500"></div>

                <span>5: Rất ưu tiên</span>

            </div>

            <button type="submit"
                class="inline-flex items-center justify-center gap-2 bg-[#1040C5] hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition shadow-sm">

                <i class="fa-solid fa-magnifying-glass"></i>

                Gợi ý điểm đến phù hợp

            </button>

        </div>

    </form>

</section>