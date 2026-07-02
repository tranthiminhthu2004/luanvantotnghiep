<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chi tiết khách sạn</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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

                @if($daKiemTraPhong)

                @include('users.chitietkhachsan.danhsachloaiphong')

                @else

                @include('users.chitietkhachsan.formkiemtra')

                @endif

                @include('users.chitietkhachsan.bando')

                @include('users.chitietkhachsan.danhgia')

                @include('users.chitietkhachsan.diadiemganday')

            </div>
            <div class="mt-8">

                @include('users.chitietkhachsan.khachsantuongtu')

            </div>

        </div>

    </main>

    @include('components.footer')

</body>

</html>