@extends('admin.trangchinh.admin')

@section('title','Chi tiết tiện nghi')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-5 md:p-8">

        <!-- Tiêu đề -->
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-[#061755]">

                {{ $tienNghi->ten_tien_nghi }}

            </h2>

        </div>

        <!-- Icon + Thông tin -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">

            <!-- Icon -->
            <div class="flex items-center justify-center">

                <div class="w-72 h-72 rounded-2xl bg-slate-100 flex items-center justify-center shadow-sm">

                    <i class="fa-solid {{ $tienNghi->icon }} text-8xl text-blue-600"></i>

                </div>

            </div>

            <!-- Thông tin -->
            <div class="space-y-4">

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Mã tiện nghi

                    </span>

                    <span class="text-base text-black">

                        {{ $tienNghi->ma_tien_nghi }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Tên tiện nghi

                    </span>

                    <span class="text-base text-black">

                        {{ $tienNghi->ten_tien_nghi }}

                    </span>

                </div>

                <div class="flex justify-between items-center border-b pb-3">

                    <span class="font-semibold text-black text-base">

                        Icon

                    </span>

                    <span class="text-base text-black">

                        {{ $tienNghi->icon }}

                    </span>

                </div>

                <div class="flex justify-between items-center">

                    <span class="font-semibold text-black text-base">

                        Trạng thái

                    </span>

                    @if($tienNghi->trang_thai)

                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                        Hoạt động

                    </span>

                    @else

                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

                        Tạm dừng

                    </span>

                    @endif

                </div>

            </div>

        </div>

        <!-- Mô tả + Xem trước icon -->
        <div class="mt-10 grid grid-cols-1 xl:grid-cols-2 gap-8">

            <!-- Mô tả -->
            <div>

                <h3 class="text-2xl font-bold text-[#061755] mb-4">

                    Mô tả

                </h3>

                <div class="bg-slate-50 border rounded-2xl p-6 h-full">

                    @if($tienNghi->mo_ta)

                    <p class="text-base text-black leading-8">

                        {{ $tienNghi->mo_ta }}

                    </p>

                    @else

                    <p class="text-gray-500 text-base">

                        Chưa có mô tả.

                    </p>

                    @endif

                </div>

            </div>

        </div>

        <!-- Quay lại -->
        <div class="mt-20">

            <a href="{{ route('admin.tiennghi.index') }}"
                class="inline-flex items-center gap-2 bg-slate-200 hover:bg-slate-300 text-black px-8 py-3 rounded-full font-semibold transition">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection