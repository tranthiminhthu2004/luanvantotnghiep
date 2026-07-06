<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm khách sạn</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <div class="pt-24">

        {{-- Search --}}
        @include('users.khachsan.search')

        <section class="max-w-7xl mx-auto px-4 py-8">

            <div class="flex flex-col lg:flex-row gap-6">

                {{-- Sidebar --}}
                @include('users.khachsan.boloc')

                {{-- Nội dung --}}
                <div class="flex-1 min-w-0">

                    {{-- Banner kết quả --}}
                    <div class="mb-6">

                        <h1 class="text-3xl font-bold text-slate-800 mb-4">

                            Tìm thấy {{ $khachSans->total() }} khách sạn phù hợp

                        </h1>

                        {{-- Danh sách khách sạn --}}
                        <div class="space-y-5">

                            @forelse($khachSans as $khachSan)

                            @include('users.khachsan.thekhachsan')

                            @empty

                            <div class="bg-white rounded-3xl border shadow-sm p-12 text-center">

                                <div
                                    class="w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center mx-auto">

                                    <i class="fa-solid fa-hotel text-3xl text-slate-400"></i>

                                </div>

                                <h3 class="text-2xl font-bold text-slate-700 mt-5">

                                    Không tìm thấy khách sạn

                                </h3>

                                <p class="text-gray-500 mt-2">

                                    Vui lòng thử địa điểm khác hoặc thay đổi
                                    điều kiện tìm kiếm.

                                </p>

                            </div>

                            @endforelse

                        </div>
                        @if(isset($diaDiemDuLichs) && $diaDiemDuLichs->count() > 0)

                        <div class="mb-8">

                            <h2 class="text-2xl font-bold text-slate-800 mb-4">

                                Địa điểm du lịch tại khu vực này

                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">

                                @foreach($diaDiemDuLichs as $diaDiemDuLich)

                                <div class="bg-white rounded-3xl border shadow-sm p-5 hover:shadow-md transition">

                                    <h3 class="text-lg font-bold text-[#061755]">

                                        {{ $diaDiemDuLich->ten_dia_diem_du_lich }}

                                    </h3>

                                    <p class="text-gray-500 mt-2 line-clamp-2">

                                        {{ $diaDiemDuLich->mo_ta ?? 'Địa điểm du lịch phù hợp để tham quan trong chuyến đi của bạn.' }}

                                    </p>

                                    <p class="text-sm text-gray-400 mt-3">

                                        {{ $diaDiemDuLich->diaDiem->ten_dia_diem ?? '' }}

                                    </p>

                                </div>

                                @endforeach

                            </div>

                        </div>

                        @endif

                        {{-- Phân trang --}}
                        <div class="mt-8">

                            {{ $khachSans->links() }}

                        </div>

                    </div>

                </div>

        </section>

    </div>

</body>

</html>