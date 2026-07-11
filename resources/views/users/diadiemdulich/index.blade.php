<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gợi ý điểm đến du lịch</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <div class="pt-24">

        @include('users.diadiemdulich.search')

        {{-- Nội dung --}}
        <main class="max-w-7xl mx-auto px-4 lg:px-8 py-8 space-y-8">

            @include('users.diadiemdulich.trangthai')

            @auth

            @if(isset($soThichs) && $soThichs->isNotEmpty())

            @include('users.diadiemdulich.hososothich')

            @endif

            @endauth

            @if(isset($ketQuaGoiY) && count($ketQuaGoiY) > 0)

            @include('users.diadiemdulich.ketqua')

            @endif

        </main>

    </div>

    @include('components.footer')

</body>

</html>