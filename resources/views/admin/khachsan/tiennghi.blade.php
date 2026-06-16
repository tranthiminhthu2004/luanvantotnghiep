@extends('admin.trangchinh.admin')

@section('title','Tiện nghi khách sạn')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <h2 class="text-3xl font-bold text-[#061755] mb-2">

            Tiện nghi khách sạn

        </h2>

        <p class="text-gray-500 mb-8">

            {{ $khachSan->ten_khach_san }}

        </p>

        <form action="{{ route('admin.khachsan.tiennghi.update',$khachSan->ma_khach_san) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">

                @foreach($tienNghis as $tienNghi)

                <label class="border rounded-2xl p-4 cursor-pointer hover:bg-slate-50">

                    <div class="flex items-center gap-3">

                        <input type="checkbox" name="tien_nghi[]" value="{{ $tienNghi->ma_tien_nghi }}" {{ $khachSan->tienNghis->contains(
                                'ma_tien_nghi',
                                $tienNghi->ma_tien_nghi
                            ) ? 'checked' : '' }}>

                        <i class="fa-solid {{ $tienNghi->icon }}"></i>

                        <span>

                            {{ $tienNghi->ten_tien_nghi }}

                        </span>

                    </div>

                </label>

                @endforeach

            </div>

            <div class="mt-8 flex gap-4">

                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl">

                    Lưu tiện nghi

                </button>

                <a href="{{ route('admin.khachsan.index') }}" class="bg-slate-200 px-6 py-3 rounded-xl">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection