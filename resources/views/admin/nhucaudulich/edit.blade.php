@extends('admin.trangchinh.admin')

@section('title', 'Cập nhật nhu cầu du lịch')

@section('content')

<div class="max-w-4xl mx-auto">


    <div class="bg-white rounded-3xl shadow p-8">

        <form action="{{ route('admin.nhucaudulich.update', $nhuCau->ma_nhu_cau) }}" method="POST">

            @csrf
            @method('PUT')

            <!-- Tên nhu cầu -->
            <div class="mb-6">

                <label class="block font-semibold mb-2">

                    Tên nhu cầu
                    <span class="text-red-500">*</span>

                </label>

                <input type="text" name="ten_nhu_cau" value="{{ old('ten_nhu_cau', $nhuCau->ten_nhu_cau) }}"
                    class="w-full border rounded-2xl px-5 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('ten_nhu_cau') border-red-500 @enderror"
                    placeholder="Ví dụ: Du lịch biển">

                @error('ten_nhu_cau')

                <p class="text-red-500 text-sm mt-2">

                    {{ $message }}

                </p>

                @enderror

            </div>

            <!-- Mô tả -->
            <div class="mb-8">

                <label class="block font-semibold mb-2">

                    Mô tả

                </label>

                <textarea name="mo_ta" rows="6"
                    class="w-full border rounded-2xl px-5 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('mo_ta') border-red-500 @enderror"
                    placeholder="Nhập mô tả nhu cầu...">{{ old('mo_ta', $nhuCau->mo_ta) }}</textarea>

                @error('mo_ta')

                <p class="text-red-500 text-sm mt-2">

                    {{ $message }}

                </p>

                @enderror

            </div>

            <!-- Nút -->
            <div class="flex justify-end gap-3">

                <a href="{{ route('admin.nhucaudulich.index') }}"
                    class="px-6 py-3 rounded-full border hover:bg-gray-100 transition">

                    Quay lại

                </a>

                <button type="submit"
                    class="px-6 py-3 rounded-full bg-blue-500 hover:bg-blue-600 text-white font-semibold transition">

                    <i class="fa-solid fa-floppy-disk mr-2"></i>

                    Cập nhật

                </button>

            </div>

        </form>

    </div>

</div>

@endsection