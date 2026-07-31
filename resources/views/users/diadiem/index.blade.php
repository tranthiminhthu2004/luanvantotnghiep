<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>

        {{ $diaDiem->ten_dia_diem }}

    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <main class="max-w-7xl mx-auto px-4 lg:px-8 pt-24 ">

        @include('users.diadiem.gioithieu')

        @include('users.diadiem.diadiemdulich')

        @include('users.diadiem.khachsan')

    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
    const diaDiemSwiper = new Swiper('.diaDiemSwiper', {

        slidesPerView: 1,

        spaceBetween: 24,

        navigation: {

            nextEl: '.diaDiemSwiper .swiper-button-next',

            prevEl: '.diaDiemSwiper .swiper-button-prev',

        },

        breakpoints: {

            640: {

                slidesPerView: 2,

            },

            1280: {

                slidesPerView: 3,

            }

        }

    });
    const khachSanSwiper = new Swiper('.khachSanSwiper', {

        slidesPerView: 1,

        slidesPerGroup: 1,

        spaceBetween: 24,

        navigation: {

            nextEl: '.khachSanSwiper .swiper-button-next',

            prevEl: '.khachSanSwiper .swiper-button-prev',

        },

        breakpoints: {

            640: {

                slidesPerView: 2,

                slidesPerGroup: 2,

            },

            1280: {

                slidesPerView: 3,

                slidesPerGroup: 3,

            }

        }

    });
    </script>

</body>

</html>