@extends('admin.trangchinh.admin')

@section('title', 'Dashboard')

@section('content')

{{-- ========================================================= --}}
{{-- THỐNG KÊ TỔNG QUAN --}}
{{-- ========================================================= --}}

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">

   {{-- Tổng khách sạn --}}
<div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">

    <div class="flex items-center gap-3">

        <div class="w-11 h-11 rounded-full bg-blue-100 flex items-center justify-center">

            <i class="fa-solid fa-hotel text-blue-600 text-lg"></i>

        </div>

        <div>

            <p class="text-base text-black">
                Tổng số khách sạn
            </p>

            <h3 class="text-2xl font-bold text-[#061755]">
                {{ $tongKhachSan }}
            </h3>

        </div>

    </div>

</div>


{{-- Tổng người dùng --}}
<div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">

    <div class="flex items-center gap-3">

        <div class="w-11 h-11 rounded-full bg-green-100 flex items-center justify-center">

            <i class="fa-solid fa-users text-green-600 text-lg"></i>

        </div>

        <div>

            <p class="text-base text-black">
                Tổng số người dùng
            </p>

            <h3 class="text-2xl font-bold text-[#061755]">
                {{ $tongNguoiDung }}
            </h3>

        </div>

    </div>

</div>


{{-- Tổng đặt phòng --}}
<div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">

    <div class="flex items-center gap-3">

        <div class="w-11 h-11 rounded-full bg-orange-100 flex items-center justify-center">

            <i class="fa-solid fa-calendar-check text-orange-500 text-lg"></i>

        </div>

        <div>

            <p class="text-base text-black">
                Tổng số đặt phòng
            </p>

            <h3 class="text-2xl font-bold text-[#061755]">
                {{ $tongDatPhong }}
            </h3>

        </div>

    </div>

</div>


{{-- Tổng đối tác --}}
<div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">

    <div class="flex items-center gap-3">

        <div class="w-11 h-11 rounded-full bg-purple-100 flex items-center justify-center">

            <i class="fa-solid fa-handshake text-purple-500 text-lg"></i>

        </div>

        <div>

            <p class="text-base text-black">
                Tổng số đối tác
            </p>

            <h3 class="text-2xl font-bold text-[#061755]">
                {{ $tongDoiTac }}
            </h3>

        </div>

    </div>

</div>

</div>


{{-- ========================================================= --}}
{{-- BIỂU ĐỒ --}}
{{-- ========================================================= --}}

<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-5">


    {{-- ===================================================== --}}
    {{-- ĐẶT PHÒNG THEO THÁNG --}}
    {{-- ===================================================== --}}

    <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 p-5 shadow-sm">

        <div class="flex items-center justify-between mb-4">

            <h2 class="text-2xl font-bold text-[#061755]">
                Đơn đặt phòng theo tháng
            </h2>

            <select
                id="namThongKe"
                class="border border-slate-200 rounded-lg px-3 py-2 text-sm text-black outline-none">

                <option value="{{ now()->year }}">
                    Năm {{ now()->year }}
                </option>

            </select>

        </div>

        <div class="h-[300px]">

            <canvas id="bieuDoDatPhong"></canvas>

        </div>

    </div>


    {{-- ===================================================== --}}
    {{-- ĐẶT PHÒNG THEO TRẠNG THÁI --}}
    {{-- ===================================================== --}}

    <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">

        <h2 class="text-2xl font-bold text-[#061755] mb-4">
            Đặt phòng theo trạng thái
        </h2>

        <div class="h-[300px] flex items-center justify-center">

            <canvas id="bieuDoTrangThai"></canvas>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- CHART.JS --}}
{{-- ========================================================= --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

document.addEventListener('DOMContentLoaded', function () {


    /*
    |--------------------------------------------------------------------------
    | BIỂU ĐỒ ĐẶT PHÒNG THEO THÁNG
    |--------------------------------------------------------------------------
    */

    const canvasDatPhong =
        document.getElementById('bieuDoDatPhong');


    if (canvasDatPhong) {

        new Chart(canvasDatPhong, {

            type: 'line',

            data: {

                labels: [

                    'T1',
                    'T2',
                    'T3',
                    'T4',
                    'T5',
                    'T6',
                    'T7',
                    'T8',
                    'T9',
                    'T10',
                    'T11',
                    'T12'

                ],

                datasets: [{

                    label: 'Đơn đặt phòng',

                    data: @json($datPhongTheoThang),

                    borderColor: '#1040C5',

                    backgroundColor:
                        'rgba(16, 64, 197, 0.08)',

                    fill: true,

                    tension: 0.4,

                    pointRadius: 4,

                    pointHoverRadius: 6

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {

                        display: false

                    }

                },

                scales: {

                    x: {

                        ticks: {

                            color: '#000000'

                        }

                    },

                    y: {

                        beginAtZero: true,

                        ticks: {

                            precision: 0,

                            color: '#000000'

                        }

                    }

                }

            }

        });

    }



    /*
    |--------------------------------------------------------------------------
    | BIỂU ĐỒ TRẠNG THÁI ĐẶT PHÒNG
    |--------------------------------------------------------------------------
    */

    const canvasTrangThai =
        document.getElementById('bieuDoTrangThai');


    if (canvasTrangThai) {

        new Chart(canvasTrangThai, {

            type: 'doughnut',

            data: {

                labels: [

                    'Chờ thanh toán',

                    'Đã xác nhận',

                    'Đã nhận phòng',

                    'Đã trả phòng',

                    'Đã hủy',

                    'Không đến'

                ],

                datasets: [{

                    data: @json($datPhongTheoTrangThai),

                    backgroundColor: [

                        '#F59E0B', // Chờ thanh toán

                        '#2563EB', // Đã xác nhận

                        '#10B981', // Đã nhận phòng

                        '#8B5CF6', // Đã trả phòng

                        '#EF4444', // Đã hủy

                        '#6B7280'  // Không đến

                    ],

                    borderColor: '#FFFFFF',

                    borderWidth: 0

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '62%',

                plugins: {

                    legend: {

                        position: 'right',

                        labels: {

                            color: '#000000',

                            font: {

                                size: 14

                            },

                            boxWidth: 14,

                            boxHeight: 14,

                            padding: 12

                        }

                    }

                }

            }

        });

    }

});

</script>

@endsection