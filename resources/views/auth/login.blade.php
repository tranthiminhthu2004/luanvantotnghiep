<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập tài khoản</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-[#eef5ff] min-h-screen flex items-center justify-center p-6">

    <div class="bg-white rounded-[40px] shadow-2xl overflow-hidden max-w-5xl w-full">

        <div class="grid md:grid-cols-2">

            <!-- LEFT SIDE -->
            <div class="relative min-h-[750px]">

                <img src="{{ asset('images/anhdangki.png') }}" alt="Background"
                    class="absolute inset-0 w-full h-full object-cover">

                <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-blue-900/10 to-white/10">
                </div>

                <!-- Logo -->
                <div class="absolute top-8 left-10 z-10">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-32 h-auto">
                </div>

                <!-- Text -->
                <div class="absolute top-28 left-10 right-10 z-10">

                    <h1 class="text-[#061755] text-5xl font-extrabold leading-tight drop-shadow-lg">

                        Trải nghiệm kỳ nghỉ

                        <span class="text-[#1040C5] ">
                            tuyệt vời
                        </span>

                        cùng chúng tôi

                    </h1>

                    <p class="text-white/90 text-lg mt-6 leading-relaxed max-w-md">
                        Đặt phòng dễ dàng, nhanh chóng và tận hưởng
                        những ưu đãi hấp dẫn mỗi ngày.
                    </p>

                </div>

                <!-- FEATURES -->
                <div class="absolute bottom-10 left-8 right-8 z-20">

                    <div class="bg-white/95 backdrop-blur-md rounded-3xl shadow-xl p-6">

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

                                <p class="text-xs text-gray-500 mt-1">
                                    Giá tốt mỗi ngày
                                </p>

                            </div>

                            <!-- Bảo mật -->
                            <div class="text-center px-4">

                                <div class="flex justify-center mb-3">

                                    <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center">

                                        <i class="fa-solid fa-shield-halved text-blue-600 text-2xl"></i>

                                    </div>

                                </div>

                                <h4 class="font-semibold text-gray-800 text-sm">
                                    Thanh toán an toàn
                                </h4>

                                <p class="text-xs text-gray-500 mt-1">
                                    Bảo mật tuyệt đối
                                </p>

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

                                <p class="text-xs text-gray-500 mt-1">
                                    Luôn sẵn sàng
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="p-12 flex items-center">

                <div class="w-full">

                    <h1 class="text-5xl font-bold text-slate-900">
                        Đăng nhập
                    </h1>

                    <p class="text-gray-500 mt-3 mb-8">
                        Chào mừng bạn quay trở lại
                    </p>
                    @if(session('error'))

                    <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-lg">

                        {{ session('error') }}

                    </div>

                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-5">

                            <label class="block mb-2 text-lg font-semibold">
                                Email
                            </label>

                            <input type="email" name="email" value="{{ old('email') }}" required
                                placeholder="Nhập email của bạn"
                                class="w-full border border-gray-300 rounded-full px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

                            @error('email')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>

                        <!-- Password -->
                        <div class="mb-4">

                            <label class="block mb-2 font-semibold text-lg">
                                Mật khẩu
                            </label>

                            <div class="relative">

                                <input type="password" id="password" name="password" required
                                    placeholder="Nhập mật khẩu"
                                    class="w-full border border-gray-300 rounded-full px-5 py-4 pr-14 focus:outline-none focus:ring-2 focus:ring-blue-500">

                                <button type="button" onclick="togglePassword()"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">

                                    <i id="passwordIcon" class="fa-solid fa-eye"></i>

                                </button>

                            </div>
                            @error('password')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>

                        <!-- Remember + Forgot -->
                        <div class="flex justify-between items-center mb-8">

                            <label class="flex items-center gap-2 text-sm text-gray-600">

                                <input type="checkbox" name="remember" class="rounded border-gray-300">

                                Ghi nhớ đăng nhập

                            </label>

                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-blue-600 text-sm hover:underline">

                                Quên mật khẩu?

                            </a>
                            @endif

                        </div>

                        <!-- Submit -->
                        <button type="submit"
                            class="w-full bg-[#0c1d4d] hover:bg-[#18357f] text-white py-4 rounded-full font-bold transition duration-300 text-lg">

                            Đăng nhập

                        </button>

                    </form>


                    <!-- Divider -->
                    <div class="flex items-center my-8">

                        <div class="flex-1 border-t border-gray-300"></div>

                        <span class="mx-4 text-gray-400">
                            Hoặc
                        </span>

                        <div class="flex-1 border-t border-gray-300"></div>

                    </div>

                    <!-- Google Login -->
                    <a href="{{ route('google.login') }}"
                        class="border border-gray-300 rounded-full py-4 flex justify-center items-center gap-3 hover:bg-gray-50 transition">

                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="24" alt="Google">

                        <span class="font-semibold text-lg">
                            Đăng nhập bằng Google
                        </span>

                    </a>

                    <!-- Register -->
                    <p class="text-center mt-8 text-gray-500 text-lg">

                        Chưa có tài khoản?

                        <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline text-lg">

                            Đăng ký

                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>
    <script>
    function togglePassword() {

        const input = document.getElementById('password');
        const icon = document.getElementById('passwordIcon');

        if (input.type === 'password') {

            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');

        } else {

            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');

        }
    }
    </script>

</body>

</html>