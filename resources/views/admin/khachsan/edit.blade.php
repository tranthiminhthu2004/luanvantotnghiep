@extends('admin.trangchinh.admin')

@section('title','Sửa khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-4 md:p-6">

        <div class="mb-8">

            <h2 class="text-4xl font-bold text-[#061755]">

                Cập nhật thông tin khách sạn

            </h2>

            <p class="text-gray-500 text-base mt-2">

                Chỉnh sửa thông tin khách sạn trong hệ thống.

            </p>

        </div>

        <form action="{{ route('admin.khachsan.update',$khachSan->ma_khach_san) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Tên khách sạn -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Tên khách sạn

                    </label>

                    <input type="text" name="ten_khach_san" value="{{ old('ten_khach_san',$khachSan->ten_khach_san) }}"
                        placeholder="Nhập tên khách sạn" class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Thành phố -->
                <!-- Địa điểm -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Địa điểm

                    </label>

                    <select name="ma_dia_diem" class="w-full mt-2 border rounded-full px-5 py-3 text-base">

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

                    <label class="font-medium text-slate-700 text-base">

                        Địa chỉ

                    </label>

                    <input type="text" name="dia_chi" value="{{ old('dia_chi',$khachSan->dia_chi) }}"
                        placeholder="Nhập địa chỉ khách sạn"
                        class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Vĩ độ -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Vĩ độ

                    </label>

                    <input type="text" name="vi_do" value="{{ old('vi_do',$khachSan->vi_do) }}"
                        placeholder="Ví dụ: 10.776889" class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Kinh độ -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Kinh độ

                    </label>

                    <input type="text" name="kinh_do" value="{{ old('kinh_do',$khachSan->kinh_do) }}"
                        placeholder="Ví dụ: 106.700806" class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Số sao -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Số sao khách sạn

                    </label>

                    <select name="so_sao_khach_san" class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                        @for($i = 1; $i <= 5; $i++) <option value="{{ $i }}"
                            {{ $khachSan->so_sao_khach_san == $i ? 'selected' : '' }}>

                            {{ $i }} Sao

                            </option>

                            @endfor

                    </select>

                </div>

                <!-- Số điện thoại -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Số điện thoại

                    </label>

                    <input type="text" name="so_dien_thoai" value="{{ old('so_dien_thoai',$khachSan->so_dien_thoai) }}"
                        placeholder="Nhập số điện thoại" class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Email -->
                <div class="md:col-span-2">

                    <label class="font-medium text-slate-700 text-base">

                        Email

                    </label>

                    <input type="email" name="email" value="{{ old('email',$khachSan->email) }}"
                        placeholder="Nhập email" class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>
                <!-- Giờ nhận phòng -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Giờ nhận phòng

                    </label>

                    <input type="time" name="gio_check_in" value="{{ old('gio_check_in',$khachSan->gio_check_in) }}"
                        class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Giờ trả phòng -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Giờ trả phòng

                    </label>

                    <input type="time" name="gio_check_out" value="{{ old('gio_check_out',$khachSan->gio_check_out) }}"
                        class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Hủy miễn phí -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Hủy miễn phí trước (giờ)

                    </label>

                    <input type="number" name="so_gio_huy_mien_phi"
                        value="{{ old('so_gio_huy_mien_phi',$khachSan->so_gio_huy_mien_phi) }}" placeholder="Ví dụ: 24"
                        class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                </div>

                <!-- Mô tả -->
                <div class="md:col-span-2">

                    <label class="font-medium text-slate-700 text-base">

                        Mô tả

                    </label>

                    <textarea name="mo_ta" rows="5" placeholder="Nhập mô tả khách sạn..."
                        class="w-full mt-2 border rounded-2xl px-5 py-3 text-base">{{ old('mo_ta',$khachSan->mo_ta) }}</textarea>

                </div>

                <!-- Trạng thái -->
                <div>

                    <label class="font-medium text-slate-700 text-base">

                        Trạng thái

                    </label>

                    <select name="trang_thai" class="w-full mt-2 border rounded-full px-5 py-3 text-base">

                        <option value="1" {{ $khachSan->trang_thai == 1 ? 'selected' : '' }}>

                            Hoạt động

                        </option>

                        <option value="0" {{ $khachSan->trang_thai == 0 ? 'selected' : '' }}>

                            Tạm dừng

                        </option>

                    </select>

                </div>

            </div>

            <div class="flex flex-col md:flex-row gap-4 mt-8">

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-base">

                    Cập nhật khách sạn

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