<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lịch sử đặt phòng</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100">

    @include('components.navbar')

    <main class="pt-24 pb-16">

        <div class="max-w-6xl mx-auto px-4 ">

            {{-- Tiêu đề --}}
            <div class="mb-8 ">

                <h1 class="text-3xl font-bold text-slate-800 mt-10">

                    Lịch sử đặt phòng

                </h1>


            </div>

            {{-- Danh sách --}}
            <div class="space-y-10">

                @forelse($datPhongs as $datPhong)

                <div
                    class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-lg transition">

                    <div class="p-6">

                        <div class="flex flex-col lg:flex-row gap-6 items-start">

                            {{-- Ảnh khách sạn --}}
                            <div class="lg:w-72 flex-shrink-0">

                                @if(
                                $datPhong->khachSan &&
                                $datPhong->khachSan->hinhAnh->isNotEmpty()
                                )

                                <img src="{{ asset($datPhong->khachSan->hinhAnh->first()->duong_dan_anh) }}"
                                    class="w-full h-52 object-cover rounded-2xl">

                                @else

                                <img src="{{ asset('images/no-image.jpg') }}"
                                    class="w-full h-52 object-cover rounded-2xl">

                                @endif
                            </div>

                            {{-- Thông tin --}}
                            <div class="flex-1">
                                {{-- Tên khách sạn + Trạng thái --}}
                                <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">

                                    <div>

                                        <h2 class="text-2xl font-bold text-slate-800">

                                            {{ $datPhong->khachSan->ten_khach_san }}

                                        </h2>

                                        <p class="text-slate-500 mt-2">

                                            <i class="fa-solid fa-location-dot text-red-500 mr-2"></i>

                                            {{ $datPhong->khachSan->dia_chi }}

                                        </p>

                                    </div>

                                    <div>

                                        @if($datPhong->trang_thai_dat_phong == 'ChoThanhToan')

                                        <span
                                            class="inline-flex items-center bg-orange-100 text-orange-700 px-4 py-2 rounded-full font-semibold">

                                            <i class="fa-solid fa-credit-card mr-2"></i>

                                            Chờ thanh toán

                                        </span>

                                        @elseif($datPhong->trang_thai_dat_phong == 'ChoXacNhan')

                                        <span
                                            class="inline-flex items-center bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full font-semibold">

                                            <i class="fa-solid fa-clock mr-2"></i>

                                            Chờ xác nhận

                                        </span>

                                        @elseif($datPhong->trang_thai_dat_phong == 'DaXacNhan')

                                        <span
                                            class="inline-flex items-center bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">

                                            <i class="fa-solid fa-circle-check mr-2"></i>

                                            Đã xác nhận

                                        </span>

                                        @elseif($datPhong->trang_thai_dat_phong == 'DaNhanPhong')

                                        <span
                                            class="inline-flex items-center bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-semibold">

                                            <i class="fa-solid fa-bed mr-2"></i>

                                            Đã nhận phòng

                                        </span>

                                        @elseif($datPhong->trang_thai_dat_phong == 'DaTraPhong')

                                        <span
                                            class="inline-flex items-center bg-indigo-100 text-indigo-700 px-4 py-2 rounded-full font-semibold">

                                            <i class="fa-solid fa-check-double mr-2"></i>

                                            Đã trả phòng

                                        </span>

                                        @elseif($datPhong->trang_thai_dat_phong == 'DaHuy')

                                        <span
                                            class="inline-flex items-center bg-red-100 text-red-700 px-4 py-2 rounded-full font-semibold">

                                            <i class="fa-solid fa-xmark mr-2"></i>

                                            Đã hủy

                                        </span>

                                        @elseif($datPhong->trang_thai_dat_phong == 'KhongDen')

                                        <span
                                            class="inline-flex items-center bg-orange-100 text-orange-700 px-4 py-2 rounded-full font-semibold">

                                            <i class="fa-solid fa-triangle-exclamation mr-2"></i>

                                            Không đến nhận phòng

                                        </span>

                                        @endif

                                    </div>

                                </div>

                                {{-- Thông tin --}}
                                <div class="grid md:grid-cols-2 gap-5 mt-8">

                                    <div>

                                        <div class="text-slate-500 text-sm">

                                            Ngày nhận phòng

                                        </div>

                                        <div class="font-semibold text-lg">

                                            {{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}

                                        </div>

                                    </div>

                                    <div>

                                        <div class="text-slate-500 text-sm">

                                            Ngày trả phòng

                                        </div>

                                        <div class="font-semibold text-lg">

                                            {{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}

                                        </div>

                                    </div>

                                    <div>

                                        <div class="text-slate-500 text-sm">

                                            Loại phòng

                                        </div>

                                        <div class="font-semibold">

                                            @foreach($datPhong->chiTietDatPhong as $chiTiet)

                                            {{ $chiTiet->loaiPhong->ten_loai_phong }}

                                            @if(!$loop->last)

                                            ,

                                            @endif

                                            @endforeach

                                        </div>

                                    </div>

                                    <div>

                                        <div class="text-slate-500 text-sm">

                                            Số khách

                                        </div>

                                        <div class="font-semibold">

                                            {{ $datPhong->so_nguoi_truong_thanh }} người lớn

                                            @if($datPhong->so_tre_em)

                                            - {{ $datPhong->so_tre_em }} trẻ em

                                            @endif

                                            @if($datPhong->so_nguoi_cao_tuoi)

                                            - {{ $datPhong->so_nguoi_cao_tuoi }} người cao tuổi

                                            @endif

                                        </div>

                                    </div>

                                </div>

                                {{-- Tổng tiền + Nút --}}
                                <div
                                    class="mt-8 pt-6 border-t border-slate-200 flex flex-col md:flex-row justify-between items-center gap-4">

                                    <div>

                                        <div class="text-slate-500">

                                            Tổng tiền

                                        </div>

                                        <div class="text-xl font-bold text-blue-600">

                                            {{ number_format($datPhong->tong_tien,0,',','.') }}đ

                                        </div>

                                    </div>

                                    <a href="{{ route('lichsudatphong.show',$datPhong->ma_don_dat_phong) }}"
                                        class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition">


                                        Xem chi tiết

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                @empty
                <div class="bg-white rounded-3xl shadow-sm border border-slate-200">

                    <div class="py-20 text-center">

                        <i class="fa-regular fa-calendar-xmark text-6xl text-slate-300"></i>

                        <h2 class="mt-6 text-2xl font-bold text-slate-700">

                            Chưa có lịch sử đặt phòng

                        </h2>

                        <p class="mt-2 text-slate-500">

                            Bạn chưa thực hiện đơn đặt phòng nào.

                        </p>

                        <a href="{{ route('khachsan.index') }}"
                            class="inline-flex items-center gap-2 mt-8 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition">

                            <i class="fa-solid fa-hotel"></i>

                            Đặt phòng ngay

                        </a>

                    </div>

                </div>

                @endforelse

            </div>

            {{-- Phân trang --}}
            @if($datPhongs->hasPages())

            <div class="mt-10">

                {{ $datPhongs->links() }}

            </div>

            @endif

        </div>

    </main>

    @include('components.footer')

</body>

</html>