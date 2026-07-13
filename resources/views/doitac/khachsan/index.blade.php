@extends('doitac.trangchinh.partner')

@section('title','Khách sạn của tôi')

@section('content')

<div class="space-y-6">

    @include('doitac.khachsan.thongke')

    <div class="flex justify-end">

        <a href="{{ route('doitac.khachsan.create.form1') }}"
            class="inline-flex items-center gap-2 bg-[#1040C5] hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition">

            <i class="fa-solid fa-plus"></i>

            Đăng ký khách sạn

        </a>

    </div>


    @include('doitac.khachsan.danhsach')

</div>

@endsection