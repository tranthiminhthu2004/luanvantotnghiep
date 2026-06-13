<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết khách sạn</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-4 py-6">

        @include('users.chitietkhachsan.thuvienanh')

        <div class="grid grid-cols-12 gap-5 mt-5">

            <div class="col-span-8">

                @include('users.chitietkhachsan.thongtinkhachsan')

                @include('users.chitietkhachsan.danhsachphong')

            </div>

            <div class="col-span-4">
                @include('users.chitietkhachsan.diadiemganday')
                @include('users.chitietkhachsan.danhgia')

                @include('users.chitietkhachsan.bando')

            </div>

        </div>

        @include('users.chitietkhachsan.khachsantuongtu')

    </div>

</body>

</html>