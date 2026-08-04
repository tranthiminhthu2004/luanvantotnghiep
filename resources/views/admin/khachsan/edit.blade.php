@extends('admin.trangchinh.admin')

@section('title','Sửa khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">


    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">
        <form action="{{ route('admin.khachsan.update',$khachSan->ma_khach_san) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Tên khách sạn -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Tên khách sạn
                    </label>

                    <input type="text" name="ten_khach_san" value="{{ old('ten_khach_san',$khachSan->ten_khach_san) }}"
                        placeholder="Nhập tên khách sạn"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">
                    @error('ten_khach_san')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Địa điểm -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Địa điểm
                    </label>

                    <select name="ma_dia_diem" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                        @foreach($diaDiems as $diaDiem)

                        <option value="{{ $diaDiem->ma_dia_diem }}"
                            {{ old('ma_dia_diem',$khachSan->ma_dia_diem) == $diaDiem->ma_dia_diem ? 'selected' : '' }}>

                            {{ $diaDiem->ten_dia_diem }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- Địa chỉ -->
                <div class="md:col-span-2">

                    <label class="block text-base font-semibold text-black">
                        Địa chỉ
                    </label>

                    <input type="text" name="dia_chi" value="{{ old('dia_chi',$khachSan->dia_chi) }}"
                        placeholder="Nhập địa chỉ khách sạn"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">
                    @error('dia_chi')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Vĩ độ -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Vĩ độ
                    </label>

                    <input type="text" name="vi_do" value="{{ old('vi_do',$khachSan->vi_do) }}"
                        placeholder="Ví dụ: 10.776889"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">
                    @error('vi_do')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Kinh độ -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Kinh độ
                    </label>

                    <input type="text" name="kinh_do" value="{{ old('kinh_do',$khachSan->kinh_do) }}"
                        placeholder="Ví dụ: 106.700806"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">
                    @error('kinh_do')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Số sao -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Số sao khách sạn
                    </label>

                    <select name="so_sao_khach_san"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                        @for($i = 1; $i <= 5; $i++) <option value="{{ $i }}"
                            {{ $khachSan->so_sao_khach_san == $i ? 'selected' : '' }}>

                            {{ $i }} Sao

                            </option>

                            @endfor

                    </select>

                </div>

                <!-- Số điện thoại -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Số điện thoại
                    </label>

                    <input type="text" name="so_dien_thoai" value="{{ old('so_dien_thoai',$khachSan->so_dien_thoai) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">
                    @error('so_dien_thoai')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="md:col-span-2">

                    <label class="block text-base font-semibold text-black">
                        Email
                    </label>

                    <input type="email" name="email" value="{{ old('email',$khachSan->email) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Giờ nhận phòng -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Giờ nhận phòng
                    </label>

                    <input type="time" name="gio_check_in"
                        value="{{ old('gio_check_in', \Carbon\Carbon::parse($khachSan->gio_check_in)->format('H:i')) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">
                    @error('gio_check_in')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Giờ trả phòng -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Giờ trả phòng
                    </label>

                    <input type="time" name="gio_check_out"
                        value="{{ old('gio_check_out', \Carbon\Carbon::parse($khachSan->gio_check_out)->format('H:i')) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">
                    @error('gio_check_out')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <!-- Hủy miễn phí -->
                <div>

                    <label class="block text-base font-semibold text-black">
                        Hủy miễn phí trước (giờ)
                    </label>

                    <input type="number" name="so_gio_huy_mien_phi"
                        value="{{ old('so_gio_huy_mien_phi',$khachSan->so_gio_huy_mien_phi) }}" placeholder="Ví dụ: 24"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                </div>

                <!-- Trạng thái -->
                <div>

            <label class="block text-base font-semibold text-black">
                Trạng thái
            </label>

    <select
        name="trang_thai"
        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-base text-black">

        <option value="1" {{ $khachSan->trang_thai == 1 ? 'selected' : '' }}>
            Hoạt động
        </option>

        <option value="0" {{ $khachSan->trang_thai == 0 ? 'selected' : '' }}>
            Tạm dừng
        </option>

    </select>

    @if(session('error'))
        <p class="mt-2 text-sm text-red-600">
            {{ session('error') }}
        </p>
    @endif

</div>

                <!-- Mô tả -->
                <div class="md:col-span-2">

                    <label class="block text-base font-semibold text-black">
                        Mô tả
                    </label>

                    <textarea name="mo_ta" rows="5" placeholder="Nhập mô tả khách sạn..."
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">{{ old('mo_ta',$khachSan->mo_ta) }}</textarea>

                </div>

            </div>

            <!-- Button -->
            <div class="flex flex-wrap gap-3 mt-6">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full text-base font-semibold transition">

                    Cập nhật

                </button>

                <a href="{{ route('admin.khachsan.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full text-base font-semibold transition">

                    Quay lại

                </a>

            </div>

        </form>

    </div>


</div>

@endsection