@extends('admin.trangchinh.admin')

@section('title','Thêm khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-4 md:p-6">

        <!-- Tiêu đề -->
        <div class="mb-8">

            <h2 class="text-4xl font-bold text-[#061755]">

                Thêm khách sạn mới

            </h2>


        </div>

        <!-- Form -->
        <form action="{{ route('admin.khachsan.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Tên khách sạn -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Tên khách sạn

                    </label>

                    <input type="text" name="ten_khach_san" value="{{ old('ten_khach_san') }}"
                        placeholder="Nhập tên khách sạn" class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Thành phố -->
                <!-- Địa điểm -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Địa điểm

                    </label>

                    <select name="ma_dia_diem" class="w-full mt-2 border rounded-full px-5 py-3 text-base">

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

                </div>

                <!-- Địa chỉ -->
                <div class="md:col-span-2">

                    <label class="font-medium text-slate-700 text-base">

                        Địa chỉ

                    </label>

                    <input type="text" name="dia_chi" value="{{ old('dia_chi') }}" placeholder="Nhập địa chỉ khách sạn"
                        class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Vĩ độ -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Vĩ độ

                    </label>

                    <input type="text" name="vi_do" value="{{ old('vi_do') }}" placeholder="Ví dụ: 10.776889"
                        class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Kinh độ -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Kinh độ

                    </label>

                    <input type="text" name="kinh_do" value="{{ old('kinh_do') }}" placeholder="Ví dụ: 106.700806"
                        class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Số sao -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Số sao khách sạn

                    </label>

                    <select name="so_sao_khach_san" class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                        <option value="1">1 Sao</option>
                        <option value="2">2 Sao</option>
                        <option value="3">3 Sao</option>
                        <option value="4">4 Sao</option>
                        <option value="5">5 Sao</option>

                    </select>

                </div>

                <!-- Số điện thoại -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Số điện thoại

                    </label>

                    <input type="text" name="so_dien_thoai" value="{{ old('so_dien_thoai') }}"
                        placeholder="Nhập số điện thoại" class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Email -->
                <div class="md:col-span-2">

                    <label class="font-medium text-slate-700 text-base">

                        Email

                    </label>

                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Nhập email"
                        class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Mô tả -->
                <div class="md:col-span-2">

                    <label class="font-medium text-slate-700 text-base">

                        Mô tả

                    </label>

                    <textarea name="mo_ta" rows="5" placeholder="Nhập mô tả khách sạn..."
                        class="w-full mt-2 border rounded-2xl px-5 py-3 text-base">{{ old('mo_ta') }}</textarea>

                </div>

                <!-- Trạng thái -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Trạng thái

                    </label>

                    <select name="trang_thai" class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                        <option value="1">

                            Hoạt động

                        </option>

                        <option value="0">

                            Tạm dừng

                        </option>

                    </select>

                </div>

            </div>

            <!-- Button -->
            <div class="flex flex-col md:flex-row gap-4 mt-8">

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-base">

                    Lưu khách sạn

                </button>

                <a href="{{ route('admin.khachsan.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl text-base text-center">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection