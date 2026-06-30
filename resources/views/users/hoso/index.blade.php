<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hồ sơ cá nhân</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100">

    @include('components.navbar')

    <main class="pt-24 pb-16">

        <div class="max-w-3xl mx-auto px-4">

            <div class="bg-white rounded-3xl shadow border border-slate-200 overflow-hidden">

                {{-- Tiêu đề --}}
                <div class="px-8 py-6 border-b border-slate-200">

                    <h1 class="text-2xl md:text-3xl font-bold text-slate-800 text-center">

                        Thông tin cá nhân

                    </h1>

                </div>

                {{-- Avatar --}}
                <div class="py-8 flex justify-center">

                    @if(!empty($nguoiDung->anh_dai_dien))

                    <img src="{{ asset($nguoiDung->anh_dai_dien) }}" alt="Ảnh đại diện"
                        class="w-32 h-32 rounded-full object-cover border-4 border-blue-100 shadow">

                    @else

                    <div
                        class="w-32 h-32 rounded-full bg-blue-600 text-white flex items-center justify-center text-5xl font-bold shadow">

                        {{ strtoupper(substr($nguoiDung->ten,0,1)) }}

                    </div>

                    @endif
                </div>

                {{-- Thông tin --}}
                <div class="border-t border-slate-200"> {{-- Họ và tên --}}
                    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] border-b border-slate-200">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Họ và tên

                        </div>

                        <div class="px-6 py-4 text-slate-900">

                            {{ trim($nguoiDung->ho_va_ten_dem . ' ' . $nguoiDung->ten) }}

                        </div>

                    </div>

                    {{-- Email --}}
                    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] border-b border-slate-200">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Email

                        </div>

                        <div class="px-6 py-4 text-slate-900 break-all">

                            {{ $nguoiDung->email }}

                        </div>

                    </div>

                    {{-- Số điện thoại --}}
                    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] border-b border-slate-200">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Số điện thoại

                        </div>

                        <div class="px-6 py-4 text-slate-900">

                            {{ $nguoiDung->so_dien_thoai ?: 'Chưa cập nhật' }}

                        </div>

                    </div>

                    {{-- Giới tính --}}
                    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] border-b border-slate-200">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Giới tính

                        </div>

                        <div class="px-6 py-4 text-slate-900">

                            @if($nguoiDung->gioi_tinh == 'Nam')

                            Nam

                            @elseif($nguoiDung->gioi_tinh == 'Nu')

                            Nữ

                            @elseif($nguoiDung->gioi_tinh == 'Khac')

                            Khác

                            @else

                            Chưa cập nhật

                            @endif

                        </div>

                    </div>

                    {{-- Ngày sinh --}}
                    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] border-b border-slate-200">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Ngày sinh

                        </div>

                        <div class="px-6 py-4 text-slate-900">

                            @if($nguoiDung->ngay_sinh)

                            {{ \Carbon\Carbon::parse($nguoiDung->ngay_sinh)->format('d/m/Y') }}

                            @else

                            Chưa cập nhật

                            @endif

                        </div>

                    </div>

                    {{-- Ngày tạo tài khoản --}}
                    <div class="grid grid-cols-1 md:grid-cols-[220px_1fr]">

                        <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                            Ngày tạo tài khoản

                        </div>

                        <div class="px-6 py-4 text-slate-900">

                            {{ \Carbon\Carbon::parse($nguoiDung->ngay_tao)->format('d/m/Y H:i') }}

                        </div>

                    </div>

                </div>
                {{-- Nút chức năng --}}
                <div class="px-6 md:px-8 py-8 border-t border-slate-200">

                    <div class="flex flex-col sm:flex-row justify-center gap-4">

                        {{-- Chỉnh sửa thông tin --}}
                        <a href="{{ route('hoso.edit')}}" class="inline-flex items-center justify-center gap-2
                               bg-blue-600 hover:bg-blue-700
                               text-white font-semibold
                               px-6 py-3 rounded-xl
                               transition duration-300">

                            <i class="fa-solid fa-user-pen"></i>

                            Chỉnh sửa thông tin

                        </a>

                        {{-- Đổi mật khẩu --}}
                        <a href="#" class="inline-flex items-center justify-center gap-2
                               border-2 border-blue-600
                               text-blue-600
                               hover:bg-blue-600
                               hover:text-white
                               font-semibold
                               px-6 py-3 rounded-xl
                               transition duration-300">

                            <i class="fa-solid fa-key"></i>

                            Đổi mật khẩu

                        </a>

                    </div>

                </div>

            </div>

    </main>

    @include('components.footer')

</body>

</html>