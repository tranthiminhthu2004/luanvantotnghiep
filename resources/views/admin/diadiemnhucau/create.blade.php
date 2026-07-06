@extends('admin.trangchinh.admin')

@section('title','Thêm dữ liệu gợi ý điểm đến')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-8">

        <form action="{{ route('admin.diadiemnhucau.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Điểm đến -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Điểm đến cấp tỉnh/thành phố

                    </label>

                    <select name="ma_dia_diem"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-base text-black focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <option value="">
                            Chọn điểm đến
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

                <!-- Nhu cầu du lịch -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Nhu cầu du lịch

                    </label>

                    <select name="ma_nhu_cau"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-base text-black focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <option value="">
                            Chọn nhu cầu du lịch
                        </option>

                        @foreach($nhuCaus as $nhuCau)

                        <option value="{{ $nhuCau->ma_nhu_cau }}"
                            {{ old('ma_nhu_cau') == $nhuCau->ma_nhu_cau ? 'selected' : '' }}>

                            {{ $nhuCau->ten_nhu_cau }}

                        </option>

                        @endforeach

                    </select>

                    @error('ma_nhu_cau')

                    <p class="text-red-500 text-sm mt-2">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Mức độ phù hợp -->
                <div class="md:col-span-2">

                    <label class="block text-base font-semibold text-black">

                        Mức độ phù hợp

                    </label>

                    <select name="muc_do_phu_hop"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-base text-black focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <option value="">
                            Chọn mức độ phù hợp
                        </option>

                        <option value="1" {{ old('muc_do_phu_hop') == 1 ? 'selected' : '' }}>
                            1 - Ít phù hợp
                        </option>

                        <option value="2" {{ old('muc_do_phu_hop') == 2 ? 'selected' : '' }}>
                            2 - Hơi phù hợp
                        </option>

                        <option value="3" {{ old('muc_do_phu_hop') == 3 ? 'selected' : '' }}>
                            3 - Trung bình
                        </option>

                        <option value="4" {{ old('muc_do_phu_hop') == 4 ? 'selected' : '' }}>
                            4 - Phù hợp
                        </option>

                        <option value="5" {{ old('muc_do_phu_hop') == 5 ? 'selected' : '' }}>
                            5 - Rất phù hợp
                        </option>

                    </select>

                    @error('muc_do_phu_hop')

                    <p class="text-red-500 text-sm mt-2">

                        {{ $message }}

                    </p>

                    @enderror

                    <p class="text-sm text-gray-500 mt-2 leading-6">

                        Mức độ phù hợp là trọng số từ 1 đến 5, dùng để tính độ tương đồng giữa nhu cầu người dùng và
                        điểm đến.

                    </p>

                </div>

            </div>

            <div class="flex gap-4 mt-8">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full text-base font-semibold transition">

                    <i class="fa-solid fa-floppy-disk mr-2"></i>

                    Lưu dữ liệu

                </button>

                <a href="{{ route('admin.diadiemnhucau.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 text-black px-8 py-3 rounded-full text-base font-semibold transition">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection