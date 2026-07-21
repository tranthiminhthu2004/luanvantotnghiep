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

                    {{-- Kết quả khách sạn --}}
                    <div class="mb-10">

                        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-5">

                            <div>

                                <h1 class="text-3xl font-bold text-[#061755] mt-2">

                                    Tìm thấy {{ $khachSans->total() }} khách sạn phù hợp

                                </h1>

                            </div>

                        </div>

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

                                    Vui lòng thử địa điểm khác hoặc thay đổi điều kiện tìm kiếm.

                                </p>

                            </div>

                            @endforelse

                        </div>

                        {{-- Phân trang --}}
                        @if($khachSans->hasPages())

                        <div class="mt-8">

                            {{ $khachSans->links() }}

                        </div>

                        @endif

                    </div>

                </div>

            </div>

        </section>

    </div>
    @include('components.footer')

</body>

</html>