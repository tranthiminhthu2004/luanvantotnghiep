@extends('admin.trangchinh.admin')

@section('title', 'Chi tiết nhu cầu du lịch')

@section('content')

<div class="max-w-5xl mx-auto">

    <!-- Tiêu đề -->
    <div class="flex items-center justify-between mb-6">

        <div>

            <h1 class="text-3xl font-bold text-[#061755]">

                Chi tiết nhu cầu du lịch

            </h1>

            <p class="text-gray-500 mt-1">

                Thông tin chi tiết về nhu cầu du lịch.

            </p>

        </div>

        <div class="flex gap-3">

            <a href="{{ route('admin.nhucaudulich.index') }}"
                class="px-6 py-3 rounded-full border hover:bg-gray-100 transition">

                Quay lại

            </a>

            <a href="{{ route('admin.nhucaudulich.edit',$nhuCau->ma_nhu_cau) }}"
                class="px-6 py-3 rounded-full bg-yellow-500 hover:bg-yellow-600 text-white transition">

                <i class="fa-solid fa-pen mr-2"></i>

                Chỉnh sửa

            </a>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow overflow-hidden">

        <!-- Header -->
        <div class="bg-blue-50 px-8 py-6 border-b">

            <div class="flex items-center gap-5">

                <div class="w-16 h-16 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center">

                    <i class="fa-solid fa-heart text-3xl"></i>

                </div>

                <div>

                    <h2 class="text-2xl font-bold text-[#061755]">

                        {{ $nhuCau->ten_nhu_cau }}

                    </h2>

                    <p class="text-gray-500 mt-1">

                        Mã nhu cầu:
                        <span class="font-semibold">

                            {{ $nhuCau->ma_nhu_cau }}

                        </span>

                    </p>

                </div>

            </div>

        </div>

        <!-- Nội dung -->
        <div class="p-8 space-y-8">

            <!-- Mô tả -->
            <div>

                <h3 class="font-semibold text-lg mb-3">

                    Mô tả

                </h3>

                <div class="border rounded-2xl p-5 bg-slate-50 leading-8 text-gray-700">

                    {{ $nhuCau->mo_ta ?: 'Chưa có mô tả.' }}

                </div>

            </div>

            <!-- Thống kê -->
            <div>

                <h3 class="font-semibold text-lg mb-3">

                    Thống kê

                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    <div class="bg-blue-50 rounded-2xl p-6 text-center">

                        <i class="fa-solid fa-location-dot text-blue-600 text-3xl mb-3"></i>

                        <p class="text-gray-500">

                            Địa điểm đang sử dụng

                        </p>

                        <h2 class="text-3xl font-bold text-[#061755] mt-2">

                            {{ $nhuCau->dia_diems_count }}

                        </h2>

                    </div>

                </div>

            </div>

            <!-- Danh sách địa điểm -->
            <div>

                <h3 class="font-semibold text-lg mb-3">

                    Danh sách địa điểm sử dụng nhu cầu này

                </h3>

                @if($nhuCau->diaDiems->count())

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    @foreach($nhuCau->diaDiems as $diaDiem)

                    <div class="border rounded-2xl p-4 flex items-center gap-3">

                        <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">

                            <i class="fa-solid fa-map-location-dot"></i>

                        </div>

                        <div>

                            <h4 class="font-semibold">

                                {{ $diaDiem->ten_dia_diem }}

                            </h4>

                            <p class="text-sm text-gray-500">

                                Mã địa điểm:
                                {{ $diaDiem->ma_dia_diem }}

                            </p>

                        </div>

                    </div>

                    @endforeach

                </div>

                @else

                <div class="border rounded-2xl p-6 text-center text-gray-500">

                    Chưa có địa điểm nào được gán nhu cầu này.

                </div>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection