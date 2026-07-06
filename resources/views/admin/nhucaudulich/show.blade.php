@extends('admin.trangchinh.admin')

@section('title','Chi tiết nhu cầu du lịch')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-5 md:p-8">

        <!-- Tiêu đề -->
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-[#061755]">

                {{ $nhuCau->ten_nhu_cau }}

            </h2>

        </div>

        <!-- Thông tin -->
        <div class="bg-slate-50 border rounded-2xl p-6 mb-10">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <p class="text-sm text-gray-500 mb-1">

                        Mã nhu cầu

                    </p>

                    <p class="text-base font-semibold text-black">

                        {{ $nhuCau->ma_nhu_cau }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500 mb-1">

                        Địa điểm đang sử dụng

                    </p>

                    <p class="text-base font-bold text-[#061755]">

                        {{ $nhuCau->dia_diems_count }}

                    </p>

                </div>

            </div>

        </div>

        <!-- Nội dung -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">

            <!-- Mô tả -->
            <div>

                <h3 class="text-2xl font-bold text-[#061755] mb-4">

                    Mô tả

                </h3>

                <div class="bg-slate-50 border rounded-2xl p-6 min-h-[180px]">

                    @if($nhuCau->mo_ta)

                    <p class="text-base text-black leading-8">

                        {{ $nhuCau->mo_ta }}

                    </p>

                    @else

                    <div class="h-full flex items-center justify-center text-gray-500 text-base">

                        Chưa có mô tả.

                    </div>

                    @endif

                </div>

            </div>

            <!-- Danh sách địa điểm -->
            <div>

                <h3 class="text-2xl font-bold text-[#061755] mb-4">

                    Địa điểm sử dụng

                </h3>

                <div class="bg-slate-50 border rounded-2xl p-6 min-h-[180px]">

                    @if($nhuCau->diaDiems->count())

                    <div class="space-y-3">

                        @foreach($nhuCau->diaDiems as $diaDiem)

                        <div class="bg-white border rounded-xl px-4 py-3">

                            <div class="flex items-center justify-between">

                                <div>

                                    <p class="font-semibold text-black">

                                        {{ $diaDiem->ten_dia_diem }}

                                    </p>

                                    <p class="text-sm text-gray-500 mt-1">

                                        Mã địa điểm:
                                        {{ $diaDiem->ma_dia_diem }}

                                    </p>

                                </div>

                            </div>

                        </div>

                        @endforeach

                    </div>

                    @else

                    <div class="h-full flex items-center justify-center text-gray-500 text-base">

                        Chưa có địa điểm nào sử dụng nhu cầu này.

                    </div>

                    @endif

                </div>

            </div>

        </div>

        <!-- Quay lại -->
        <div class="mt-20">

            <a href="{{ route('admin.nhucaudulich.index') }}"
                class="inline-flex items-center gap-2 bg-slate-200 hover:bg-slate-300 text-black px-8 py-3 rounded-full font-semibold transition">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection