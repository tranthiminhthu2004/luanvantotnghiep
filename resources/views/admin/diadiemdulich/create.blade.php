@extends('admin.trangchinh.admin')

@section('title','Thêm địa điểm du lịch')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-8">

        <form action="{{ route('admin.diadiemdulich.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Địa điểm -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Địa điểm

                    </label>

                    <select name="ma_dia_diem"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-base text-black focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <option value="">
                            Chọn địa điểm
                        </option>

                        @foreach($diaDiems as $diaDiem)

                        <option value="{{ $diaDiem->ma_dia_diem }}"
                            {{ old('ma_dia_diem') == $diaDiem->ma_dia_diem ? 'selected' : '' }}>

                            {{ $diaDiem->ten_dia_diem }}

                        </option>

                        @endforeach

                    </select>

                    @error('ma_dia_diem')

                    <p class="text-red-500 text-sm mt-2">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Tên địa điểm -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Tên địa điểm du lịch

                    </label>

                    <input type="text" name="ten_dia_diem" value="{{ old('ten_dia_diem') }}"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-base text-black focus:outline-none focus:ring-2 focus:ring-blue-500">

                    @error('ten_dia_diem')

                    <p class="text-red-500 text-sm mt-2">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Địa chỉ -->
                <div class="md:col-span-2">

                    <label class="block text-base font-semibold text-black">

                        Địa chỉ

                    </label>

                    <input type="text" name="dia_chi" value="{{ old('dia_chi') }}"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-base text-black focus:outline-none focus:ring-2 focus:ring-blue-500">

                    @error('dia_chi')

                    <p class="text-red-500 text-sm mt-2">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Vĩ độ -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Vĩ độ

                    </label>

                    <input type="text" name="vi_do" value="{{ old('vi_do') }}" placeholder="Ví dụ: 16.054407"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-base text-black focus:outline-none focus:ring-2 focus:ring-blue-500">

                    @error('vi_do')

                    <p class="text-red-500 text-sm mt-2">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Kinh độ -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Kinh độ

                    </label>

                    <input type="text" name="kinh_do" value="{{ old('kinh_do') }}" placeholder="Ví dụ: 108.202167"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-base text-black focus:outline-none focus:ring-2 focus:ring-blue-500">

                    @error('kinh_do')

                    <p class="text-red-500 text-sm mt-2">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Mô tả -->
                <div class="md:col-span-2">

                    <label class="block text-base font-semibold text-black">

                        Mô tả

                    </label>

                    <textarea name="mo_ta" rows="8"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-base text-black resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('mo_ta') }}</textarea>

                </div>

            </div>

            <div class="flex gap-4 mt-8">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full text-base font-semibold transition">

                    <i class="fa-solid fa-floppy-disk mr-2"></i>

                    Lưu địa điểm du lịch

                </button>

                <a href="{{ route('admin.diadiemdulich.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 text-black px-8 py-3 rounded-full text-base font-semibold transition">
                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection