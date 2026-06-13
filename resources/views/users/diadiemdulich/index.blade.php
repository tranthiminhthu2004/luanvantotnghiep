<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điểm đến du lịch</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-50">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Banner tìm kiếm --}}
    @include('users.diadiemdulich.searchdd')

    <div class="max-w-7xl mx-auto px-4 py-12">

        {{-- Địa điểm nổi bật --}}
        @include('users.diadiemdulich.diadiemnoibat')

        {{-- Khám phá địa điểm --}}
        <section class="mt-16">

            <h2 class="text-6xl font-bold mb-8 text-[#061755]">

                Khám phá địa điểm

            </h2>

            <div class="grid grid-cols-12 gap-6">

                {{-- Bộ lọc --}}
                <div class="col-span-3">

                    @include('users.diadiemdulich.boloc')

                </div>

                {{-- Danh sách địa điểm --}}
                <div class="col-span-9">

                    <div class="grid grid-cols-3 gap-6">

                        @include('users.diadiemdulich.thediadiem')

                        @include('users.diadiemdulich.thediadiem')

                        @include('users.diadiemdulich.thediadiem')

                    </div>

                </div>

            </div>

        </section>

        {{-- Địa điểm theo nhu cầu --}}
        @include('users.trangchu.nhucaudulich')

        {{-- Khách sạn gần địa điểm --}}
        @include('users.diadiemdulich.khachsanganday')

    </div>

</body>

</html>