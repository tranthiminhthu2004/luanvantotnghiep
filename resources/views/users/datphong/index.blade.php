<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt phòng</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-slate-100">

    @include('components.navbar')

    <div class="pt-24">

        <div class="max-w-5xl mx-auto px-4 py-8">

            <h1 class="text-4xl font-bold text-slate-800 mb-8">

                Xác nhận đặt phòng

            </h1>

            <form id="datPhongForm" method="POST" action="{{ route('datphong.store') }}">

                @csrf

                {{-- Thông tin khách sạn --}}
                @include('users.datphong.thongtinkhachsan')

                {{-- Thông tin khách hàng --}}
                <div class="mt-6">
                    @include('users.datphong.thongtinkhachhang')
                </div>

                {{-- Thông tin lưu trú --}}
                <div class="mt-6">
                    @include('users.datphong.thongtinluutru')
                </div>

                {{-- Danh sách phòng đã chọn --}}
                <div class="mt-6">
                    @include('users.datphong.phongdachon')
                </div>


            </form>

        </div>

    </div>

</body>

</html>