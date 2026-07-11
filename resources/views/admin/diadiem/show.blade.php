@extends('admin.trangchinh.admin')

@section('title','Chi tiết địa điểm')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <!-- Tiêu đề -->
        <div class="mb-8">

            <h2 class="text-4xl font-bold text-[#061755]">

                {{ $diaDiem->ten_dia_diem }}

            </h2>

        </div>

        <!-- Nội dung -->
        <div class="grid grid-cols-1 gap-8">

            <!-- Mã địa điểm -->
            <div>

                <p class="text-sm text-gray-500">

                    Mã địa điểm

                </p>

                <p class="text-lg font-semibold text-black mt-1">

                    {{ $diaDiem->ma_dia_diem }}

                </p>

            </div>

            <!-- Tên địa điểm -->
            <div>

                <p class="text-sm text-gray-500">

                    Tên địa điểm

                </p>

                <p class="text-lg font-semibold text-black mt-1">

                    {{ $diaDiem->ten_dia_diem }}

                </p>

            </div>

            <!-- Mô tả -->
            <div>

                <p class="text-sm text-gray-500">

                    Mô tả

                </p>

                <div class="mt-2 border rounded-2xl p-5 bg-slate-50 leading-8 text-slate-700 whitespace-pre-line">

                    {{ $diaDiem->mo_ta }}

                </div>

            </div>

        </div>

        <!-- Nút -->
        <div class="mt-8">

            <a href="{{ route('admin.diadiem.index') }}"
                class="inline-flex items-center bg-slate-200 hover:bg-slate-300 px-5 py-2.5 rounded-full text-sm font-semibold transition">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection