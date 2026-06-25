@extends('admin.trangchinh.admin')

@section('title','Tiện nghi khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">

        <h2 class="text-2xl md:text-3xl font-bold text-[#061755] mb-2">

            Tiện nghi khách sạn

        </h2>

        <p class="text-black text-sm mb-6">

            {{ $khachSan->ten_khach_san }}

        </p>

        <form action="{{ route('admin.khachsan.tiennghi.update',$khachSan->ma_khach_san) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">

                @foreach($tienNghis as $tienNghi)

                <label class="border rounded-xl p-3 cursor-pointer hover:bg-slate-50 transition">

                    <div class="flex items-center gap-3">

                        <input type="checkbox" name="tien_nghi[]" value="{{ $tienNghi->ma_tien_nghi }}" {{ $khachSan->tienNghis->contains(
                            'ma_tien_nghi',
                            $tienNghi->ma_tien_nghi
                        ) ? 'checked' : '' }}>

                        <i class="fa-solid {{ $tienNghi->icon }} text-blue-600"></i>

                        <span class="text-sm text-black">

                            {{ $tienNghi->ten_tien_nghi }}

                        </span>

                    </div>

                </label>

                @endforeach

            </div>

            <div class="mt-6 flex flex-wrap gap-3">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full text-sm font-semibold transition">

                    Lưu tiện nghi

                </button>

                <a href="{{ route('admin.khachsan.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full text-sm font-semibold transition">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection