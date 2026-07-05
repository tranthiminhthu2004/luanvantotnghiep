@extends('admin.trangchinh.admin')

@section('title','Quản lý loại phòng')

@section('content')

<div class="space-y-6">

    <!-- Nút thêm -->
    <div class="flex justify-end">

        <a href="{{ route('admin.loaiphong.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 md:px-5 py-2.5 rounded-full text-base font-semibold flex items-center gap-2 transition">

            <i class="fa-solid fa-plus"></i>

            <span class="hidden sm:inline">
                Thêm loại phòng
            </span>

        </a>

    </div>

    <!-- Bộ lọc -->
    @include('admin.loaiphong.boloc')

    <!-- Bảng -->
    @include('admin.loaiphong.bangloaiphong')

</div>

@endsection