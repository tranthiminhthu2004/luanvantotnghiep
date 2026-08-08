<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gợi ý điểm đến du lịch</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

</head>

<body class="bg-slate-50">

@include('components.navbar')


<div class="pt-24">

    {{-- Khung tìm kiếm / nút gợi ý --}}
    @include('users.diadiemdulich.search')


    <main class="max-w-7xl mx-auto px-4 lg:px-8 py-8 space-y-8">

        {{-- Trạng thái --}}
        @include('users.diadiemdulich.trangthai')


        {{-- Hồ sơ sở thích --}}
        @auth

            @if(isset($soThichs) && $soThichs->isNotEmpty())

                @include('users.diadiemdulich.hososothich')

            @endif

        @endauth


        {{-- KẾT QUẢ GỢI Ý --}}
        <div id="ketQuaGoiY">

            @if(isset($ketQuaGoiY) && count($ketQuaGoiY) > 0)

                @include('users.diadiemdulich.ketqua')

            @endif

        </div>

    </main>

</div>


@include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

   <script>

function khoiTaoSwiperGoiY() {

    const swiperElement = document.querySelector(
        '#ketQuaGoiY .ketQuaGoiYSwiper'
    );

    if (!swiperElement) {
        return;
    }

    // Nếu Swiper cũ tồn tại thì hủy trước
    if (swiperElement.swiper) {
        swiperElement.swiper.destroy(true, true);
    }

    new Swiper(swiperElement, {

        slidesPerView: 1,

        spaceBetween: 24,

        navigation: {

            nextEl: swiperElement.querySelector(
                '.swiper-button-next'
            ),

            prevEl: swiperElement.querySelector(
                '.swiper-button-prev'
            ),

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

}

// Khởi tạo khi trang vừa mở
document.addEventListener('DOMContentLoaded', function () {

    khoiTaoSwiperGoiY();

});

</script>

</body>

</html>