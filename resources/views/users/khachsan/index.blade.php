<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Khách Sạn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>
    @include('components.navbar')
    @include('users.khachsan.search')
    <section class="max-w-7xl mx-auto px-4 py-8">

        <div class="flex gap-6">

            {{-- Sidebar bộ lọc --}}
            @include('users.khachsan.boloc')

            {{-- Danh sách khách sạn --}}
            <div class="flex-1">

                {{-- Header --}}
                @include('users.khachsan.header')

                {{-- Danh sách --}}
                <div class="space-y-5">

                    @foreach($khachSans as $khachSan)

                    @include('users.khachsan.thekhachsan')

                    @endforeach

                </div>



            </div>

        </div>

    </section>
</body>

</html>