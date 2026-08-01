<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trở thành đối tác</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <div class="pt-24">

        <main class="max-w-7xl mx-auto px-4 lg:px-8 pb-20">

            @include('users.doitac.gioithieu')

            @include('users.doitac.loiich')

            @include('users.doitac.cauhoithuonggap')

        </main>

    </div>

    @include('components.footer')

</body>

</html>