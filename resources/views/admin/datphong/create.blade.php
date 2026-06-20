@extends('admin.trangchinh.admin')

@section('title','Thêm đơn đặt phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <h2 class="text-4xl font-bold text-[#061755] mb-8">

            Thêm đơn đặt phòng

        </h2>

        <form action="{{ route('admin.datphong.kiemTraPhong') }}" method="POST">

            @csrf

            <div class="grid md:grid-cols-2 gap-6">

                <!-- Khách sạn -->
                <div>

                    <label class="font-medium">

                        Khách sạn

                    </label>

                    <select name="ma_khach_san" class="w-full mt-2 border rounded-full px-5 py-3">

                        <option value="">
                            Chọn khách sạn
                        </option>

                        @foreach($khachSans as $khachSan)

                        <option value="{{ $khachSan->ma_khach_san }}">

                            {{ $khachSan->ten_khach_san }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- Họ và tên đệm -->
                <div>

                    <label class="font-medium">

                        Họ và tên đệm

                    </label>

                    <input type="text" name="ho_va_ten_dem_khach" class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Tên -->
                <div>

                    <label class="font-medium">

                        Tên

                    </label>

                    <input type="text" name="ten_khach" class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Email -->
                <div>

                    <label class="font-medium">

                        Email

                    </label>

                    <input type="email" name="email_khach" class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- SĐT -->
                <div>

                    <label class="font-medium">

                        Số điện thoại

                    </label>

                    <input type="text" name="so_dien_thoai_khach" class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Ngày nhận -->
                <div>

                    <label class="font-medium">

                        Ngày nhận phòng

                    </label>

                    <input type="date" name="ngay_nhan_phong" min="{{ date('Y-m-d') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Ngày trả -->
                <div>

                    <label class="font-medium">

                        Ngày trả phòng

                    </label>

                    <input type="date" name="ngay_tra_phong" min="{{ date('Y-m-d') }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Người lớn -->
                <div>

                    <label class="font-medium">

                        Người lớn

                    </label>

                    <input type="number" name="so_nguoi_truong_thanh" value="1" min="1"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Trẻ em -->
                <div>

                    <label class="font-medium">

                        Trẻ em

                    </label>

                    <input type="number" name="so_tre_em" value="0" min="0"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Người cao tuổi -->
                <div>

                    <label class="font-medium">

                        Người cao tuổi

                    </label>

                    <input type="number" name="so_nguoi_cao_tuoi" value="0" min="0"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

            </div>

            <div class="mt-8 flex gap-4">

                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl">

                    Tiếp tục chọn loại phòng

                </button>

                <a href="{{ route('admin.datphong.index') }}" class="bg-slate-200 px-6 py-3 rounded-xl">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection