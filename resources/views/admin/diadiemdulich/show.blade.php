@extends('admin.trangchinh.admin')

@section('title','Chi tiết địa điểm du lịch')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-6">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 pt-3">

            <!-- CỘT TRÁI -->
            <div>

                <!-- Ảnh -->
                @if($diaDiemDuLich->hinhAnhs->count())

                <img src="{{ asset($diaDiemDuLich->hinhAnhs->first()->duong_dan_anh) }}"
                    class="w-full h-[360px] object-cover rounded-2xl border">

                @else

                <div
                    class="w-full h-[360px] rounded-2xl border-2 border-dashed border-gray-300 flex flex-col items-center justify-center">

                    <i class="fa-solid fa-image text-6xl text-gray-300 mb-4"></i>

                    <span class="text-gray-500">

                        Chưa có hình ảnh

                    </span>

                </div>

                @endif

                <!-- Thông tin -->
                <div class="mt-6 space-y-5">

                    <div>

                        <p class="text-base tracking-wide text-gray-500">

                            Mã địa điểm du lịch

                        </p>

                        <p class="text-lg font-semibold text-black">

                            {{ $diaDiemDuLich->ma_dia_diem_du_lich }}

                        </p>

                    </div>

                    <div>

                        <p class="text-base tracking-wide text-gray-500">

                            Tên địa điểm du lịch

                        </p>

                        <p class="text-lg font-semibold text-black">

                            {{ $diaDiemDuLich->ten_dia_diem }}

                        </p>

                    </div>

                    <div>

                        <p class="text-base tracking-wide text-gray-500">

                            Địa điểm

                        </p>

                        <p class="text-black">

                            {{ $diaDiemDuLich->diaDiem->ten_dia_diem }}

                        </p>

                    </div>

                    <div>

                        <p class="text-base tracking-wide text-gray-500">

                            Địa chỉ

                        </p>

                        <p class="text-black leading-7">

                            {{ $diaDiemDuLich->dia_chi ?? '-' }}

                        </p>

                    </div>

                    <div class="grid grid-cols-2 gap-6">

                        <div>

                            <p class="text-base tracking-wide text-gray-500">

                                Vĩ độ

                            </p>

                            <p class="text-black">

                                {{ $diaDiemDuLich->vi_do ?? '-' }}

                            </p>

                        </div>

                        <div>

                            <p class="text-base tracking-wide text-gray-500">

                                Kinh độ

                            </p>

                            <p class="text-black">

                                {{ $diaDiemDuLich->kinh_do ?? '-' }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- CỘT PHẢI -->
            <div>

                <h3 class="text-xl font-bold text-[#061755] mb-4">

                    Mô tả

                </h3>

                <div class="border rounded-2xl bg-slate-50 p-5 h-[690px] overflow-y-scroll leading-7 text-black">

                    {!! nl2br(e($diaDiemDuLich->mo_ta ?? 'Chưa có mô tả.')) !!}

                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="flex flex-wrap gap-3 mt-8 pt-6 border-t">
            <a href="{{ route('admin.diadiemdulich.index') }}"
                class="bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full font-semibold transition">

                Quay lại

            </a>

        </div>

    </div>

</div>

@endsection