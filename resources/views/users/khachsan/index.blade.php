<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Khách sạn</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>

<body class="bg-gray-50">

    @include('components.navbar')

<main class="pt-20 lg:pt-24">

    @include('users.khachsan.search')

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div id="ketQuaKhachSan">

            <div class="flex flex-col lg:flex-row gap-6">

                @include('users.khachsan.boloc')

                <div class="flex-1 min-w-0">

                    @include('users.khachsan.header')

                    <div class="space-y-5">

                        @forelse($khachSans as $khachSan)

                            @include('users.khachsan.thekhachsan')

                        @empty

                            <div class="bg-white rounded-2xl border p-10 text-center text-gray-500">

                                Chưa có khách sạn nào

                            </div>

                        @endforelse

                    </div>

                    <div class="mt-10 flex items-center justify-center">

                        {{ $khachSans->links() }}

                    </div>

                </div>

            </div>

        </div>

    </section>

</main>

@include('components.footer')
</body>

</html>