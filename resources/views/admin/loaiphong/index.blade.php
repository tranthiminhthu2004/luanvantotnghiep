@extends('admin.trangchinh.admin')

@section('title','Quản lý loại phòng')

@section('content')

<div class="flex justify-end mb-6">

    <a href="{{ route('admin.loaiphong.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full flex items-center gap-2">

        <i class="fa-solid fa-plus"></i>

        Thêm loại phòng

    </a>

</div>

@include('admin.loaiphong.boloc')

@include('admin.loaiphong.bangloaiphong')

@endsection