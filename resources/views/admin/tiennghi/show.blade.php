@extends('admin.trangchinh.admin')

@section('title','Chi tiết tiện nghi')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-5 md:p-6">

        <!-- Tiêu đề -->
        <div class="mb-6">

            <h2 class="text-2xl md:text-3xl font-bold text-[#061755]">

                {{ $tienNghi->ten_tien_nghi }}

            </h2>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Icon -->
            <div class="flex items-center justify-center">

                <div class="w-44 h-44 rounded-3xl bg-slate-100 flex items-center justify-center shadow-inner">

                    <i class="fa-solid {{ $tienNghi->icon }} text-7xl text-blue-600"></i>

                </div>

            </div>

            <!-- Thông tin -->
            <div class="space-y-5">

                <div>

                    <p class="text-sm text-gray-500">

                        Mã tiện nghi

                    </p>

                    <p class="text-base font-semibold text-black">

                        {{ $tienNghi->ma_tien_nghi }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Tên tiện nghi

                    </p>

                    <p class="text-base font-semibold text-black">

                        {{ $tienNghi->ten_tien_nghi }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Tên icon

                    </p>

                    <p class="text-base font-medium text-black">

                        {{ $tienNghi->icon }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500 mb-2">

                        Trạng thái

                    </p>

                    @if($tienNghi->trang_thai)

                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">

                        Hoạt động

                    </span>

                    @else

                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">

                        Tạm dừng

                    </span>

                    @endif

                </div>

            </div>

        </div>

        <!-- Mô tả -->
        <div class="mt-8">

            <h3 class="text-xl font-bold text-black mb-3">

                Mô tả

            </h3>

            <div class="bg-slate-50 rounded-2xl p-5">

                <p class="text-gray-600 leading-7">

                    {{ $tienNghi->mo_ta ?: 'Chưa có mô tả.' }}

                </p>

            </div>

        </div>

        <!-- Button -->
        <div class="mt-8">

            <a href="{{ route('admin.tiennghi.index') }}"
                class="inline-flex items-center bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full text-sm font-semibold transition">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection