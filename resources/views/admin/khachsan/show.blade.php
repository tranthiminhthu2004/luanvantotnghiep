@extends('admin.trangchinh.admin')

@section('title','Chi tiết khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">

        <h2 class="text-2xl md:text-3xl font-bold text-[#061755] mb-6">

            {{ $khachSan->ten_khach_san }}

        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <div>

                @if($khachSan->hinhAnh->count())

                <img src="{{ asset($khachSan->hinhAnh->first()->duong_dan_anh) }}"
                    class="w-full h-64 md:h-80 object-cover rounded-2xl">

                @endif

            </div>

            <div class="space-y-3 text-sm text-black">

                <p>

                    <strong>Địa điểm:</strong>

                    {{ $khachSan->diaDiem->ten_dia_diem ?? 'Chưa cập nhật' }}

                </p>

                <p>

                    <strong>Địa chỉ:</strong>

                    {{ $khachSan->dia_chi }}

                </p>

                <p>

                    <strong>Số điện thoại:</strong>

                    {{ $khachSan->so_dien_thoai }}

                </p>

                <p>

                    <strong>Email:</strong>

                    {{ $khachSan->email }}

                </p>

                <p>

                    <strong>Số sao:</strong>

                    {{ $khachSan->so_sao_khach_san }} ⭐

                </p>

                <p>

                    <strong>Trạng thái:</strong>

                    @if($khachSan->trang_thai)

                    <span class="text-green-600 font-semibold">

                        Hoạt động

                    </span>

                    @else

                    <span class="text-red-600 font-semibold">

                        Tạm dừng

                    </span>

                    @endif

                </p>

                <p>

                    <strong>Nhận phòng:</strong>

                    {{ \Carbon\Carbon::parse($khachSan->gio_check_in)->format('H:i') }}

                </p>

                <p>

                    <strong>Trả phòng:</strong>

                    {{ \Carbon\Carbon::parse($khachSan->gio_check_out)->format('H:i') }}

                </p>

                <p>

                    <strong>Hủy miễn phí:</strong>

                    {{ $khachSan->so_gio_huy_mien_phi }}

                    giờ trước giờ nhận phòng

                </p>

            </div>

        </div>

        <!-- Mô tả -->
        <div class="mt-8">

            <h3 class="text-xl font-bold mb-3 text-black">

                Mô tả

            </h3>

            <p class="text-black leading-7 text-sm">

                {{ $khachSan->mo_ta }}

            </p>

        </div>

        <!-- Tiện nghi -->
        <div class="mt-8">

            <h3 class="text-xl font-bold mb-4 text-black">

                Tiện nghi khách sạn

            </h3>

            <div class="flex flex-wrap gap-3">

                @forelse($khachSan->tienNghis as $tienNghi)

                <div class="px-3 py-2 bg-blue-50 text-blue-700 rounded-full text-sm flex items-center gap-2">

                    <i class="fa-solid {{ $tienNghi->icon }}"></i>

                    <span>

                        {{ $tienNghi->ten_tien_nghi }}

                    </span>

                </div>

                @empty

                <span class="text-gray-500 text-sm">

                    Chưa có tiện nghi

                </span>

                @endforelse

            </div>

        </div>
        <!-- Album ảnh -->
        <div class="mt-8">

            <h3 class="text-xl font-bold mb-4 text-black">

                Album ảnh

            </h3>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">

                @foreach($khachSan->hinhAnh as $anh)

                <img src="{{ asset($anh->duong_dan_anh) }}" class="w-full h-32 md:h-40 object-cover rounded-xl">

                @endforeach

            </div>

        </div>

        <!-- Nút quay lại -->
        <div class="mt-6">

            <a href="{{ route('admin.khachsan.index') }}"
                class="inline-flex items-center bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full text-sm font-semibold transition">

                <i class="fa-solid fa-arrow-left mr-2"></i>

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection