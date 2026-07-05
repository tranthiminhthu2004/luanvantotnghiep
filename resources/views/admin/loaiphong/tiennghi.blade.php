@extends('admin.trangchinh.admin')

@section('title','Tiện nghi loại phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">

        <!-- Tiêu đề -->
        <div class="mb-6">

            <p class="text-3xl text-black mt-2 font-bold">

                {{ $loaiPhong->ten_loai_phong }}

            </p>

        </div>

        <form action="{{ route('admin.loaiphong.tiennghi.update',$loaiPhong->ma_loai_phong) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">

                @foreach($tienNghis as $tienNghi)

                <label
                    class="border rounded-xl p-4 cursor-pointer hover:bg-slate-50 transition flex items-center gap-3">

                    <input type="checkbox" name="tien_nghi[]" value="{{ $tienNghi->ma_tien_nghi }}"
                        class="w-5 h-5 accent-blue-600"
                        {{ $loaiPhong->tienNghis->contains('ma_tien_nghi',$tienNghi->ma_tien_nghi) ? 'checked' : '' }}>

                    <i class="fa-solid {{ $tienNghi->icon }} text-blue-600 text-lg"></i>

                    <span class="text-base font-medium text-black">

                        {{ $tienNghi->ten_tien_nghi }}

                    </span>

                </label>

                @endforeach

            </div>

            <div class="flex flex-wrap gap-3 mt-6">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full text-base font-semibold transition">

                    Lưu tiện nghi

                </button>

                <a href="{{ route('admin.loaiphong.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full text-base font-semibold transition">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection