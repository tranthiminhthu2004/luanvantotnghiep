@extends('admin.trangchinh.admin')

@section('title','Chi tiết loại phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">

        <!-- Tiêu đề -->
        <div class="mb-6">

            <h2 class="text-2xl md:text-3xl font-bold text-[#061755]">

                {{ $loaiPhong->ten_loai_phong }}

            </h2>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Ảnh -->
            <div>

                @if($loaiPhong->hinhAnh->count())

                <img src="{{ asset($loaiPhong->hinhAnh->first()->duong_dan_anh) }}"
                    class="w-full h-80 object-cover rounded-2xl border">

                @else

                <img src="{{ asset('images/no-room.jpg') }}" class="w-full h-80 object-cover rounded-2xl border">

                @endif

            </div>

            <!-- Thông tin -->
            <div class="space-y-4 text-base text-black">

                <p>

                    <strong>

                        Khách sạn:

                    </strong>

                    {{ $loaiPhong->khachSan->ten_khach_san ?? 'Chưa cập nhật' }}

                </p>

                <p>

                    <strong>

                        Số người tối đa:

                    </strong>

                    {{ $loaiPhong->so_nguoi_toi_da ?? 'Chưa cập nhật' }}

                </p>

                <p>

                    <strong>

                        Diện tích:

                    </strong>

                    {{ $loaiPhong->dien_tich ? $loaiPhong->dien_tich.' m²' : 'Chưa cập nhật' }}

                </p>

                <p>

                    <strong>

                        Số giường:

                    </strong>

                    {{ $loaiPhong->so_giuong ?? 'Chưa cập nhật' }}

                </p>

                <p>

                    <strong>

                        Giá cơ bản:

                    </strong>

                    {{ number_format($loaiPhong->gia_co_ban,0,',','.') }} đ

                </p>

                <p>

                    <strong>

                        Trạng thái:

                    </strong>

                    @if($loaiPhong->trang_thai)

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">

                        Hoạt động

                    </span>

                    @else

                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">

                        Tạm dừng

                    </span>

                    @endif

                </p>

            </div>

        </div> <!-- Mô tả -->
        <div class="mt-8">

            <h3 class="text-xl md:text-2xl font-bold text-black mb-4">

                Mô tả

            </h3>

            <div class="bg-slate-50 rounded-xl p-4">

                <p class="text-black leading-8">

                    {{ $loaiPhong->mo_ta ?? 'Chưa có mô tả.' }}

                </p>

            </div>

        </div>

        <!-- Tiện nghi -->
        <div class="mt-10">

            <h3 class="text-xl md:text-2xl font-bold text-black mb-5">

                Tiện nghi loại phòng

            </h3>

            <div class="flex flex-wrap gap-3">

                @forelse($loaiPhong->tienNghis as $tienNghi)

                <div class="px-4 py-2 bg-blue-50 text-blue-700 rounded-full flex items-center gap-2">

                    <i class="fa-solid {{ $tienNghi->icon }}"></i>

                    <span>

                        {{ $tienNghi->ten_tien_nghi }}

                    </span>

                </div>

                @empty

                <span class="text-gray-500">

                    Chưa có tiện nghi.

                </span>

                @endforelse

            </div>

        </div>

        <!-- Album ảnh -->
        <div class="mt-10">

            <h3 class="text-xl md:text-2xl font-bold text-black mb-5">

                Album ảnh

            </h3>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                @forelse($loaiPhong->hinhAnh as $anh)

                <img src="{{ asset($anh->duong_dan_anh) }}" class="w-full h-40 object-cover rounded-2xl border">

                @empty

                <div class="col-span-full text-center text-gray-500 py-8">

                    Chưa có ảnh.

                </div>

                @endforelse

            </div>

        </div>

        <!-- Nút quay lại -->
        <div class="mt-8">

            <a href="{{ route('admin.loaiphong.index') }}"
                class="inline-flex items-center bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full font-semibold transition">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection