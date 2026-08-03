@extends('doitac.trangchinh.partner')

@section('title','Chỉnh sửa hồ sơ')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-3xl shadow border border-slate-200 overflow-hidden">

        {{-- Tiêu đề --}}
        <div class="px-8 py-6 border-b">

            <h2 class="text-3xl font-bold text-[#061755]">

                Chỉnh sửa hồ sơ

            </h2>

            <p class="text-slate-500 mt-2">

                Cập nhật thông tin cá nhân của đối tác.

            </p>

        </div>

        <form action="{{ route('doitac.hoso.update') }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="p-8">

                {{-- Avatar --}}
                <div class="flex flex-col items-center mb-10">

                    @if($nguoiDung->anh_dai_dien)

                    <img id="preview" src="{{ asset($nguoiDung->anh_dai_dien) }}"
                        class="w-36 h-36 rounded-full object-cover border-4 border-blue-100 shadow">

                    @else

                    <div id="previewText"
                        class="w-36 h-36 rounded-full bg-blue-600 text-white flex items-center justify-center text-5xl font-bold shadow">

                        {{ strtoupper(substr($nguoiDung->ten,0,1)) }}

                    </div>

                    <img id="preview"
                        class="hidden w-36 h-36 rounded-full object-cover border-4 border-blue-100 shadow">

                    @endif

                    <label class="mt-5 cursor-pointer bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl">

                        <i class="fa-solid fa-camera mr-2"></i>

                        Chọn ảnh

                        <input type="file" name="anh_dai_dien" id="avatar" class="hidden" accept="image/*">

                    </label>

                    @error('anh_dai_dien')
                    <p class="text-red-500 text-sm mt-2">

                        {{ $message }}

                    </p>
                    @enderror

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    {{-- Họ tên --}}
                    <div class="md:col-span-2">

                        <label class="font-semibold">

                            Họ và tên

                        </label>

                        <input type="text" name="ho_ten"
                            value="{{ old('ho_ten',trim($nguoiDung->ho_va_ten_dem.' '.$nguoiDung->ten)) }}"
                            class="mt-2 w-full border rounded-xl px-4 py-3">

                        @error('ho_ten')
                        <p class="text-red-500 text-sm mt-1">

                            {{ $message }}

                        </p>
                        @enderror

                    </div>

                    {{-- Email --}}
                    <div>

                        <label class="font-semibold">

                            Email

                        </label>

                        <input type="email" value="{{ $nguoiDung->email }}" readonly
                            class="mt-2 w-full border rounded-xl px-4 py-3 bg-slate-100 cursor-not-allowed">

                    </div>

                    {{-- Điện thoại --}}
                    <div>

                        <label class="font-semibold">

                            Số điện thoại

                        </label>

                        <input type="text" name="so_dien_thoai"
                            value="{{ old('so_dien_thoai',$nguoiDung->so_dien_thoai) }}"
                            class="mt-2 w-full border rounded-xl px-4 py-3">

                        @error('so_dien_thoai')
                        <p class="text-red-500 text-sm mt-1">

                            {{ $message }}

                        </p>
                        @enderror

                    </div>

                    {{-- Giới tính --}}
                    <div>

                        <label class="font-semibold">

                            Giới tính

                        </label>

                        <select name="gioi_tinh" class="mt-2 w-full border rounded-xl px-4 py-3">

                            <option value="">

                                Chọn giới tính

                            </option>

                            <option value="Nam" {{ old('gioi_tinh',$nguoiDung->gioi_tinh)=='Nam'?'selected':'' }}>

                                Nam

                            </option>

                            <option value="Nu" {{ old('gioi_tinh',$nguoiDung->gioi_tinh)=='Nu'?'selected':'' }}>

                                Nữ

                            </option>

                            <option value="Khac" {{ old('gioi_tinh',$nguoiDung->gioi_tinh)=='Khac'?'selected':'' }}>

                                Khác

                            </option>

                        </select>

                    </div>

                    {{-- Ngày sinh --}}
                    <div>

                        <label class="font-semibold">

                            Ngày sinh

                        </label>

                        <input type="date" name="ngay_sinh" value="{{ old('ngay_sinh',$nguoiDung->ngay_sinh) }}"
                            class="mt-2 w-full border rounded-xl px-4 py-3">

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div class="border-t px-8 py-6 flex justify-center gap-4">

                <a href="{{ route('doitac.hoso.index') }}" class="px-6 py-3 rounded-xl border">

                    Hủy

                </a>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl">

                    <i class="fa-solid fa-floppy-disk mr-2"></i>

                    Lưu thay đổi

                </button>

            </div>

        </form>

    </div>

</div>

<script>
const avatar = document.getElementById('avatar');

const preview = document.getElementById('preview');

const previewText = document.getElementById('previewText');

avatar.addEventListener('change', function() {

    const file = this.files[0];

    if (!file) return;

    preview.src = URL.createObjectURL(file);

    preview.classList.remove('hidden');

    if (previewText) {

        previewText.classList.add('hidden');

    }

});
</script>

@endsection