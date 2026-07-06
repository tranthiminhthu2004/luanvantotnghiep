@extends('admin.trangchinh.admin')

@section('title','Quản lý dữ liệu gợi ý điểm đến')

@section('content')
<div class="flex justify-end mb-6">

    <a href="{{ route('admin.diadiemnhucau.create') }}"
        class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full font-semibold transition">

        <i class="fa-solid fa-plus"></i>

        Thêm dữ liệu

    </a>

</div>
@include('admin.diadiemnhucau.boloc')

@include('admin.diadiemnhucau.bangdiadiemnhucau')

@endsection