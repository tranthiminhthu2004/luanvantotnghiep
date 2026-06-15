<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

    @include('components.navbar')
    <div class="pt-24">
        @include('users.trangchu.search')
        @include('users.trangchu.nhucaudulich')
        @include('users.trangchu.diemdennoibat')
        @include('users.trangchu.khachsannoibat')
        @include('components.footer')
    </div>
</body>

</html>