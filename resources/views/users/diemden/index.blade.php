<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>

        {{ $diemDen->ten_dia_diem }}

    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <main class="max-w-7xl mx-auto px-4 lg:px-8 pb-10 pt-24">

        @include('users.diemden.thongtin')

        @include('users.diemden.khachsanganday')

    </main>

    @include('components.footer')

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
    new Swiper(".khachSanGanDaySwiper", {

        slidesPerView: 1,

        spaceBetween: 24,

        navigation: {

            nextEl: ".khachSanGanDayNext",

            prevEl: ".khachSanGanDayPrev",

        },

        breakpoints: {

            640: {

                slidesPerView: 2,

            },

            1024: {

                slidesPerView: 3,

            }

        }

    });
    </script>

</body>

</html>