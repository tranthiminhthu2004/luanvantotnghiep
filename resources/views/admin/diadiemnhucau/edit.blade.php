@extends('admin.trangchinh.admin')

@section('title','Cập nhật dữ liệu gợi ý điểm đến')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-8">

        <form action="{{ route('admin.diadiemnhucau.update', [$duLieu->ma_dia_diem, $duLieu->ma_nhu_cau]) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Điểm đến -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Điểm đến cấp tỉnh/thành phố

                    </label>

                    <input type="text" value="{{ $diaDiem->ten_dia_diem }}"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-base text-black bg-slate-100 focus:outline-none"
                        readonly>

                </div>

                <!-- Nhu cầu du lịch -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Nhu cầu du lịch

                    </label>

                    <input type="text" value="{{ $nhuCau->ten_nhu_cau }}"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-base text-black bg-slate-100 focus:outline-none"
                        readonly>

                </div>

                <!-- Mức độ phù hợp -->
                <div class="md:col-span-2">

                    <label class="block text-base font-semibold text-black">

                        Mức độ phù hợp

                    </label>

                    <select name="muc_do_phu_hop"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-base text-black focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <option value="1" {{ old('muc_do_phu_hop', $duLieu->muc_do_phu_hop) == 1 ? 'selected' : '' }}>
                            1 - Ít phù hợp
                        </option>

                        <option value="2" {{ old('muc_do_phu_hop', $duLieu->muc_do_phu_hop) == 2 ? 'selected' : '' }}>
                            2 - Hơi phù hợp
                        </option>

                        <option value="3" {{ old('muc_do_phu_hop', $duLieu->muc_do_phu_hop) == 3 ? 'selected' : '' }}>
                            3 - Trung bình
                        </option>

                        <option value="4" {{ old('muc_do_phu_hop', $duLieu->muc_do_phu_hop) == 4 ? 'selected' : '' }}>
                            4 - Phù hợp
                        </option>

                        <option value="5" {{ old('muc_do_phu_hop', $duLieu->muc_do_phu_hop) == 5 ? 'selected' : '' }}>
                            5 - Rất phù hợp
                        </option>

                    </select>

                    @error('muc_do_phu_hop')

                    <p class="text-red-500 text-sm mt-2">

                        {{ $message }}

                    </p>

                    @enderror

                    <p class="text-sm text-gray-500 mt-2 leading-6">

                        Trang này chỉ cập nhật mức độ phù hợp. Nếu muốn đổi điểm đến hoặc nhu cầu, hãy xóa dữ liệu cũ và
                        thêm lại dữ liệu mới.

                    </p>

                </div>

            </div>

            <div class="flex flex-wrap gap-4 mt-8">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full text-base font-semibold transition">

                    <i class="fa-solid fa-floppy-disk mr-2"></i>

                    Cập nhật dữ liệu

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