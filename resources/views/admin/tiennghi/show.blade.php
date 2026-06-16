@extends('admin.trangchinh.admin')

@section('title','Chi tiết tiện nghi')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-8">

        <div class="flex items-center gap-6 mb-8">

            <div class="w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center">

                <i class="{{ $tienNghi->icon }} text-5xl"></i>

            </div>

            <div>

                <h2 class="text-4xl font-bold text-[#061755]">

                    {{ $tienNghi->ten_tien_nghi }}

                </h2>

                <div class="mt-3">

                    @if($tienNghi->trang_thai)

                    <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full">

                        Hoạt động

                    </span>

                    @else

                    <span class="bg-red-100 text-red-600 px-4 py-2 rounded-full">

                        Tạm dừng

                    </span>

                    @endif

                </div>

            </div>

        </div>

        <div class="border-t pt-6">

            <h3 class="font-bold text-xl mb-3">

                Mô tả

            </h3>

            <p class="text-slate-600">

                {{ $tienNghi->mo_ta ?: 'Chưa có mô tả' }}

            </p>

        </div>

        <div class="mt-8">

            <a href="{{ route('admin.tiennghi.edit',$tienNghi->ma_tien_nghi) }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl">

                Chỉnh sửa

            </a>

            <a href="{{ route('admin.tiennghi.index') }}"
                class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl ml-3">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection