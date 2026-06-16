@extends('admin.trangchinh.admin')

@section('title','Thêm địa điểm')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <h2 class="text-4xl font-bold text-[#061755] mb-8">

            Thêm địa điểm mới

        </h2>

        @if ($errors->any())

        <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded-xl">

            <ul class="list-disc pl-5">

                @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

        @endif

        <form action="{{ route('admin.diadiem.store') }}" method="POST">

            @csrf

            <div>

                <label class="font-medium text-slate-700">

                    Tên địa điểm

                </label>

                <input type="text" name="ten_dia_diem" value="{{ old('ten_dia_diem') }}" placeholder="Ví dụ: Đà Nẵng"
                    class="w-full mt-2 border rounded-full px-5 py-3">

            </div>

            <div class="flex gap-4 mt-8">

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                    Lưu địa điểm

                </button>

                <a href="{{ route('admin.diadiem.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection