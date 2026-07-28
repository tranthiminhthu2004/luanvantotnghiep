<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sở thích du lịch</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100">

    @include('components.navbar')

    <main class="pt-24">

        <div class="max-w-7xl mx-auto px-4 py-8">

            @if(session('success'))

            <div class="mb-6 rounded-xl border border-green-300 bg-green-50 text-green-700 px-5 py-4">

                {{ session('success') }}

            </div>

            @endif

            @if($errors->any())

            <div class="mb-6 rounded-xl border border-red-300 bg-red-50 text-red-700 px-5 py-4">

                <ul class="list-disc ml-5">

                    @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif

            <section class="bg-white rounded-3xl border border-slate-100 shadow-sm p-5 lg:p-7 mb-8">

                <div class="mb-6 text-center">

                    <h2 class="text-4xl font-bold text-[#061755]">

                        Sở thích du lịch

                    </h2>

                    <p class="text-gray-500 mt-2">

                        Thiết lập mức độ yêu thích của bạn đối với từng nhu cầu.
                        Hệ thống sẽ sử dụng thông tin này để gợi ý điểm đến phù hợp.

                    </p>

                </div>
                <div class="flex items-center justify-center gap-3 text-sm text-gray-500 mb-2">

                    <span>

                        1: Không thích

                    </span>

                    <div class="w-48 h-[2px] bg-gradient-to-r from-orange-400 to-green-500">

                    </div>

                    <span>

                        5: Rất thích

                    </span>

                </div>

                <form method="POST" action="{{ route('sothich.store') }}">

                    @csrf

                    <div id="danhSachNhuCau" class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        @foreach($nhuCaus as $index => $nhuCau)

                        @php

                        $mucDoDaChon =
                        $soThichs[$nhuCau->ma_nhu_cau] ?? null;

                        @endphp

                        <div class="rounded-2xl border border-slate-200 bg-white p-4 hover:shadow-md transition">

                            <div class="flex items-center gap-4">

                                <div class="flex-1">

                                    <h3 class="font-bold text-[#061755] text-base">

                                        {{ $nhuCau->ten_nhu_cau }}

                                    </h3>

                                    @if($nhuCau->mo_ta)

                                    <p class="text-sm text-slate-500 mt-1">

                                        {{ $nhuCau->mo_ta }}

                                    </p>

                                    @endif

                                    <div class="mt-3 grid grid-cols-5 gap-3">

                                        @for($i=1;$i<=5;$i++) <label class="cursor-pointer text-center">

                                            <span class="block text-xs font-semibold text-slate-600 mb-1">

                                                {{ $i }}

                                            </span>

                                            <input type="radio" name="muc_do_uu_tien[{{ $nhuCau->ma_nhu_cau }}]"
                                                value="{{ $i }}" class="peer hidden radioMucDo"
                                                data-checked="{{ $mucDoDaChon == $i ? 'true' : 'false' }}"
                                                {{ $mucDoDaChon == $i ? 'checked' : '' }}>

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

                    <div class="mt-6 flex flex-col items-center gap-3">

                        <div class="mt-8 flex flex-wrap justify-center gap-4">

                            <a href="{{ route('diadiemdulich.index')}}"
                                class="inline-flex items-center justify-center gap-2 bg-slate-200 hover:bg-slate-300 text-black px-8 py-3 rounded-xl font-semibold transition shadow-sm">

                                Quay lại

                            </a>

                            <button type="submit"
                                class="inline-flex items-center justify-center gap-2 bg-[#1040C5] hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition shadow-sm">

                                <i class="fa-solid fa-floppy-disk"></i>

                                Lưu sở thích

                            </button>

                        </div>

                    </div>

                </form>

            </section>

        </div>

    </main>

    @include('components.footer')

    <script>
    document.querySelectorAll('.radioMucDo').forEach(function(radio) {

        radio.addEventListener('click', function() {

            const daChon = this.dataset.checked === 'true';

            // Reset trạng thái của tất cả radio cùng nhóm
            document.querySelectorAll(
                'input[name="' + this.name + '"]'
            ).forEach(function(item) {

                item.dataset.checked = 'false';

            });

            if (daChon) {

                this.checked = false;

                this.dataset.checked = 'false';

            } else {

                this.checked = true;

                this.dataset.checked = 'true';

            }

        });

    });
    </script>

</body>

</html>