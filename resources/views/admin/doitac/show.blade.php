@extends('admin.trangchinh.admin')

@section('title', 'Chi tiết hồ sơ đối tác')

@section('content')

<div class="max-w-6xl mx-auto p-4 md:p-6 bg-white rounded-xl border border-slate-200 my-6 text-slate-700 font-sans">

    <div class="p-4 mb-6 border-b border-slate-200">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            <div>

                <h2 class="text-3xl font-bold text-[#061755] mb-5">
                    Thông tin đối tác
                </h2>

                <div class="space-y-3 test-base">

                    <div class="grid grid-cols-[140px_1fr] gap-4">
                        <span class="text-black">Họ và tên</span>
                        <span class="font-medium text-black">
                            {{ optional($doiTac->nguoiDung)->ho_va_ten_dem }}
                            {{ optional($doiTac->nguoiDung)->ten }}
                        </span>
                    </div>

                    <div class="grid grid-cols-[140px_1fr] gap-4">
                        <span class="text-black">Email</span>
                        <span class="font-medium text-black">
                            {{ optional($doiTac->nguoiDung)->email }}
                        </span>
                    </div>

                    <div class="grid grid-cols-[140px_1fr] gap-4">
                        <span class="text-black">Số điện thoại</span>
                        <span class="font-medium text-black">
                            {{ optional($doiTac->nguoiDung)->so_dien_thoai }}
                        </span>
                    </div>

                    <div class="grid grid-cols-[140px_1fr] gap-4">
                        <span class="text-black">Khách sạn</span>
                        <span class="font-medium text-black">
                            {{ $doiTac->ten_khach_san }}
                        </span>
                    </div>

                </div>

            </div>

            <div class="lg:border-l lg:border-slate-200 lg:pl-8">

                <h2 class="text-3xl font-bold text-[#061755] mb-5">
                    Thông tin hồ sơ
                </h2>

                <div class="space-y-3">

                    <div class="grid grid-cols-[140px_1fr] gap-4">
                        <span class="text-black">Mã hồ sơ</span>
                        <span class="font-medium text-black">
                            #{{ $doiTac->ma_khach_san }}
                        </span>
                    </div>

                    <div class="grid grid-cols-[140px_1fr] gap-4">
                        <span class="text-black">Ngày gửi</span>
                        <span class="font-medium text-black">

                            {{ $doiTac->ngay_gui_duyet
                            ? \Carbon\Carbon::parse($doiTac->ngay_gui_duyet)->format('d/m/Y H:i')
                            : '--' }}

                        </span>
                    </div>

                    <div class="grid grid-cols-[140px_1fr] gap-4">
                        <span class="text-black">Ngày duyệt</span>
                        <span class="font-medium text-black">

                            {{ $doiTac->ngay_duyet
                            ? \Carbon\Carbon::parse($doiTac->ngay_duyet)->format('d/m/Y H:i')
                            : '--' }}

                        </span>
                    </div>

                    <div class="grid grid-cols-[140px_1fr] gap-4 items-center">

                        <span class="text-black">
                            Trạng thái
                        </span>

                        <div>

                            @if($doiTac->trang_thai_duyet == 'ChoDuyet')

                            <span
                                class="inline-flex rounded-full bg-yellow-100 text-yellow-700 px-3 py-1 text-sm font-medium">
                                Chờ duyệt
                            </span>

                            @elseif($doiTac->trang_thai_duyet == 'DaDuyet')

                            <span
                                class="inline-flex rounded-full bg-green-100 text-green-700 px-3 py-1 text-sm font-medium">
                                Đã duyệt
                            </span>

                            @else

                            <span
                                class="inline-flex rounded-full bg-red-100 text-red-700 px-3 py-1 text-sm font-medium">
                                Từ chối
                            </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- ===================== THÔNG TIN KHÁCH SẠN ===================== --}}
    <div class="p-4 mb-6 border-b border-slate-200">

        <h2 class="text-3xl font-bold text-[#061755] mb-6">
            Thông tin khách sạn
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            {{-- Cột trái --}}
            <div class="space-y-3">

                <div class="grid grid-cols-[150px_1fr] gap-4">
                    <span class="text-black">Địa điểm</span>

                    <span class="font-medium text-black">
                        {{ optional($doiTac->diaDiem)->ten_dia_diem }}
                    </span>
                </div>

                <div class="grid grid-cols-[150px_1fr] gap-4">
                    <span class="text-black">Địa chỉ</span>

                    <span class="font-medium text-black">
                        {{ $doiTac->dia_chi }}
                    </span>
                </div>

                <div class="grid grid-cols-[150px_1fr] gap-4">

                    <span class="text-black">
                        Số sao
                    </span>

                    <div class="flex items-center gap-2">

                        <div class="flex">

                            @for($i = 1; $i <= 5; $i++) @if($i <=$doiTac->so_sao_khach_san)

                                <span class="text-yellow-400">★</span>

                                @else

                                <span class="text-slate-300">★</span>

                                @endif

                                @endfor

                        </div>

                    </div>

                </div>

                <div class="grid grid-cols-[150px_1fr] gap-4">
                    <span class="text-black">Số điện thoại</span>

                    <span class="font-medium text-black">
                        {{ $doiTac->so_dien_thoai }}
                    </span>
                </div>

            </div>

            {{-- Cột phải --}}
            <div class="space-y-3 lg:border-l lg:border-slate-200 lg:pl-8">

                <div class="grid grid-cols-[150px_1fr] gap-4">
                    <span class="text-black">Email</span>

                    <span class="font-medium text-black">
                        {{ $doiTac->email }}
                    </span>
                </div>

                <div class="grid grid-cols-[150px_1fr] gap-4">
                    <span class="text-black">Giờ Check-in</span>

                    <span class="font-medium text-black">
                        {{ $doiTac->gio_check_in }}
                    </span>
                </div>

                <div class="grid grid-cols-[150px_1fr] gap-4">
                    <span class="text-black">Giờ Check-out</span>

                    <span class="font-medium text-black">
                        {{ $doiTac->gio_check_out }}
                    </span>
                </div>

                <div class="grid grid-cols-[150px_1fr] gap-4">
                    <span class="text-black">
                        Hủy miễn phí
                    </span>

                    <span class="font-medium text-black">
                        {{ $doiTac->so_gio_huy_mien_phi }}
                    </span>
                </div>

            </div>

        </div>

        {{-- ================= MÔ TẢ ================= --}}
        <div class="mt-3">

            <h3 class="text-base text-black ">
                Mô tả khách sạn
            </h3>

            @if(!empty($doiTac->mo_ta))

            <div class="whitespace-pre-line text-black font-medium ">

                {{ $doiTac->mo_ta }}

            </div>

            @else

            <div class="italic text-slate-400">

                Chưa có mô tả.

            </div>

            @endif

        </div>

    </div>

    {{-- ===================== 2. HÌNH ẢNH KHÁCH SẠN ===================== --}}
    <div class="p-4 mb-6">

        <div class="flex items-center justify-between mb-6">

            <h2 class="text-3xl font-bold text-[#061755]">

                Hình ảnh khách sạn

            </h2>

            <span class="text-sm text-slate-500">

                {{ $doiTac->hinhAnh->count() }} hình ảnh

            </span>

        </div>

        @if($doiTac->hinhAnh->count())

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">

            @foreach($doiTac->hinhAnh as $hinhAnh)

            <a href="{{ asset($hinhAnh->duong_dan_anh) }}" target="_blank"
                class="relative overflow-hidden rounded-xl border border-slate-200 group">

                @if($loop->first)

                <span
                    class="absolute top-2 left-2 z-10 rounded-md bg-blue-600 px-2 py-1 text-xs font-medium text-white">

                    Ảnh đại diện

                </span>

                @endif

                <img src="{{ asset($hinhAnh->duong_dan_anh) }}" alt="Hình ảnh khách sạn"
                    class="h-36 w-full object-cover transition duration-300 group-hover:scale-105">

            </a>

            @endforeach

        </div>

        @else

        <div
            class="flex h-48 items-center justify-center rounded-xl border-2 border-dashed border-slate-300 text-slate-400">

            <div class="text-center">

                <i class="fa-regular fa-image text-4xl mb-3"></i>

                <p>Chưa có hình ảnh khách sạn.</p>

            </div>

        </div>

        @endif

    </div>
    {{-- ===================== LOẠI PHÒNG ===================== --}}
    <div class="p-6 mb-6 border-b border-slate-200">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-6">

            <h2 class="text-3xl font-bold text-[#061755]">
                Loại phòng
            </h2>

            <span class="text-sm text-slate-500">
                {{ $doiTac->loaiPhongs->count() }} loại phòng
            </span>

        </div>

        @if($doiTac->loaiPhongs->count())

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            @foreach($doiTac->loaiPhongs as $phong)

            @php
            $anh = $phong->hinhAnh->first();
            @endphp

            <div class="border rounded-lg overflow-hidden">

                {{-- Ảnh --}}
                @if($anh)

                <img src="{{ asset($anh->duong_dan_anh) }}" class="w-full h-52 object-cover">

                @else

                <div class="h-52 flex items-center justify-center bg-slate-100 text-slate-400">

                    Không có hình ảnh

                </div>

                @endif

                <div class="p-5">

                    <h3 class="text-xl font-bold text-slate-800 mb-4">

                        {{ $phong->ten_loai_phong }}

                    </h3>

                    {{-- Thông tin --}}
                    <div class="space-y-2 text-sm">

                        <div class="grid grid-cols-[120px_1fr]">

                            <span class="text-black">
                                Sức chứa
                            </span>

                            <span class="font-medium text-black">
                                {{ $phong->so_nguoi_toi_da }} người
                            </span>

                        </div>

                        <div class="grid grid-cols-[120px_1fr]">

                            <span class="text-black">
                                Diện tích
                            </span>

                            <span class="font-medium text-black">
                                {{ $phong->dien_tich }} m²
                            </span>

                        </div>

                        <div class="grid grid-cols-[120px_1fr]">

                            <span class="text-black">
                                Số giường
                            </span>

                            <span class="font-medium text-black">
                                {{ $phong->so_giuong }}
                            </span>

                        </div>

                        <div class="grid grid-cols-[120px_1fr]">

                            <span class="text-black">
                                Giá
                            </span>

                            <span class="font-semibold text-blue-600">

                                {{ number_format($phong->gia_co_ban,0,',','.') }}

                                VNĐ / đêm

                            </span>

                        </div>

                    </div>

                    {{-- Mô tả --}}
                    <div class="mt-5">

                        <h4 class=" text-black">
                            Mô tả
                        </h4>

                        <p class="text-sm text-slate-600 whitespace-pre-line">

                            {{ $phong->mo_ta ?: 'Không có mô tả.' }}

                        </p>

                    </div>

                    {{-- Danh sách phòng --}}
                    <div class="mt-5 border-t">

                        <h4 class="font-medium mb-3">

                            Danh sách phòng

                        </h4>

                        @if($phong->phongs->count())

                        <div class="flex flex-wrap gap-2">

                            @foreach($phong->phongs as $phongCon)

                            <span class="px-3 py-1 rounded border bg-slate-50 text-sm">

                                {{ $phongCon->so_phong }}

                            </span>

                            @endforeach

                        </div>

                        @else

                        <div class="text-sm text-slate-400">

                            Chưa có phòng.

                        </div>

                        @endif

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        @else

        <div class="py-10 text-center text-slate-400">

            Khách sạn chưa có loại phòng.

        </div>

        @endif

    </div>
    {{-- ===================== 6. TIỆN NGHI ===================== --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

        {{-- ================= TIỆN NGHI KHÁCH SẠN ================= --}}
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between mb-5">

                <h2 class="text-2xl font-bold text-[#061755]">
                    Tiện nghi khách sạn
                </h2>

                <span class="text-sm text-slate-500">
                    {{ $doiTac->tienNghis->count() }} tiện nghi
                </span>

            </div>

            @if($doiTac->tienNghis->count())

            <div class="flex flex-wrap gap-3">

                @foreach($doiTac->tienNghis as $tienNghi)

                <div class="inline-flex items-center gap-2 rounded-xl border border-blue-200 bg-blue-50 px-4 py-2">

                    <i class="fa-solid fa-check text-blue-600"></i>

                    <span class="text-sm font-medium text-slate-700">

                        {{ $tienNghi->ten_tien_nghi }}

                    </span>

                </div>

                @endforeach

            </div>

            @else

            <div
                class="flex h-40 items-center justify-center rounded-xl border-2 border-dashed border-slate-300 text-slate-400">

                Chưa có tiện nghi.

            </div>

            @endif

        </div>

        {{-- ================= TIỆN NGHI LOẠI PHÒNG ================= --}}
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">

            <h2 class="text-2xl font-bold text-[#061755] mb-5">

                Tiện nghi từng loại phòng

            </h2>

            @forelse($doiTac->loaiPhongs as $phong)

            <div class="mb-5 last:mb-0">

                <div class="flex items-center justify-between border-b border-slate-200 pb-2 mb-3">

                    <h3 class="font-bold text-slate-800">

                        {{ $phong->ten_loai_phong }}

                    </h3>

                    <span class="text-xs text-slate-500">

                        {{ $phong->tienNghis->count() }} tiện nghi

                    </span>

                </div>

                @if($phong->tienNghis->count())

                <div class="flex flex-wrap gap-2">

                    @foreach($phong->tienNghis as $tienNghi)

                    <span
                        class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 text-sm">

                        <i class="fa-solid fa-check text-emerald-500"></i>

                        {{ $tienNghi->ten_tien_nghi }}

                    </span>

                    @endforeach

                </div>

                @else

                <div class="text-sm italic text-slate-400">

                    Chưa có tiện nghi.

                </div>

                @endif

            </div>

            @empty

            <div
                class="flex h-40 items-center justify-center rounded-xl border-2 border-dashed border-slate-300 text-slate-400">

                Chưa có loại phòng.

            </div>

            @endforelse

        </div>

    </div>

    {{-- ===================== 6 & 7. THỰC HIỆN DUYỆT HỒ SƠ / KẾT QUẢ (BOTTOM) ===================== --}}
    <div class="pt-4 border-t border-slate-200">

        @if($doiTac->trang_thai_duyet == 'ChoDuyet')

        <div class="flex items-center justify-center gap-6 py-2">

            {{-- Form bấm duyệt --}}
            <form action="{{ route('admin.doitac.duyet', $doiTac->ma_khach_san) }}" method="POST"
                onsubmit="return confirm('Bạn có chắc muốn duyệt hồ sơ này?');">

                @csrf

                @method('PATCH')

                <button type="submit"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition flex items-center gap-2 shadow-sm">

                    <i class="fa-solid fa-circle-check"></i>

                    Duyệt hồ sơ

                </button>

            </form>


            {{-- Nút bật Modal từ chối --}}
            <button type="button" onclick="document.getElementById('modalTuChoi').classList.remove('hidden')"
                class="bg-rose-600 hover:bg-rose-700 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition flex items-center gap-2 shadow-sm">

                <i class="fa-solid fa-circle-xmark"></i>

                Từ chối hồ sơ

            </button>

        </div>

        @elseif($doiTac->trang_thai_duyet == 'DaDuyet')

        <div class="bg-emerald-50 border border-emerald-200 rounded-lg p-4 text-xs text-emerald-800">

            <div class="flex items-center gap-2 font-semibold text-sm">

                <i class="fa-solid fa-circle-check"></i>

                Hồ sơ đã được duyệt

            </div>


            @if($doiTac->ngay_duyet)

            <div class="mt-1 text-emerald-700">

                Thời gian duyệt: {{ \Carbon\Carbon::parse($doiTac->ngay_duyet)->format('d/m/Y H:i') }}

            </div>

            @endif

        </div>

        @elseif($doiTac->trang_thai_duyet == 'TuChoi')

        <div class=" p-4 text-base text-rose-800">

            <div class="font-semibold text-base mb-1">

                Lý do từ chối: {{ $doiTac->ly_do_tu_choi }}

            </div>

        </div>

        @endif

    </div>
    <div class="flex justify-between pt-4 border-t">

        <a href="{{ route('admin.doitac.index') }}"
            class="px-4 py-2 rounded-lg border border-slate-300 hover:bg-slate-50 text-slate-700 transition">

            Quay lại

        </a>

    </div>

</div>


{{-- ===================== MODAL TỪ CHỐI HỒ SƠ ===================== --}}
<div id="modalTuChoi" class="fixed inset-0 bg-black/40 hidden z-50 flex items-center justify-center p-4">

    <div class="bg-white rounded-xl w-full max-w-lg shadow-lg border border-slate-200">

        <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center">

            <h2 class="text-base font-bold text-slate-800">

                Từ chối hồ sơ

            </h2>

            <button type="button" onclick="document.getElementById('modalTuChoi').classList.add('hidden')"
                class="text-slate-400 hover:text-slate-600">

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>


        <form action="{{ route('admin.doitac.tuchoi', $doiTac->ma_khach_san) }}" method="POST">

            @csrf

            @method('PATCH')

            <div class="p-6">

                <label class="font-medium text-xs text-slate-700 block mb-2">

                    Lý do từ chối <span class="text-rose-500">*</span>

                </label>

                <textarea name="ly_do_tu_choi" rows="4"
                    class="w-full text-xs border border-slate-300 rounded-lg p-3 focus:outline-none focus:border-blue-500 resize-none"
                    placeholder="Nhập lý do từ chối..." required>{{ old('ly_do_tu_choi') }}</textarea>

                @error('ly_do_tu_choi')

                <div class="text-rose-500 text-xs mt-1">

                    {{ $message }}

                </div>

                @enderror

            </div>


            <div class="px-6 py-3 border-t border-slate-100 bg-slate-50 flex justify-end gap-3 rounded-b-xl">

                <button type="button" onclick="document.getElementById('modalTuChoi').classList.add('hidden')"
                    class="px-4 py-2 rounded-lg border border-slate-300 text-slate-700 text-xs font-medium hover:bg-white transition">

                    Hủy

                </button>

                <button type="submit"
                    class="px-4 py-2 rounded-lg bg-rose-600 text-white text-xs font-medium hover:bg-rose-700 transition">

                    Xác nhận từ chối

                </button>

            </div>

        </form>

    </div>

</div>


@endsection