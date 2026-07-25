<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tra cứu đơn đặt phòng</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <main class="pt-24">

        {{-- Form tra cứu --}}
        @include('users.tracuudatphong.search')

        {{-- Thông báo không tìm thấy --}}
        @if(session('error'))

        <section class="max-w-7xl mx-auto px-4 py-10">

            <div class="bg-white rounded-2xl shadow-md p-8 text-center">

                <i class="fa-solid fa-circle-xmark text-6xl text-red-500 mb-5"></i>

                <h2 class="text-2xl font-bold text-gray-800">

                    Không tìm thấy đơn đặt phòng

                </h2>

                <p class="mt-3 text-gray-500">

                    {{ session('error') }}

                </p>

            </div>

        </section>

        @endif

        {{-- Kết quả --}}
        @isset($datPhong)

        @include('users.tracuudatphong.ketqua')

        @endisset

    </main>

    @include('components.footer')

</body>

</html>