@extends('admin.trangchinh.admin')

@section('title','Thêm người dùng')

@section('content')

<form action="{{ route('admin.nguoidung.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    @include('admin.nguoidung.form')

</form>

@endsection