@extends('admin.trangchinh.admin')

@section('title','Chi tiết tiện nghi')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <h2 class="text-4xl font-bold text-[#061755] mb-8">

            {{ $tienNghi->ten_tien_nghi }}

        </h2>

        <div class="grid md:grid-cols-2 gap-8">

            <div class="space-y-4 text-lg">

                <p>

                    <strong>ID:</strong>

                    {{ $tienNghi->ma_tien_nghi }}

                </p>

                <p>

                    <strong>Tên tiện nghi:</strong>

                    {{ $tienNghi->ten_tien_nghi }}

                </p>

                <p>

                    <strong>Icon:</strong>

                    <i class="fa-solid {{ $tienNghi->icon }} text-blue-600 ml-2"></i>

                    <span class="ml-2">

                        {{ $tienNghi->icon }}

                    </span>

                </p>

                <p>

                    <strong>Trạng thái:</strong>

                    @if($tienNghi->trang_thai)

                    <span class="text-green-600 font-medium">

                        Hoạt động

                    </span>

                    @else

                    <span class="text-red-600 font-medium">

                        Tạm dừng

                    </span>

                    @endif

                </p>

                <p>

                    <strong>Mô tả:</strong>

                    {{ $tienNghi->mo_ta ?: 'Chưa có mô tả' }}

                </p>

            </div>

        </div>

        <div class="mt-8 flex gap-4">

            <a href="{{ route('admin.tiennghi.index') }}" class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection