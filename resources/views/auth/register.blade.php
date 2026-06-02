<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Fredoka:wdth,wght@100.6,527&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

    .montserrat {
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
    }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6" ">

    <div class=" bg-gray-100 rounded-3xl shadow-2xl overflow-hidden max-w-4xl w-full">

    <div class="grid md:grid-cols-2">

        <!-- BÊN TRÁI -->
        <div class="bg-[#DCEEFF] flex flex-col justify-center items-center p-10 mt-1">

            <img src="{{ asset('images/anhdangki.jpg') }}" alt="Hotel"
                class="rounded-3xl shadow-lg w-full max-w-md h-3/4">

            <h2 class="text-4xl font-bold text-gray-800 mt-8 montserrat">
                HOTEL BOOKING
            </h2>

            <p class="text-gray-600 mt-3 text-center">
                Đặt phòng khách sạn dễ dàng, nhanh chóng và tiện lợi.
            </p>

        </div>

        <!-- BÊN PHẢI -->
        <div class="p-8 flex items-center">

            <div class="w-full">

                <h1 class="text-5xl font-bold text-gray-900 mb-2 montserrat">
                    Đăng ký
                </h1>

                <p class=" text-black mb-8">
                    Tạo tài khoản mới
                </p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-5">

                        <label class="block mb-2 font-medium">
                            Email
                        </label>

                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Nhập email">

                        @error('email')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    <!-- Password -->
                    <div class="mb-6">

                        <label class="block mb-2 font-medium">
                            Mật khẩu
                        </label>

                        <input type="password" name="password" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Nhập mật khẩu">

                        @error('password')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    <!-- Button Register -->
                    <button type="submit"
                        class="w-full bg-black text-white py-3 rounded-xl font-semibold hover:bg-gray-800 transition">
                        Đăng ký
                    </button>

                </form>

                <!-- Divider -->
                <div class="flex items-center my-6">

                    <div class="flex-1 border-t border-gray-300"></div>

                    <span class="mx-4 text-gray-400">
                        Hoặc
                    </span>

                    <div class="flex-1 border-t border-gray-300"></div>

                </div>

                <!-- Google -->
                <a href="{{ route('google.login') }}"
                    class="border border-gray-300 rounded-xl py-3 flex justify-center items-center gap-3 hover:bg-gray-50 transition">

                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="22">

                    <span class="font-medium">
                        Đăng ký bằng Google
                    </span>

                </a>

                <!-- Login -->
                <p class="text-center mt-8 text-black">

                    Đã có tài khoản?

                    <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">
                        Đăng nhập
                    </a>

                </p>

            </div>

        </div>

    </div>

    </div>

</body>

</html>