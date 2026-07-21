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

    <main class="pt-24">

        <div class="max-w-[1250px] mx-auto px-4 sm:px-6 lg:px-6 py-8">


            <form id="datPhongForm" method="POST" action="{{ route('thanhtoan.index') }}">

                @csrf

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 lg:p-8">

                    <h1 class="text-xl sm:text-3xl lg:text-4xl font-bold text-[#061755] mb-8">

                        Xác nhận đặt phòng

                    </h1>
                    <div class="border-t border-slate-200 my-8"></div>
                    {{-- Thông tin khách sạn --}}
                    @include('users.datphong.thongtinkhachsan')

                    <div class="border-t border-slate-200 my-8"></div>

                    {{-- Thông tin khách hàng --}}
                    @include('users.datphong.thongtinkhachhang')

                    <div class="border-t border-slate-200 my-8"></div>

                    {{-- Thông tin lưu trú --}}
                    @include('users.datphong.thongtinluutru')

                    <div class="border-t border-slate-200 my-8"></div>

                    {{-- Danh sách phòng --}}
                    @include('users.datphong.phongdachon')

                </div>

            </form>

        </div>

    </main>

    @include('components.footer')

</body>

</html>