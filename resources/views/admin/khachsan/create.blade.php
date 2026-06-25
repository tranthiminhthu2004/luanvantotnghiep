@extends('admin.trangchinh.admin')

@section('title','Thêm khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">

        <!-- Tiêu đề -->
        <div class="mb-6">

            <h2 class="text-2xl md:text-3xl font-bold text-[#061755]">

                Thêm khách sạn mới

            </h2>

        </div>

        <form action="{{ route('admin.khachsan.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Tên khách sạn -->

                <div>

                    <label class="block text-sm font-semibold text-black">
                        Tên khách sạn
                    </label>

                    <input type="text" name="ten_khach_san" value="{{ old('ten_khach_san') }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('ten_khach_san')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror

                </div>

                <!-- Địa điểm -->

                <div>

                    <label class="block text-sm font-semibold text-black">
                        Địa điểm
                    </label>

                    <select name="ma_dia_diem" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                        @foreach($diaDiems as $diaDiem)

                        <option value="{{ $diaDiem->ma_dia_diem }}">
                            {{ $diaDiem->ten_dia_diem }}
                        </option>

                        @endforeach

                    </select>

                    @error('ma_dia_diem')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror

                </div>

                <!-- Địa chỉ -->

                <div class="md:col-span-2">

                    <label class="block text-sm font-semibold text-black">
                        Địa chỉ
                    </label>

                    <input type="text" name="dia_chi" value="{{ old('dia_chi') }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('dia_chi')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror

                </div>


                <!-- Số sao -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Số sao

                    </label>

                    <select name="so_sao_khach_san"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                        <option value="1">1 Sao</option>
                        <option value="2">2 Sao</option>
                        <option value="3">3 Sao</option>
                        <option value="4">4 Sao</option>
                        <option value="5">5 Sao</option>

                    </select>

                </div>

                <!-- Vĩ độ -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Vĩ độ

                    </label>

                    <input type="text" name="vi_do" value="{{ old('vi_do') }}" placeholder="Ví dụ: 10.776889"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('vi_do')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>


                <!-- Kinh độ -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Kinh độ

                    </label>

                    <input type="text" name="kinh_do" value="{{ old('kinh_do') }}" placeholder="Ví dụ: 106.700981"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('kinh_do')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- SĐT -->

                <div>

                    <label class="block text-sm font-semibold text-black">
                        Số điện thoại
                    </label>

                    <input type="text" name="so_dien_thoai" value="{{ old('so_dien_thoai') }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('so_dien_thoai')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror

                </div>

                <!-- Email -->

                <div>


                    <label class="block text-sm font-semibold text-black">
                        Email
                    </label>

                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('email')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror


                </div>


                <!-- Check in -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Giờ check-in

                    </label>

                    <input type="time" name="gio_check_in" value="{{ old('gio_check_in') }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('gio_check_in')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror

                </div>

                <!-- Check out -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Giờ check-out

                    </label>

                    <input type="time" name="gio_check_out" value="{{ old('gio_check_out') }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('gio_check_out')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Hủy miễn phí -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Số giờ hủy miễn phí

                    </label>

                    <input type="number" name="so_gio_huy_mien_phi" value="24"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                </div>

                <!-- Trạng thái -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Trạng thái

                    </label>

                    <select name="trang_thai" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                        <option value="1">
                            Hoạt động
                        </option>

                        <option value="0">
                            Tạm khóa
                        </option>

                    </select>

                </div>

                <!-- Mô tả -->
                <div class="md:col-span-2">

                    <label class="block text-sm font-semibold text-black">

                        Mô tả

                    </label>

                    <textarea name="mo_ta" rows="5"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">{{ old('mo_ta') }}</textarea>

                </div>

            </div>

            <div class="flex flex-wrap gap-3 mt-6">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full text-sm font-semibold transition">

                    Lưu khách sạn

                </button>

                <a href="{{ route('admin.khachsan.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full text-sm font-semibold transition">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection