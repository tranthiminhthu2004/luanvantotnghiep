<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chi tiết khách sạn</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/vn.js"></script>

</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <main class="pt-24">

        <div class="max-w-[1280px] xl:max-w-[1320px] mx-auto px-4 lg:px-5 py-6">

            @include('users.chitietkhachsan.thuvienanh')

            <div class="space-y-5 mt-5">

                @include('users.chitietkhachsan.thongtinkhachsan')

                @include('users.chitietkhachsan.formkiemtra')
               <div id="ketQuaPhong">

               @if($daKiemTraPhong)

               @include('users.chitietkhachsan.danhsachloaiphong')

               @endif

               </div>

                @include('users.chitietkhachsan.bando')

                @include('users.chitietkhachsan.diadiemganday')

            </div>

        </div>

    </main>

    @include('components.footer')

    {{-- Swiper --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
    const diaDiemGanDaySwiper = new Swiper('.diaDiemGanDaySwiper', {

        slidesPerView: 1,

        slidesPerGroup: 1,

        spaceBetween: 20,

        navigation: {

            nextEl: '.diaDiemGanDaySwiper .swiper-button-next',

            prevEl: '.diaDiemGanDaySwiper .swiper-button-prev',

        },

        breakpoints: {

            640: {

                slidesPerView: 2,

                slidesPerGroup: 2,

            },

            1024: {

                slidesPerView: 3,

                slidesPerGroup: 3,

            }

        }

    });
    </script>

</body>

</html>