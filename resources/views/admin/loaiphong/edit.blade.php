@extends('admin.trangchinh.admin')

@section('title','Cập nhật loại phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-4 md:p-6">

        <!-- Tiêu đề -->
        <div class="mb-8">

            <h2 class="text-4xl font-bold text-[#061755]">

                Cập nhật loại phòng

            </h2>

        </div>

        <form action="{{ route('admin.loaiphong.update', $loaiPhong->ma_loai_phong) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Khách sạn -->
                <div>

                    <label class="font-medium text-slate-700">

                        Khách sạn

                    </label>

                    <select name="ma_khach_san" class="w-full mt-2 border rounded-full px-5 py-3">

                        @foreach($khachSans as $khachSan)

                        <option value="{{ $khachSan->ma_khach_san }}"
                            {{ $loaiPhong->ma_khach_san == $khachSan->ma_khach_san ? 'selected' : '' }}>

                            {{ $khachSan->ten_khach_san }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- Tên loại phòng -->
                <div>

                    <label class="font-medium text-slate-700">

                        Tên loại phòng

                    </label>

                    <input type="text" name="ten_loai_phong"
                        value="{{ old('ten_loai_phong', $loaiPhong->ten_loai_phong) }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Số người tối đa -->
                <div>

                    <label class="font-medium text-slate-700">

                        Số người tối đa

                    </label>

                    <input type="number" name="so_nguoi_toi_da"
                        value="{{ old('so_nguoi_toi_da', $loaiPhong->so_nguoi_toi_da) }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Diện tích -->
                <div>

                    <label class="font-medium text-slate-700">

                        Diện tích (m²)

                    </label>

                    <input type="number" step="0.01" name="dien_tich"
                        value="{{ old('dien_tich', $loaiPhong->dien_tich) }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Số giường -->
                <div>

                    <label class="font-medium text-slate-700">

                        Số giường

                    </label>

                    <input type="number" name="so_giuong" value="{{ old('so_giuong', $loaiPhong->so_giuong) }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Giá cơ bản -->
                <div>

                    <label class="font-medium text-slate-700">

                        Giá cơ bản

                    </label>

                    <input type="number" name="gia_co_ban" value="{{ old('gia_co_ban', $loaiPhong->gia_co_ban) }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Mô tả -->
                <div class="md:col-span-2">

                    <label class="font-medium text-slate-700">

                        Mô tả

                    </label>

                    <textarea name="mo_ta" rows="5"
                        class="w-full mt-2 border rounded-2xl px-5 py-3">{{ old('mo_ta', $loaiPhong->mo_ta) }}</textarea>

                </div>

                <!-- Trạng thái -->
                <div>

                    <label class="font-medium text-slate-700">

                        Trạng thái

                    </label>

                    <select name="trang_thai" class="w-full mt-2 border rounded-full px-5 py-3">

                        <option value="1" {{ $loaiPhong->trang_thai == 1 ? 'selected' : '' }}>

                            Hoạt động

                        </option>

                        <option value="0" {{ $loaiPhong->trang_thai == 0 ? 'selected' : '' }}>

                            Tạm dừng

                        </option>

                    </select>

                </div>

            </div>

            <div class="flex flex-col md:flex-row gap-4 mt-8">

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                    Cập nhật loại phòng

                </button>

                <a href="{{ route('admin.loaiphong.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl text-center">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection