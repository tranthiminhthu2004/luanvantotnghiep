@extends('admin.trangchinh.admin')

@section('title','Thêm đơn đặt phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-6">

        <h2 class="text-3xl font-bold text-[#061755] mb-8">

            Thêm đơn đặt phòng

        </h2>

        <form action="{{ route('admin.datphong.kiemTraPhong') }}" method="POST">
            @if ($errors->any())

            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">

                <ul class="list-disc ml-5">

                    @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Khách sạn -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Khách sạn

                    </label>

                    <select name="ma_khach_san" class="w-full mt-2 border rounded-xl px-4 py-3 text-black">

                        <option value="{{ $khachSan->ma_khach_san }}"
                            {{ old('ma_khach_san', session('duLieuDatPhong.ma_khach_san')) == $khachSan->ma_khach_san ? 'selected' : '' }}>

                            @foreach($khachSans as $khachSan)

                        <option value="{{ $khachSan->ma_khach_san }}"
                            {{ old('ma_khach_san') == $khachSan->ma_khach_san ? 'selected' : '' }}>

                            {{ $khachSan->ten_khach_san }}

                        </option>

                        @endforeach

                    </select>

                    @error('ma_khach_san')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Họ và tên đệm -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Họ và tên đệm

                    </label>

                    <input type="text" name="ho_va_ten_dem_khach"
                        value="{{ old('ho_va_ten_dem_khach', session('duLieuDatPhong.ho_va_ten_dem_khach')) }}"
                        class=" w-full mt-2 border rounded-xl px-4 py-3 text-black">

                    @error('ho_va_ten_dem_khach')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Tên -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Tên

                    </label>

                    <input type="text" name="ten_khach"
                        value="{{ old('ten_khach', session('duLieuDatPhong.ten_khach')) }}"
                        class=" w-full mt-2 border rounded-xl px-4 py-3 text-black">

                    @error('ten_khach')

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

                    <input type="email" name="email_khach"
                        value="{{ old('email_khach', session('duLieuDatPhong.email_khach')) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-black">

                    @error('email_khach')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Số điện thoại -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Số điện thoại

                    </label>

                    <input type="text" name="so_dien_thoai_khach"
                        value="{{ old('so_dien_thoai_khach', session('duLieuDatPhong.so_dien_thoai_khach')) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-black">

                    @error('so_dien_thoai_khach')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Ngày nhận phòng -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Ngày nhận phòng

                    </label>

                    <input type="date" name="ngay_nhan_phong"
                        value="{{ old('ngay_nhan_phong', session('duLieuDatPhong.ngay_nhan_phong')) }}"
                        min="{{ date('Y-m-d') }}" class="w-full mt-2 border rounded-xl px-4 py-3 text-black">

                    @error('ngay_nhan_phong')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Ngày trả phòng -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Ngày trả phòng

                    </label>

                    <input type="date" name="ngay_tra_phong"
                        value="{{ old('ngay_tra_phong', session('duLieuDatPhong.ngay_tra_phong')) }}"
                        min="{{ date('Y-m-d') }}" class="w-full mt-2 border rounded-xl px-4 py-3 text-black">

                    @error('ngay_tra_phong')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div> <!-- Người lớn -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Người lớn

                    </label>

                    <input type="number" name="so_nguoi_truong_thanh"
                        value="{{ old('so_nguoi_truong_thanh', session('duLieuDatPhong.so_nguoi_truong_thanh',1)) }}"
                        min="1" class="w-full mt-2 border rounded-xl px-4 py-3 text-black">

                    @error('so_nguoi_truong_thanh')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Trẻ em -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Trẻ em

                    </label>

                    <input type="number" name="so_tre_em"
                        value="{{ old('so_tre_em', session('duLieuDatPhong.so_tre_em',0)) }}"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-black">

                    @error('so_tre_em')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Người cao tuổi -->
                <div>

                    <label class="block text-sm font-semibold text-black">

                        Người cao tuổi

                    </label>

                    <input type="number" name="so_nguoi_cao_tuoi"
                        value="{{ old('so_nguoi_cao_tuoi', session('duLieuDatPhong.so_nguoi_cao_tuoi',0)) }}" min="0"
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-black">

                    @error('so_nguoi_cao_tuoi')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Ghi chú -->
                <div class="md:col-span-2">

                    <label class="block text-sm font-semibold text-black">

                        Ghi chú (không bắt buộc)

                    </label>

                    <textarea name="ghi_chu" rows="4" maxlength="500"
                        placeholder="Ví dụ: Phòng tầng cao, gần thang máy, thêm nôi em bé..."
                        class="w-full mt-2 border rounded-xl px-4 py-3 text-black resize-none">{{ old('ghi_chu', session('duLieuDatPhong.ghi_chu')) }}</textarea>

                    @error('ghi_chu')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

            </div>

            <div class="flex flex-wrap gap-4 mt-8">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full font-semibold transition">

                    Tiếp tục chọn loại phòng

                </button>

                <a href="{{ route('admin.datphong.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 text-black px-6 py-3 rounded-full font-semibold transition">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection