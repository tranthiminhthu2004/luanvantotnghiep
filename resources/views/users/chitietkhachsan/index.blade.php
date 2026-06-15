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

    <div class="pt-24">

        <div class="max-w-7xl mx-auto px-4 py-6">

            {{-- Thư viện ảnh --}}
            @include('users.chitietkhachsan.thuvienanh')

            {{-- Nội dung --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 mt-5">

                {{-- Cột trái --}}
                <div class="lg:col-span-8">

                    @include('users.chitietkhachsan.thongtinkhachsan')

                    @include('users.chitietkhachsan.danhsachphong')

                </div>

                {{-- Cột phải --}}
                <div class="lg:col-span-4 space-y-5">

                    @include('users.chitietkhachsan.diadiemganday')

                    @include('users.chitietkhachsan.danhgia')

                    @include('users.chitietkhachsan.bando')

                </div>

            </div>

            {{-- Khách sạn tương tự --}}
            <div class="mt-8">

                @include('users.chitietkhachsan.khachsantuongtu')

            </div>

        </div>

    </div>

</body>

</html>