@extends('admin.trangchinh.admin')

@section('title','Quản lý phòng')

@section('content')

<!-- Thống kê -->
@include('admin.phong.thongke')

<!-- Nút thêm -->
<div class="flex justify-end mb-4 md:mb-6">

    <a href="{{ route('admin.phong.create') }}"
        class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm md:text-base font-semibold px-5 py-2.5 rounded-full transition">

        <i class="fa-solid fa-plus"></i>

        Thêm phòng

    </a>

</div>

<!-- Bộ lọc -->
@include('admin.phong.boloc')

<!-- Bảng dữ liệu -->
@include('admin.phong.bangphong')

@endsection