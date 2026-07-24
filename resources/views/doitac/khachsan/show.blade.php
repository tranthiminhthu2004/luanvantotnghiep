@extends('doitac.trangchinh.partner')

@section('title', 'Chi tiết hồ sơ khách sạn')

@section('content')

<div class="max-w-6xl mx-auto p-4 md:p-6 bg-white rounded-xl border border-slate-200 my-6">

    <!-- ===================== THÔNG TIN KHÁCH SẠN ===================== -->

    <div class="mb-6">

        <h2 class="text-3xl font-bold text-blue-900 mb-4">
            Thông tin khách sạn
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-3">

            <!-- Cột trái -->

            <div class="space-y-3">

                <div class="grid grid-cols-3">
                    <span class="text-slate-500">

                        Tên khách sạn
                    </span>

                    <span class="col-span-2 font-medium text-slate-800">
                        : {{ $khachSan->ten_khach_san }}
                    </span>
                </div>

                <div class="grid grid-cols-3">
                    <span class="text-slate-500">

                        Địa điểm
                    </span>

                    <span class="col-span-2 font-medium text-slate-800">
                        : {{ $khachSan->diaDiem->ten_dia_diem }}
                    </span>
                </div>

                <div class="grid grid-cols-3">
                    <span class="text-slate-500">

                        Địa chỉ
                    </span>

                    <span class="col-span-2 font-medium text-slate-800">
                        : {{ $khachSan->dia_chi }}
                    </span>
                </div>

                <div class="grid grid-cols-3">

                    <span class="text-slate-500">

                        Số sao
                    </span>

                    <span class="col-span-2 flex items-center gap-2">

                        :

                        <div class="flex">

                            @for($i = 1; $i <= 5; $i++) @if($i <=$khachSan->so_sao_khach_san)
                                <span class="text-yellow-400"><i class="fa-solid fa-star"></i></span>

                                @endif

                                @endfor

                        </div>

                        <span class="text-sm text-slate-500">
                            {{ $khachSan->so_sao_khach_san }} sao
                        </span>

                    </span>

                </div>

                <div class="grid grid-cols-3">
                    <span class="text-slate-500">
                        Điện thoại
                    </span>

                    <span class="col-span-2 font-medium text-slate-800">
                        : {{ $khachSan->so_dien_thoai }}
                    </span>
                </div>

            </div>

            <!-- Cột phải -->

            <div class="space-y-3">

                <div class="grid grid-cols-3">
                    <span class="text-slate-500">

                        Email
                    </span>

                    <span class="col-span-2 font-medium text-slate-800">
                        : {{ $khachSan->email }}
                    </span>
                </div>

                <div class="grid grid-cols-3">
                    <span class="text-slate-500">

                        Giờ Check-in
                    </span>

                    <span class="col-span-2 font-medium text-slate-800">
                        : {{ $khachSan->gio_check_in }}
                    </span>
                </div>

                <div class="grid grid-cols-3">
                    <span class="text-slate-500">

                        Giờ Check-out
                    </span>

                    <span class="col-span-2 font-medium text-slate-800">
                        : {{ $khachSan->gio_check_out }}
                    </span>
                </div>

                <div class="grid grid-cols-3">
                    <span class="text-slate-500">

                        Hủy miễn phí
                    </span>

                    <span class="col-span-2 font-medium text-slate-800">
                        : {{ $khachSan->so_gio_huy_mien_phi }} giờ trước khi nhận phòng
                    </span>
                </div>

            </div>

        </div>

        <!-- Mô tả -->

        <div class="mt-5 p-4 rounded-lg bg-slate-50 border">

            <h3 class="font-semibold text-slate-700 mb-2">
                Mô tả khách sạn
            </h3>

            @if(!empty($khachSan->mo_ta))

            <p class="text-slate-600 whitespace-pre-line leading-2">
                {{ $khachSan->mo_ta }}
            </p>

            @else

            <p class="italic text-slate-400">
                Chưa có mô tả.
            </p>

            @endif

        </div>

    </div>
    <!-- ===================== HÌNH ẢNH KHÁCH SẠN ===================== -->

    <div class="mb-6">

        <div class="flex items-center justify-between mb-4">

            <h2 class="text-3xl font-bold text-blue-900">
                Hình ảnh khách sạn
            </h2>

            <span class="text-slate-500">
                {{ $khachSan->hinhAnh->count() }} hình ảnh
            </span>

        </div>

        @if($khachSan->hinhAnh->count())

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3">

            @foreach($khachSan->hinhAnh as $anh)

            <div class="relative rounded-lg overflow-hidden border aspect-[4/3]">

                @if($loop->first)

                <span class="absolute top-2 left-2 bg-blue-600 text-white text-sm px-2 py-0.5 rounded-full">
                    Ảnh đại diện
                </span>

                @endif

                <img src="{{ asset($anh->duong_dan_anh) }}"
                    class="w-full h-full object-cover hover:scale-105 transition duration-300">

            </div>

            @endforeach

        </div>

        @else

        <div class="py-8 text-center text-slate-400">
            Chưa có hình ảnh.
        </div>

        @endif

    </div>


    <!-- ===================== LOẠI PHÒNG ===================== -->

    <div class="mb-6">

        <div class="flex items-center justify-between mb-4">

            <h2 class="text-3xl font-bold text-blue-900">
                Loại phòng
            </h2>

            <span class="text-slate-500">
                {{ $khachSan->loaiPhongs->count() }} loại phòng
            </span>

        </div>

        @if($khachSan->loaiPhongs->count())

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            @foreach($khachSan->loaiPhongs as $loaiPhong)

            <div class="border rounded-lg p-4 bg-white">

                <h3 class="text-xl font-bold text-slate-800 mb-3">
                    {{ $loaiPhong->ten_loai_phong }}
                </h3>

                @if($loaiPhong->hinhAnh->count())

                <img src="{{ asset($loaiPhong->hinhAnh->first()->duong_dan_anh) }}"
                    class="w-full h-40 object-cover rounded-md border mb-3">

                @else

                <div class="h-40 rounded-md border bg-slate-100 flex items-center justify-center text-slate-400">
                    Không có hình ảnh
                </div>

                @endif


                <div class="space-y-2 text-sm">

                    <p>
                        <strong>Số người tối đa:</strong>
                        {{ $loaiPhong->so_nguoi_toi_da }} người
                    </p>

                    <p>
                        <strong>Diện tích:</strong>
                        {{ $loaiPhong->dien_tich }} m²
                    </p>

                    <p>
                        <strong>Số giường:</strong>
                        {{ $loaiPhong->so_giuong }}
                    </p>

                    <p>
                        <strong>Giá:</strong>

                        <span class="text-emerald-600 font-semibold">
                            {{ number_format($loaiPhong->gia_co_ban) }} VNĐ / đêm
                        </span>
                    </p>

                    <div>

                        <strong>Mô tả:</strong>

                        <p class="mt-1 text-slate-600 whitespace-pre-line">
                            {{ $loaiPhong->mo_ta ?: 'Không có mô tả.' }}
                        </p>

                    </div>

                </div>


                <!-- Danh sách phòng -->

                <div class="mt-4 pt-3 border-t">

                    <p class="text-center font-semibold mb-3">
                        Danh sách phòng
                    </p>

                    @if($loaiPhong->phongs->count())

                    <div class="flex flex-wrap justify-center gap-2">

                        @foreach($loaiPhong->phongs as $phong)

                        <span class="px-3 py-1 rounded border bg-slate-50 text-sm"
                            title="Tầng {{ $phong->tang }} - {{ $phong->trang_thai_phong }}">

                            {{ $phong->so_phong }}

                        </span>

                        @endforeach

                    </div>

                    @else

                    <p class="text-center text-slate-400 italic">
                        Chưa có phòng
                    </p>

                    @endif

                </div>

            </div>

            @endforeach

        </div>

        @else

        <div class="py-8 text-center text-slate-400">
            Khách sạn chưa có loại phòng.
        </div>

        @endif

    </div>
    <!-- ===================== TIỆN NGHI ===================== -->

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

        <!-- Tiện nghi khách sạn -->

        <div class="border rounded-xl p-5">

            <h2 class="text-2xl font-bold text-blue-900 mb-4">
                Tiện nghi khách sạn
            </h2>

            @if($khachSan->tienNghis->count())

            <div class="flex flex-wrap gap-2">

                @foreach($khachSan->tienNghis as $tienNghi)

                <span class="inline-flex items-center gap-2 border rounded-md px-3 py-2 bg-white text-slate-700">

                    <i class="fa-solid fa-check text-blue-600"></i>

                    {{ $tienNghi->ten_tien_nghi }}

                </span>

                @endforeach

            </div>

            @else

            <p class="italic text-slate-400">
                Chưa có tiện nghi.
            </p>

            @endif

        </div>


        <!-- Tiện nghi từng loại phòng -->

        <div class="border rounded-xl p-5">

            <h2 class="text-2xl font-bold text-blue-900 mb-4">
                Tiện nghi từng loại phòng
            </h2>

            <div class="space-y-4">

                @forelse($khachSan->loaiPhongs as $loaiPhong)

                <div class="border-b pb-3 last:border-0">

                    <div class="font-semibold text-slate-700 mb-2">
                        {{ $loaiPhong->ten_loai_phong }}
                    </div>

                    @if($loaiPhong->tienNghis->count())

                    <div class="flex flex-wrap gap-2">

                        @foreach($loaiPhong->tienNghis as $tienNghi)

                        <span
                            class="inline-flex items-center gap-2 border rounded-md px-3 py-1 bg-slate-50 text-slate-700">

                            <i class="fa-solid fa-check text-emerald-600"></i>

                            {{ $tienNghi->ten_tien_nghi }}

                        </span>

                        @endforeach

                    </div>

                    @else

                    <p class="italic text-slate-400">
                        Chưa có tiện nghi.
                    </p>

                    @endif

                </div>

                @empty

                <p class="italic text-slate-400">
                    Chưa có dữ liệu loại phòng.
                </p>

                @endforelse

            </div>

        </div>

    </div>
    <!-- ===================== THÔNG TIN HỒ SƠ ===================== -->

    <div class="mb-8">

        <h2 class="text-3xl font-bold text-blue-900 mb-4">
            Thông tin hồ sơ
        </h2>

        <div class="space-y-3">

            <div class="grid grid-cols-3">
                <span class="text-slate-500">
                    Mã khách sạn
                </span>

                <span class="col-span-2 font-medium text-slate-800">
                    : #{{ $khachSan->ma_khach_san }}
                </span>
            </div>

            <div class="grid grid-cols-3">
                <span class="text-slate-500">
                    Ngày gửi hồ sơ
                </span>

                <span class="col-span-2 font-medium text-slate-800">
                    : {{ optional($khachSan->ngay_gui_duyet)->format('d/m/Y H:i') ?? '--' }}
                </span>
            </div>

            <div class="grid grid-cols-3">
                <span class="text-slate-500">
                    Ngày duyệt
                </span>

                <span class="col-span-2 font-medium text-slate-800">
                    : {{ optional($khachSan->ngay_duyet)->format('d/m/Y H:i') ?? '--' }}
                </span>
            </div>

            <div class="grid grid-cols-3 items-center">

                <span class="text-slate-500">
                    Trạng thái
                </span>

                <span class="col-span-2">

                    @switch($khachSan->trang_thai_duyet)

                    @case('ChoDuyet')

                    <span
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-700">
                        <i class="fa-regular fa-clock"></i>
                        Chờ duyệt
                    </span>

                    @break

                    @case('DaDuyet')

                    <span
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700">
                        <i class="fa-regular fa-circle-check"></i>
                        Đã duyệt
                    </span>

                    @break

                    @default

                    <span
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-rose-50 border border-rose-200 text-rose-700">
                        <i class="fa-regular fa-circle-xmark"></i>
                        Từ chối
                    </span>

                    @endswitch

                </span>

            </div>

        </div>

    </div>
    @if($khachSan->trang_thai_duyet == 'TuChoi' && $khachSan->ly_do_tu_choi)

    <div class="mt-2 p-4 ">

        <h3 class="font-semibold text-red-700 mb-2">
            Lý do từ chối: {{ $khachSan->ly_do_tu_choi }}
        </h3>


    </div>

    @endif

    <div class="flex justify-between pt-4 border-t">

        <a href="{{ route('doitac.khachsan.index') }}"
            class="px-4 py-2 rounded-lg border border-slate-300 hover:bg-slate-50 text-slate-700 transition">

            Quay lại

        </a>

    </div>

</div>

@endsection