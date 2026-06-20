@extends('admin.trangchinh.admin')

@section('title','Quản lý đặt phòng')

@section('content')

@include('admin.datphong.thongke')

<div class="flex justify-end mb-6">

    <a href="{{ route('admin.datphong.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full flex items-center gap-2">

        <i class="fa-solid fa-plus"></i>

        Thêm đơn đặt phòng

    </a>

</div>

@include('admin.datphong.boloc')

@include('admin.datphong.bangdatphong')

@endsection