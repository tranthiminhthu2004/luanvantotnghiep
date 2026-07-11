@extends('admin.trangchinh.admin')

@section('title','Cập nhật địa điểm')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">

        <form action="{{ route('admin.diadiem.update',$diaDiem->ma_dia_diem) }}" method="POST">

            @csrf
            @method('PUT')

            <!-- Tên địa điểm -->
            <div>

                <label class="block text-base font-semibold text-black">

                    Tên địa điểm

                </label>

                <input type="text" name="ten_dia_diem" value="{{ old('ten_dia_diem',$diaDiem->ten_dia_diem) }}"
                    placeholder="Ví dụ: Đà Nẵng" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                @error('ten_dia_diem')

                <p class="text-red-500 text-sm mt-1">

                    {{ $message }}

                </p>

                @enderror

            </div>

            <!-- Mô tả -->
            <div class="mt-6">

                <label class="block text-base font-semibold text-black">

                    Mô tả

                </label>

                <textarea name="mo_ta" rows="10" placeholder="Nhập mô tả về địa điểm..."
                    class="w-full mt-2 border rounded-xl px-4 py-3 text-sm text-black resize-none">{{ old('mo_ta',$diaDiem->mo_ta) }}</textarea>

                @error('mo_ta')

                <p class="text-red-500 text-sm mt-1">

                    {{ $message }}

                </p>

                @enderror

            </div>

            <!-- Nút -->
            <div class="flex flex-wrap gap-3 mt-6">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full text-base font-semibold transition">

                    Cập nhật

                </button>

                <a href="{{ route('admin.diadiem.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full text-base font-semibold transition">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection