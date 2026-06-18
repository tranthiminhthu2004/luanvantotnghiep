@extends('admin.trangchinh.admin')

@section('title','Chi tiết khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <h2 class="text-4xl font-bold text-[#061755] mb-8">

            {{ $khachSan->ten_khach_san }}

        </h2>

        <div class="grid md:grid-cols-2 gap-8">

            <div>

                @if($khachSan->hinhAnh->count())

                <img src="{{ asset($khachSan->hinhAnh->first()->duong_dan_anh) }}"
                    class="w-full h-80 object-cover rounded-3xl">

                @endif

            </div>

            <div class="space-y-4 text-lg">

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

                    {{ $khachSan->trang_thai ? 'Hoạt động' : 'Tạm dừng' }}

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

                    {{ $khachSan->so_gio_huy_mien_phi }} giờ trước giờ nhận phòng
                </p>

            </div>

        </div>

        <div class="mt-8">

            <h3 class="text-2xl font-bold mb-4">

                Mô tả

            </h3>

            <p class="text-gray-600 leading-8">

                {{ $khachSan->mo_ta }}

            </p>

        </div>
        <div class="mt-10">

            <h3 class="text-2xl font-bold mb-5">

                Tiện nghi khách sạn

            </h3>

            <div class="flex flex-wrap gap-3">

                @forelse($khachSan->tienNghis as $tienNghi)

                <div class="px-4 py-2 bg-blue-50 text-blue-700 rounded-full flex items-center gap-2">

                    <i class="fa-solid {{ $tienNghi->icon }}"></i>

                    <span>

                        {{ $tienNghi->ten_tien_nghi }}

                    </span>

                </div>

                @empty

                <span class="text-gray-500">

                    Chưa có tiện nghi

                </span>

                @endforelse

            </div>

        </div>

        <div class="mt-10">

            <h3 class="text-2xl font-bold mb-5">

                Album ảnh

            </h3>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                @foreach($khachSan->hinhAnh as $anh)

                <img src="{{ asset($anh->duong_dan_anh) }}" class="w-full h-40 object-cover rounded-2xl">

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection