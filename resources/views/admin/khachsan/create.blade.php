@extends('admin.trangchinh.admin')

@section('title','Thêm khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-4 md:p-6">

        <div class="mb-8">
            <h2 class="text-5xl font-bold text-[#061755]">
                Thêm khách sạn mới
            </h2>
        </div>

        <form action="{{ route('admin.khachsan.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class=" text-black text-lg font-bold">
                        Tên khách sạn
                    </label>

                    <input type="text" name="ten_khach_san" value="{{ old('ten_khach_san') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">
                </div>

                <div>
                    <label class=" text-black text-lg font-bold">
                        Địa điểm
                    </label>

                    <select name="ma_dia_diem" class="w-full mt-2 border rounded-full px-5 py-3">

                        @foreach($diaDiems as $diaDiem)
                        <option value="{{ $diaDiem->ma_dia_diem }}">
                            {{ $diaDiem->ten_dia_diem }}
                        </option>
                        @endforeach

                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class=" text-black text-lg font-bold">
                        Địa chỉ
                    </label>

                    <input type="text" name="dia_chi" value="{{ old('dia_chi') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">
                </div>

                <div>
                    <label class="font-bold text-black text-lg">
                        Số sao
                    </label>

                    <select name="so_sao_khach_san" class="w-full mt-2 border rounded-full px-5 py-3">

                        <option value="1">1 Sao</option>
                        <option value="2">2 Sao</option>
                        <option value="3">3 Sao</option>
                        <option value="4">4 Sao</option>
                        <option value="5">5 Sao</option>

                    </select>
                </div>

                <div>
                    <label class="font-bold text-black text-lg">
                        Vĩ độ
                    </label>

                    <input type="text" name="vi_do" value="{{ old('vi_do') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">
                </div>

                <div>
                    <label class="font-bold text-black text-lg">
                        Kinh độ
                    </label>

                    <input type="text" name="kinh_do" value="{{ old('kinh_do') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">
                </div>

                <div>
                    <label class=" text-black text-lg font-bold">
                        Số điện thoại
                    </label>

                    <input type="text" name="so_dien_thoai" value="{{ old('so_dien_thoai') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">
                </div>

                <div>
                    <label class=" text-black text-lg font-bold">
                        Email
                    </label>

                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">
                </div>

                <div>
                    <label class=" text-black text-lg font-bold">
                        Giờ check-in
                    </label>

                    <input type="time" name="gio_check_in" class="w-full mt-2 border rounded-full px-5 py-3">
                </div>

                <div>
                    <label class=" text-black text-lg font-bold">
                        Giờ check-out
                    </label>

                    <input type="time" name="gio_check_out" class="w-full mt-2 border rounded-full px-5 py-3">
                </div>

                <div>
                    <label class=" text-black text-lg font-bold">
                        Số giờ hủy miễn phí
                    </label>

                    <input type="number" name="so_gio_huy_mien_phi" value="24"
                        class="w-full mt-2 border rounded-full px-5 py-3">
                </div>

                <div>
                    <label class=" text-black text-lg font-bold">
                        Trạng thái
                    </label>

                    <select name="trang_thai" class="w-full mt-2 border rounded-full px-5 py-3">

                        <option value="1">
                            Hoạt động
                        </option>

                        <option value="0">
                            Tạm khóa
                        </option>

                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class=" text-black text-lg font-bold">
                        Mô tả
                    </label>

                    <textarea name="mo_ta" rows="5"
                        class="w-full mt-2 border rounded-3xl px-5 py-3">{{ old('mo_ta') }}</textarea>
                </div>

            </div>

            <div class="flex gap-4 mt-8">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full text-lg font-bold">

                    Lưu khách sạn

                </button>

                <a href="{{ route('admin.khachsan.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-full text-lg font-bold">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection