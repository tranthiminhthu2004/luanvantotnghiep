@extends('admin.trangchinh.admin')

@section('title','Chi tiết hồ sơ đối tác')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex items-center justify-end">

        @if($doiTac->trang_thai_duyet=='ChoDuyet')

        <span class="px-4 py-2 rounded-xl bg-yellow-100 text-yellow-700 text-base font-semibold">

            <i class="fa-solid fa-clock mr-2"></i>

            Chờ duyệt

        </span>

        @elseif($doiTac->trang_thai_duyet=='DaDuyet')

        <span class="px-4 py-2 rounded-xl bg-green-100 text-green-700 text-sm font-semibold">

            <i class="fa-solid fa-circle-check mr-2"></i>

            Đã duyệt

        </span>

        @else

        <span class="px-4 py-2 rounded-xl bg-red-100 text-red-700 text-sm font-semibold">

            <i class="fa-solid fa-circle-xmark mr-2"></i>

            Từ chối

        </span>

        @endif

    </div>



    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

        {{-- =============================== --}}
        {{-- THÔNG TIN ĐỐI TÁC --}}
        {{-- =============================== --}}

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

            <div class="px-6 py-4 border-b">

                <h2 class="text-2xl font-bold text-[#061755] ">

                    Thông tin đối tác

                </h2>

            </div>

            <div class="p-6">

                <div class="grid grid-cols-[180px_1fr] gap-y-5">

                    <div class="text-gray-500">

                        Mã hồ sơ

                    </div>

                    <div class="font-semibold text-black">

                        {{ $doiTac->ma_khach_san }}

                    </div>



                    <div class="text-gray-500">

                        Họ và tên

                    </div>

                    <div class="font-semibold text-black">

                        {{ optional($doiTac->nguoiDung)->ho_va_ten_dem }}
                        {{ optional($doiTac->nguoiDung)->ten }}

                    </div>



                    <div class="text-gray-500">

                        Email

                    </div>

                    <div class="font-semibold text-black">

                        {{ optional($doiTac->nguoiDung)->email }}

                    </div>



                    <div class="text-gray-500">

                        Số điện thoại

                    </div>

                    <div class="font-semibold text-black">

                        {{ optional($doiTac->nguoiDung)->so_dien_thoai }}

                    </div>



                    <div class="text-gray-500">

                        Ngày gửi

                    </div>

                    <div class="font-semibold text-black">

                        {{ optional($doiTac->ngay_gui_duyet)->format('d/m/Y H:i') }}

                    </div>

                </div>

            </div>

        </div>
        {{-- =============================== --}}
        {{-- THÔNG TIN KHÁCH SẠN --}}
        {{-- =============================== --}}

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

            <div class="px-6 py-4 border-b">

                <h2 class="text-2xl font-bold text-[#061755]">

                    Thông tin khách sạn

                </h2>

            </div>

            <div class="p-6">

                <div class="grid grid-cols-[180px_1fr] gap-y-5">

                    {{-- Tên khách sạn --}}
                    <div class="text-gray-500">

                        Tên khách sạn

                    </div>

                    <div class="font-semibold text-black">

                        {{ $doiTac->ten_khach_san }}

                    </div>

                    {{-- Địa điểm --}}
                    <div class="text-gray-500">

                        Địa điểm

                    </div>

                    <div class="font-semibold text-black">

                        {{ optional($doiTac->diaDiem)->ten_dia_diem }}

                    </div>

                    {{-- Địa chỉ --}}
                    <div class="text-gray-500">

                        Địa chỉ

                    </div>

                    <div class="font-semibold text-black">

                        {{ $doiTac->dia_chi }}

                    </div>

                    {{-- Số sao --}}
                    <div class="text-gray-500">

                        Số sao

                    </div>

                    <div>

                        @for($i = 1; $i <= 5; $i++) @if($i <=$doiTac->so_sao_khach_san)

                            <i class="fa-solid fa-star text-yellow-400"></i>

                            @else

                            <i class="fa-regular fa-star text-gray-300"></i>

                            @endif

                            @endfor

                            <span class="ml-2 font-semibold">

                                {{ $doiTac->so_sao_khach_san }} sao

                            </span>

                    </div>

                    {{-- Check in --}}
                    <div class="text-gray-500">

                        Giờ Check-in

                    </div>

                    <div class="font-semibold text-black">

                        {{ $doiTac->gio_check_in }}

                    </div>

                    {{-- Check out --}}
                    <div class="text-gray-500">

                        Giờ Check-out

                    </div>

                    <div class="font-semibold text-black">

                        {{ $doiTac->gio_check_out }}

                    </div>

                    {{-- Hủy miễn phí --}}
                    <div class="text-gray-500">

                        Hủy miễn phí

                    </div>

                    <div class="font-semibold text-black">

                        {{ $doiTac->so_gio_huy_mien_phi }} giờ

                    </div>

                </div>

                {{-- Mô tả --}}
                <div class=" mt-2 pt-2">

                    <div class="font-semibold text-[#061755]">

                        Mô tả khách sạn

                    </div>

                    <div class="text-black leading-2">

                        {{ $doiTac->mo_ta }}

                    </div>

                </div>

            </div>

        </div>

    </div>
    {{-- ========================================================= --}}
    {{-- ALBUM ẢNH KHÁCH SẠN --}}
    {{-- ========================================================= --}}

    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-4 border-b flex items-center justify-between">

            <h2 class="text-lg font-bold text-[#061755] ">

                Album ảnh khách sạn

            </h2>

            <span class="text-sm text-gray-500">

                {{ $doiTac->hinhAnh->count() }} ảnh

            </span>

        </div>

        <div class="p-6">

            @if($doiTac->hinhAnh->count())

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">

                @foreach($doiTac->hinhAnh as $hinhAnh)

                <a href="{{ asset($hinhAnh->duong_dan_anh) }}" target="_blank"
                    class="overflow-hidden rounded-xl border hover:shadow transition">

                    <img src="{{ asset($hinhAnh->duong_dan_anh) }}" alt="Ảnh khách sạn"
                        class="w-full h-44 object-cover">

                </a>

                @endforeach

            </div>

            @else

            <div class="py-12 text-center text-gray-500">

                Chưa có hình ảnh khách sạn.

            </div>

            @endif

        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- LOẠI PHÒNG --}}
    {{-- ========================================================= --}}

    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-4 border-b">

            <h2 class="text-2xl font-bold text-[#061755]">

                Danh sách loại phòng

            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-4 py-4 text-left font-semibold">

                            Ảnh

                        </th>

                        <th class="px-4 py-4 text-left font-semibold">

                            Loại phòng

                        </th>

                        <th class="px-4 py-4 text-left font-semibold">

                            Giá cơ bản

                        </th>

                        <th class="px-4 py-4 text-center font-semibold">

                            Số người

                        </th>

                        <th class="px-4 py-4 text-center font-semibold">

                            Diện tích

                        </th>

                        <th class="px-4 py-4 text-center font-semibold">

                            Giường

                        </th>

                        <th class="px-4 py-4 text-center font-semibold">

                            Trạng thái

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($doiTac->loaiPhongs as $phong)

                    <tr class="border-t hover:bg-slate-50">

                        <td class="px-4 py-4">

                            @php
                            $anh = $phong->hinhAnh->first();
                            @endphp

                            @if($anh)

                            <img src="{{ asset($anh->duong_dan_anh) }}" alt="Ảnh loại phòng"
                                class="w-28 h-20 object-cover rounded-lg border">

                            @else

                            <div class="w-28 h-20 rounded-lg bg-gray-100 border flex items-center justify-center">

                                <i class="fa-regular fa-image text-gray-400"></i>

                            </div>

                            @endif

                        </td>

                        <td class="px-4 py-4 font-semibold">

                            {{ $phong->ten_loai_phong }}

                        </td>

                        <td class="px-4 py-4">

                            {{ number_format($phong->gia_co_ban,0,',','.') }} đ

                        </td>

                        <td class="px-4 py-4 text-center">

                            {{ $phong->so_nguoi_toi_da }}

                        </td>

                        <td class="px-4 py-4 text-center">

                            {{ $phong->dien_tich }} m²

                        </td>

                        <td class="px-4 py-4 text-center">

                            {{ $phong->so_giuong }}

                        </td>

                        <td class="px-4 py-4 text-center">

                            @if($phong->trang_thai)

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

                                Hoạt động

                            </span>

                            @else

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">

                                Tạm dừng

                            </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="py-12 text-center text-gray-500">

                            Chưa có loại phòng.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

        {{-- TIỆN NGHI KHÁCH SẠN --}}
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

            <div class="px-6 py-4 border-b">

                <h2 class="text-2xl font-bold text-[#061755]">

                    Tiện nghi khách sạn

                </h2>

            </div>

            <div class="p-6">

                @if($doiTac->tienNghis->count())

                <div class="flex flex-wrap gap-3">

                    @foreach($doiTac->tienNghis as $tienNghi)

                    <span class="px-3 py-2 rounded-xl bg-blue-50 text-blue-700 text-sm">

                        <i class="fa-solid fa-check mr-2"></i>

                        {{ $tienNghi->ten_tien_nghi }}

                    </span>

                    @endforeach

                </div>

                @else

                <div class="text-gray-500">

                    Chưa có tiện nghi khách sạn.

                </div>

                @endif

            </div>

        </div>



        {{-- TIỆN NGHI PHÒNG --}}
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

            <div class="px-6 py-4 border-b">

                <h2 class="text-2xl font-bold text-[#061755]">

                    Tiện nghi phòng

                </h2>

            </div>

            <div class="p-6 space-y-5">

                @forelse($doiTac->loaiPhongs as $phong)

                <div class="border rounded-xl p-4">

                    <div class="font-semibold text-[#061755] mb-3">

                        {{ $phong->ten_loai_phong }}

                    </div>

                    @if($phong->tienNghis->count())

                    <div class="flex flex-wrap gap-2">

                        @foreach($phong->tienNghis as $tienNghi)

                        <span class="px-3 py-1 rounded-full bg-green-50 text-green-700 text-sm">

                            {{ $tienNghi->ten_tien_nghi }}

                        </span>

                        @endforeach

                    </div>

                    @else

                    <div class="text-sm text-gray-500">

                        Chưa có tiện nghi.

                    </div>

                    @endif

                </div>

                @empty

                <div class="text-gray-500">

                    Chưa có loại phòng.

                </div>

                @endforelse

            </div>

        </div>

    </div>

    <div>

        @if($doiTac->trang_thai_duyet == 'ChoDuyet')

        <div class="flex justify-center gap-10">

            <form action="{{ route('admin.doitac.duyet',$doiTac->ma_khach_san) }}" method="POST"
                onsubmit="return confirm('Bạn có chắc muốn duyệt hồ sơ này?');">

                @csrf
                @method('PATCH')

                <button type="submit"
                    class="px-8 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold transition">

                    <i class="fa-solid fa-circle-check mr-2"></i>

                    Duyệt hồ sơ

                </button>

            </form>

            <button type="button" onclick="document.getElementById('modalTuChoi').classList.remove('hidden')"
                class="px-8 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold">

                <i class="fa-solid fa-circle-xmark mr-2"></i>

                Từ chối hồ sơ

            </button>
        </div>

        @elseif($doiTac->trang_thai_duyet == 'DaDuyet')

        <div class="rounded-xl p-5">

            <div class="flex items-center gap-2 text-green-700 font-semibold">

                <i class="fa-solid fa-circle-check"></i>

                Hồ sơ đã được duyệt

            </div>

            @if($doiTac->ngay_duyet)

            <div class="mt-2 text-sm text-gray-600">

                Thời gian duyệt:
                {{ \Carbon\Carbon::parse($doiTac->ngay_duyet)->format('d/m/Y H:i') }}

            </div>

            @endif

        </div>

        @elseif($doiTac->trang_thai_duyet == 'TuChoi')

        <div class="rounded-xl border border-red-200 bg-red-50 p-5">

            <div class="font-semibold text-red-700 mb-3">

                Lý do từ chối

            </div>

            <div class="text-gray-700 whitespace-pre-line">

                {{ $doiTac->ly_do_tu_choi }}

            </div>

        </div>

        @endif

    </div>

</div>

<div id="modalTuChoi" class="fixed inset-0 bg-black/40 hidden z-50 flex items-center justify-center">

    <div class="bg-white rounded-2xl w-full max-w-lg">

        <div class="px-6 py-4 border-b">

            <h2 class="text-lg font-bold">

                Từ chối hồ sơ

            </h2>

        </div>

        <form action="{{ route('admin.doitac.tuchoi',$doiTac->ma_khach_san) }}" method="POST">

            @csrf
            @method('PATCH')

            <div class="p-6">

                <label class="font-medium">

                    Lý do từ chối

                </label>

                <textarea name="ly_do_tu_choi" rows="5" class="w-full mt-2 border rounded-xl p-3 resize-none"
                    placeholder="Nhập lý do từ chối..." required>{{ old('ly_do_tu_choi') }}</textarea>

                @error('ly_do_tu_choi')

                <div class="text-red-500 text-sm mt-2">

                    {{ $message }}

                </div>

                @enderror

            </div>

            <div class="px-6 py-4 border-t flex justify-end gap-3">

                <button type="button" onclick="document.getElementById('modalTuChoi').classList.add('hidden')"
                    class="px-6 py-2 rounded-xl border">

                    Hủy

                </button>

                <button type="submit" class="px-6 py-2 rounded-xl bg-red-600 text-white hover:bg-red-700">

                    Xác nhận từ chối

                </button>

            </div>

        </form>

    </div>

</div>

@endsection