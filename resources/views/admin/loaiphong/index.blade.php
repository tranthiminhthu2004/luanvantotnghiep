@extends('admin.trangchinh.admin')

@section('title','Quản lý loại phòng')

@section('content')

   @include('admin.loaiphong.thongke')
    <!-- Bộ lọc -->
    @include('admin.loaiphong.boloc')

    <!-- Bảng -->
    @include('admin.loaiphong.bangloaiphong')

</div>

@endsection