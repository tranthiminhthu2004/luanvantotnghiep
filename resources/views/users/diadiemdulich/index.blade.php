<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gợi ý điểm đến du lịch</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <div class="pt-24">

        {{-- BANNER --}}
        <section class="bg-gradient-to-r from-blue-50 via-white to-cyan-50 border-b border-slate-100">

            <div class="max-w-7xl mx-auto px-4 lg:px-8 py-10 lg:py-12">

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

                    {{-- Nội dung bên trái --}}
                    <div>

                        <p class="text-[#1040C5] font-bold uppercase tracking-wide text-sm">

                            Gợi ý điểm đến du lịch

                        </p>

                        <h1 class="text-4xl lg:text-5xl font-bold text-[#061755] mt-3 leading-tight">

                            Tìm điểm đến phù hợp với nhu cầu của bạn

                        </h1>

                        <p class="text-gray-600 mt-4 text-base lg:text-lg leading-7 max-w-2xl">

                            Chọn các nhu cầu du lịch và đánh giá mức độ ưu tiên từ 1 đến 5.
                            Hệ thống sẽ phân tích dữ liệu để gợi ý những điểm đến có mức độ phù hợp cao nhất.

                        </p>

                        <div class="mt-6 flex flex-wrap gap-3">

                            <div
                                class="inline-flex items-center gap-2 bg-white border border-blue-100 rounded-full px-4 py-2 text-sm font-semibold text-[#1040C5] shadow-sm">

                                <i class="fa-solid fa-list-check"></i>

                                Chọn nhu cầu

                            </div>

                            <div
                                class="inline-flex items-center gap-2 bg-white border border-blue-100 rounded-full px-4 py-2 text-sm font-semibold text-[#1040C5] shadow-sm">

                                <i class="fa-solid fa-ranking-star"></i>

                                Đánh giá ưu tiên

                            </div>

                            <div
                                class="inline-flex items-center gap-2 bg-white border border-blue-100 rounded-full px-4 py-2 text-sm font-semibold text-[#1040C5] shadow-sm">

                                <i class="fa-solid fa-location-dot"></i>

                                Nhận kết quả gợi ý

                            </div>

                        </div>

                    </div>

                    {{-- Khối giới thiệu bên phải, không dùng dữ liệu cứng --}}
                    <div class="hidden lg:flex justify-end">

                        <div class="w-full max-w-md bg-white rounded-[2rem] border border-blue-100 shadow-sm p-7">

                            <div
                                class="w-16 h-16 rounded-2xl bg-blue-50 text-[#1040C5] flex items-center justify-center">

                                <i class="fa-solid fa-map-location-dot text-3xl"></i>

                            </div>

                            <h3 class="text-2xl font-bold text-[#061755] mt-5">

                                Cách hệ thống gợi ý

                            </h3>

                            <p class="text-gray-500 text-sm mt-3 leading-6">

                                Hệ thống xây dựng vector nhu cầu người dùng dựa trên mức độ ưu tiên đã chọn,
                                sau đó so sánh với vector đặc trưng của từng điểm đến trong dữ liệu.

                            </p>

                            <div class="mt-6 space-y-4">

                                <div class="flex items-start gap-3">

                                    <div
                                        class="w-9 h-9 rounded-full bg-blue-50 text-[#1040C5] flex items-center justify-center shrink-0">

                                        <span class="font-bold">1</span>

                                    </div>

                                    <div>

                                        <h4 class="font-bold text-[#061755]">

                                            Chọn nhu cầu

                                        </h4>

                                        <p class="text-sm text-gray-500 mt-1">

                                            Người dùng chọn các nhu cầu du lịch mong muốn.

                                        </p>

                                    </div>

                                </div>

                                <div class="flex items-start gap-3">

                                    <div
                                        class="w-9 h-9 rounded-full bg-blue-50 text-[#1040C5] flex items-center justify-center shrink-0">

                                        <span class="font-bold">2</span>

                                    </div>

                                    <div>

                                        <h4 class="font-bold text-[#061755]">

                                            Chọn mức ưu tiên

                                        </h4>

                                        <p class="text-sm text-gray-500 mt-1">

                                            Mỗi nhu cầu được đánh giá từ 1 đến 5.

                                        </p>

                                    </div>

                                </div>

                                <div class="flex items-start gap-3">

                                    <div
                                        class="w-9 h-9 rounded-full bg-blue-50 text-[#1040C5] flex items-center justify-center shrink-0">

                                        <span class="font-bold">3</span>

                                    </div>

                                    <div>

                                        <h4 class="font-bold text-[#061755]">

                                            Tính mức độ phù hợp

                                        </h4>

                                        <p class="text-sm text-gray-500 mt-1">

                                            Kết quả được sắp xếp theo điểm tương đồng giảm dần.

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        {{-- NỘI DUNG CHÍNH --}}
        <main class="max-w-7xl mx-auto px-4 lg:px-8 py-8">

            {{-- Form chọn nhu cầu + mức độ ưu tiên --}}
            @include('users.diadiemdulich.formuutien')

            {{-- THÔNG BÁO LỖI --}}

            {{-- Kết quả gợi ý --}}
            @if(isset($ketQuaGoiY))

            @include('users.diadiemdulich.ketqua')

            @endif

        </main>

    </div>

    @include('components.footer')

    <script>
    document.addEventListener('DOMContentLoaded', function() {

        const btnXemTatCa =
            document.getElementById('btnXemTatCaNhuCau');

        if (!btnXemTatCa) {
            return;
        }

        btnXemTatCa.addEventListener('click', function() {

            document
                .querySelectorAll('.nhu-cau-an')
                .forEach(function(item) {

                    item.classList.remove('hidden');

                });

            btnXemTatCa.remove();

        });

    });
    </script>

</body>

</html>