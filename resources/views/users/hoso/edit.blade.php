<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chỉnh sửa thông tin</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100">

    @include('components.navbar')

    <main class="pt-24 pb-16">

        <div class="max-w-3xl mx-auto px-4">

            <form action="{{ route('hoso.update') }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="bg-white rounded-3xl shadow border border-slate-200 overflow-hidden">

                    {{-- Tiêu đề --}}
                    <div class="px-8 py-6 border-b border-slate-200">

                        <h1 class="text-2xl md:text-3xl font-bold text-slate-800 text-center">

                            Chỉnh sửa thông tin cá nhân

                        </h1>

                    </div>

                    {{-- Avatar --}}
                    <div class="py-8 flex flex-col items-center">

                        @if($nguoiDung->anh_dai_dien)

                        <img id="preview-avatar" src="{{ asset($nguoiDung->anh_dai_dien) }}"
                            class="w-32 h-32 rounded-full object-cover border-4 border-blue-100 shadow">

                        @else

                        <img id="preview-avatar"
                            src="https://placehold.co/128x128/e2e8f0/64748b?text={{ strtoupper(substr($nguoiDung->ten,0,1)) }}"
                            class="w-32 h-32 rounded-full object-cover border-4 border-blue-100 shadow">

                        @endif

                        <input type="file" id="anh_dai_dien" name="anh_dai_dien" accept="image/*" class="hidden">

                        <label for="anh_dai_dien"
                            class="mt-5 cursor-pointer bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl transition">

                            <i class="fa-solid fa-camera mr-2"></i>

                            Chọn ảnh

                        </label>

                    </div>

                    <div class="border-t border-slate-200"> {{-- Họ và tên --}}
                        <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] border-b border-slate-200">

                            <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                                Họ và tên

                            </div>

                            <div class="px-6 py-4">

                                <input type="text" name="ho_ten"
                                    value="{{ old('ho_ten', trim($nguoiDung->ho_va_ten_dem . ' ' . $nguoiDung->ten)) }}"
                                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                                @error('ho_ten')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                        {{-- Email --}}
                        <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] border-b border-slate-200">

                            <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                                Email

                            </div>

                            <div class="px-6 py-4">

                                <input type="email" value="{{ $nguoiDung->email }}" readonly
                                    class="mt-2 w-full border rounded-xl px-4 py-3 bg-slate-100 cursor-not-allowed">
                            </div>

                        </div>

                        {{-- Số điện thoại --}}
                        <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] border-b border-slate-200">

                            <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                                Số điện thoại

                            </div>

                            <div class="px-6 py-4">

                                <input type="text" name="so_dien_thoai"
                                    value="{{ old('so_dien_thoai', $nguoiDung->so_dien_thoai) }}"
                                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                                @error('so_dien_thoai')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                        {{-- Giới tính --}}
                        <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] border-b border-slate-200">

                            <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                                Giới tính

                            </div>

                            <div class="px-6 py-4">

                                <div class="flex flex-wrap gap-6">

                                    <label class="flex items-center gap-2 cursor-pointer">

                                        <input type="radio" name="gioi_tinh" value="Nam"
                                            {{ old('gioi_tinh', $nguoiDung->gioi_tinh) == 'Nam' ? 'checked' : '' }}>

                                        Nam

                                    </label>

                                    <label class="flex items-center gap-2 cursor-pointer">

                                        <input type="radio" name="gioi_tinh" value="Nu"
                                            {{ old('gioi_tinh', $nguoiDung->gioi_tinh) == 'Nu' ? 'checked' : '' }}>

                                        Nữ

                                    </label>

                                    <label class="flex items-center gap-2 cursor-pointer">

                                        <input type="radio" name="gioi_tinh" value="Khac"
                                            {{ old('gioi_tinh', $nguoiDung->gioi_tinh) == 'Khac' ? 'checked' : '' }}>

                                        Khác

                                    </label>

                                </div>

                            </div>

                        </div>

                        {{-- Ngày sinh --}}
                        <div class="grid grid-cols-1 md:grid-cols-[220px_1fr]">

                            <div class="bg-slate-50 px-6 py-4 font-semibold text-slate-700">

                                Ngày sinh

                            </div>

                            <div class="px-6 py-4">

                                <input type="date" name="ngay_sinh"
                                    value="{{ old('ngay_sinh', $nguoiDung->ngay_sinh) }}"
                                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                                @error('ngay_sinh')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                            </div>

                        </div> {{-- Nút chức năng --}}
                        <div class="px-6 md:px-8 py-8 border-t border-slate-200">

                            <div class="flex flex-col sm:flex-row justify-center gap-4">

                                {{-- Lưu thay đổi --}}
                                <button type="submit" class="inline-flex items-center justify-center gap-2
                                       bg-blue-600 hover:bg-blue-700
                                       text-white font-semibold
                                       px-6 py-3 rounded-xl
                                       transition duration-300">

                                    <i class="fa-solid fa-floppy-disk"></i>

                                    Lưu thay đổi

                                </button>

                                {{-- Quay lại --}}
                                <a href="{{ route('hoso.index') }}" class="inline-flex items-center justify-center gap-2
                                       border-2 border-slate-300
                                       text-slate-700
                                       hover:bg-slate-100
                                       font-semibold
                                       px-6 py-3 rounded-xl
                                       transition duration-300">

                                    Quay lại

                                </a>

                            </div>

                        </div>

                    </div>

            </form>

        </div>

    </main>

    @include('components.footer')
    <script>
    document.getElementById('anh_dai_dien').addEventListener('change', function(e) {

        const file = e.target.files[0];

        if (!file) return;

        const reader = new FileReader();

        reader.onload = function(event) {

            document.getElementById('preview-avatar').src = event.target.result;

        };

        reader.readAsDataURL(file);

    });
    </script>

</body>

</html>