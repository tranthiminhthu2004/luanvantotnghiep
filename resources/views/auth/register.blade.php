<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
    input::-ms-reveal,
    input::-ms-clear {
        display: none;
    }

    input[type="password"]::-webkit-credentials-auto-fill-button,
    input[type="password"]::-webkit-textfield-decoration-container {
        display: none !important;
    }
    </style>

</head>

<body class="bg-[#eef5ff] min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-[32px] shadow-2xl overflow-hidden max-w-[1000px] w-full">

        <div class="grid md:grid-cols-2">

            <!-- LEFT SIDE -->
            <div class="relative min-h-[500px]">

                <img src="{{ asset('images/anhdangki.png') }}" alt="Hotel"
                    class="absolute inset-0 w-full h-full object-cover">

                <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-blue-900/10 to-white/10">
                </div>

                <!-- Logo -->
                <div class="absolute top-8 left-10 z-10">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-32 h-auto">
                </div>

                <!-- Text -->
                <div class="absolute top-28 left-10 right-10 z-10">

                    <h1 class="text-[#061755] text-[40px] font-extrabold leading-tight">

                        Trải nghiệm kỳ nghỉ
                        <span class="text-[#1040C5] ">
                            tuyệt vời
                        </span>

                        cùng chúng tôi

                    </h1>

                    <p class="text-white/90 text-base mt-6 leading-relaxed max-w-md">
                        Đặt phòng dễ dàng, nhanh chóng và tận hưởng
                        những ưu đãi hấp dẫn mỗi ngày.
                    </p>

                </div>

                <!-- FEATURES -->
                <div class="absolute bottom-10 left-8 right-8 z-20">

                    <div class="bg-white/95 backdrop-blur-md rounded-3xl shadow-xl p-5">

                        <div class="grid grid-cols-3 divide-x divide-gray-200">

                            <!-- Ưu đãi -->
                            <div class="text-center px-4">

                                <div class="flex justify-center mb-3">

                                    <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center">

                                        <i class="fa-solid fa-award text-blue-600 text-2xl"></i>

                                    </div>

                                </div>

                                <h4 class="font-semibold text-gray-800 text-sm">
                                    Ưu đãi độc quyền
                                </h4>


                            </div>

                            <!-- Thanh toán -->
                            <div class="text-center px-4">

                                <div class="flex justify-center mb-3">

                                    <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center">

                                        <i class="fa-solid fa-shield-halved text-blue-600 text-2xl"></i>

                                    </div>

                                </div>

                                <h4 class="font-semibold text-gray-800 text-sm">
                                    Thanh toán an toàn
                                </h4>


                            </div>

                            <!-- Hỗ trợ -->
                            <div class="text-center px-4">

                                <div class="flex justify-center mb-3">

                                    <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center">

                                        <i class="fa-solid fa-headset text-blue-600 text-2xl"></i>

                                    </div>

                                </div>

                                <h4 class="font-semibold text-gray-800 text-sm">
                                    Hỗ trợ 24/7
                                </h4>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="p-6 lg:p-8 flex items-center">
                <div class="w-full">

                    <h1 class="text-3xl font-bold text-slate-900 pb-4">
                        Đăng Ký Tài Khoản
                    </h1>

                    <form method="POST" action="{{ route('register') }}">

                        @csrf

                        <!-- Name -->
                        <div class="mb-3">

                            <label class=" text-base block mb-2 font-semibold ">
                                Họ và tên
                            </label>

                            <input type="text" name="name" value="{{ old('name') }}" required
                                placeholder="Nhập họ và tên của bạn"
                                class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-full">
                            @error('name')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">

                            <label class="block mb-2 font-semibold text-base">
                                Email
                            </label>

                            <input type="email" name="email" value="{{ old('email') }}" required
                                placeholder="Nhập email của bạn"
                                class="w-full border border-gray-300  px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-full">

                            @error('email')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>

                        <!-- Password -->
                        <div class="mb-3">

                            <label class="block mb-2 font-semibold text-base">
                                Mật khẩu
                            </label>

                            <div class="relative">

                                <input type="password" id="password" name="password" autocomplete="new-password"
                                    required placeholder="Nhập mật khẩu"
                                    class="w-full border border-gray-300 rounded-full px-3 py-2 pr-14 focus:outline-none focus:ring-2 focus:ring-blue-500">

                                <button type="button" onclick="togglePassword('password','passwordIcon')"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">

                                    <i id="passwordIcon" class="fa-solid fa-eye"></i>

                                </button>

                            </div>
                        </div>
                        @error('password')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                        <!-- Confirm Password -->
                        <div class="mb-5">

                            <label class="block mb-2 font-semibold text-base">
                                Xác nhận mật khẩu
                            </label>

                            <div class="relative">

                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    autocomplete="new-password" required placeholder="Nhập lại mật khẩu"
                                    class="w-full border border-gray-300 rounded-full px-3 py-2 pr-14 focus:outline-none focus:ring-2 focus:ring-blue-500">

                                <button type="button" onclick="togglePassword('password_confirmation','confirmIcon')"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">

                                    <i id="confirmIcon" class="fa-solid fa-eye"></i>

                                </button>

                            </div>

                        </div>

                        <button type="submit"
                            class="w-full bg-[#0c1d4d] hover:bg-[#18357f] text-white py-2 rounded-full font-bold transition duration-300 text-base">
                            Đăng ký
                        </button>

                    </form>

                    <!-- Divider -->
                    <div class="flex items-center my-5">

                        <div class="flex-1 border-t border-gray-300">
                        </div>

                        <span class="mx-4 text-gray-400">
                            Hoặc
                        </span>

                        <div class="flex-1 border-t border-gray-300">
                        </div>

                    </div>

                    <!-- Google Login -->
                    <a href="{{ route('google.login') }}"
                        class="border border-gray-300 rounded-full py-2 flex justify-center items-center gap-3 hover:bg-gray-50 transition">

                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="24" alt="Google">

                        <span class="font-semibold text-base">
                            Đăng ký bằng Google
                        </span>

                    </a>

                    <!-- Login -->
                    <p class="text-center mt-5 text-gray-500 text-base">

                        Đã có tài khoản?

                        <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline text-base">
                            Đăng nhập
                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>
    <script>
    function togglePassword(inputId, iconId) {

        let input = document.getElementById(inputId);
        let icon = document.getElementById(iconId);

        if (!input || !icon) return;

        if (input.type === "password") {

            input.type = "text";

            icon.className = "fa-solid fa-eye-slash";

        } else {

            input.type = "password";

            icon.className = "fa-solid fa-eye";

        }
    }
    </script>
</body>

</html>