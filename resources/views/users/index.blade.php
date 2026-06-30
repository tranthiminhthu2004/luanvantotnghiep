<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trang chủ</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <main class="pt-24">

        @include('users.trangchu.search')

        @include('users.trangchu.nhucaudulich')

        @include('users.trangchu.diemdennoibat')

        @include('users.trangchu.khachsannoibat')

    </main>

    @include('components.footer')

</body>

</html>