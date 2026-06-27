@extends('admin.trangchinh.admin')

@section('title','Quản lý đặt phòng')

@section('content')

@include('admin.datphong.thongke')

<div class="flex justify-end mb-6">

    <a href="{{ route('admin.datphong.create') }}" class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700
               text-white text-sm font-semibold px-5 py-2.5 rounded-full transition">

        <i class="fa-solid fa-plus"></i>

        Thêm đơn đặt phòng

    </a>

</div>

@include('admin.datphong.boloc')

@include('admin.datphong.bangdatphong')

@endsection