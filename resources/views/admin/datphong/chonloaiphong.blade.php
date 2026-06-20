@extends('admin.trangchinh.admin')

@section('title','Chọn loại phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="mb-6">

        <h2 class="text-4xl font-bold text-[#061755]">

            Chọn loại phòng

        </h2>

        <p class="text-gray-500 mt-2">

            Các loại phòng còn trống trong khoảng thời gian đã chọn

        </p>

    </div>

    <form action="{{ route('admin.datphong.store') }}" method="POST">

        @csrf

        {{-- Giữ dữ liệu từ form trước --}}
        @foreach($duLieuDatPhong as $key => $value)

        @if(!is_array($value))
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endif

        @endforeach

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-50">

                        <tr class="text-left">

                            <th class="px-6 py-4 text-lg">
                                Chọn
                            </th>

                            <th class="px-6 py-4 text-lg">
                                ID
                            </th>

                            <th class="px-6 py-4 text-lg">
                                Loại phòng
                            </th>

                            <th class="px-6 py-4 text-lg">
                                Số người tối đa
                            </th>

                            <th class="px-6 py-4 text-lg">
                                Giá cơ bản
                            </th>

                            <th class="px-6 py-4 text-lg">
                                Còn trống
                            </th>

                            <th class="px-6 py-4 text-lg">
                                Số lượng đặt
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($ketQua as $item)

                        <tr class="border-t hover:bg-slate-50">

                            <!-- Chọn -->
                            <td class="px-6 py-4">

                                <input type="checkbox" name="loai_phong[]"
                                    value="{{ $item['loaiPhong']->ma_loai_phong }}">

                            </td>

                            <!-- ID -->
                            <td class="px-6 py-4">

                                {{ $item['loaiPhong']->ma_loai_phong }}

                            </td>

                            <!-- Loại phòng -->
                            <td class="px-6 py-4 font-medium">

                                {{ $item['loaiPhong']->ten_loai_phong }}

                            </td>

                            <!-- Số người -->
                            <td class="px-6 py-4">

                                {{ $item['loaiPhong']->so_nguoi_toi_da }}

                            </td>

                            <!-- Giá -->
                            <td class="px-6 py-4 font-bold text-blue-600">

                                {{ number_format($item['loaiPhong']->gia_co_ban,0,',','.') }}đ

                            </td>

                            <!-- Còn trống -->
                            <td class="px-6 py-4">

                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full">

                                    {{ $item['soPhongConLai'] }} phòng

                                </span>

                            </td>

                            <!-- Số lượng -->
                            <td class="px-6 py-4">

                                <input type="number" name="so_luong[{{ $item['loaiPhong']->ma_loai_phong }}]" min="1"
                                    max="{{ $item['soPhongConLai'] }}" value="1"
                                    class="border rounded-xl px-4 py-2 w-24">

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7" class="text-center py-10 text-gray-500">

                                Không còn loại phòng nào trống

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="mt-6 flex gap-4">

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                Tạo đơn đặt phòng

            </button>

            <a href="{{ route('admin.datphong.create') }}" class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl">

                Quay lại

            </a>

        </div>

    </form>

</div>

@endsection