@extends('admin.trangchinh.admin')

@section('title','Cập nhật địa điểm')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <h2 class="text-4xl font-bold text-[#061755] mb-8">

            Cập nhật địa điểm

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

        <form action="{{ route('admin.diadiem.update',$diaDiem->ma_dia_diem) }}" method="POST">

            @csrf
            @method('PUT')

            <div>

                <label class="font-medium text-slate-700">

                    Tên địa điểm

                </label>

                <input type="text" name="ten_dia_diem" value="{{ old('ten_dia_diem',$diaDiem->ten_dia_diem) }}"
                    class="w-full mt-2 border rounded-full px-5 py-3">

            </div>

            <div class="flex gap-4 mt-8">

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                    Cập nhật

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