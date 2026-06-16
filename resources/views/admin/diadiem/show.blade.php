@extends('admin.trangchinh.admin')

@section('title','Chi tiết địa điểm')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <h2 class="text-4xl font-bold text-[#061755] mb-8">

            {{ $diaDiem->ten_dia_diem }}

        </h2>

        <div class="bg-slate-50 rounded-3xl p-6">

            <p class="text-lg">

                <strong>Mã địa điểm:</strong>

                {{ $diaDiem->ma_dia_diem }}

            </p>

            <p class="text-lg mt-4">

                <strong>Tên địa điểm:</strong>

                {{ $diaDiem->ten_dia_diem }}

            </p>

        </div>

        <div class="mt-8">

            <a href="{{ route('admin.diadiem.index') }}" class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection