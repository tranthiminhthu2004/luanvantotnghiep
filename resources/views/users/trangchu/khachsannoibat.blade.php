<section class="max-w-7xl mx-auto px-4 lg:px-8 pt-14 lg:pt-16">

    <div class="mb-10">

        <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-[#061755] mb-3">

            Khách sạn nổi bật

        </h2>

    </div>

    @if($khachSansNoiBat->count() > 0)

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @foreach($khachSansNoiBat as $khachSan)

        <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">

            <div class="w-full h-60 bg-slate-100 overflow-hidden">

                @if($khachSan->hinhAnh && $khachSan->hinhAnh->count() > 0)

                @php
                $duongDanAnh = $khachSan->hinhAnh->first()->duong_dan_anh;

                if (str_contains($duongDanAnh, 'images/')) {
                $srcAnh = asset($duongDanAnh);
                } else {
                $srcAnh = asset('images/khachsan/' . $duongDanAnh);
                }
                @endphp

                <img src="{{ $srcAnh }}" alt="{{ $khachSan->ten_khach_san }}" class="w-full h-full object-cover">

                @else

                <div class="w-full h-full flex items-center justify-center text-gray-400">

                    Chưa có ảnh

                </div>

                @endif

            </div>

            <div class="p-5">

                <h3 class="text-lg font-bold text-[#061755] line-clamp-1">

                    {{ $khachSan->ten_khach_san }}

                </h3>

                <p class="text-gray-500 mt-2 line-clamp-1">

                    {{ $khachSan->diaDiem->ten_dia_diem ?? 'Chưa có địa điểm' }}

                </p>

                <div class="flex gap-1 mt-3 text-yellow-400">

                    @for($i = 1; $i <= $khachSan->so_sao_khach_san; $i++)

                        <i class="fa-solid fa-star"></i>

                        @endfor

                </div>

                @php
                $giaThapNhat = $khachSan->loaiPhongs->min('gia_co_ban');
                @endphp

                @if($giaThapNhat)

                <p class="mt-4 text-xl font-bold text-[#1040C5]">

                    {{ number_format($giaThapNhat, 0, ',', '.') }}đ

                </p>

                <p class="text-sm text-gray-500">

                    / đêm

                </p>

                @else

                <p class="mt-4 text-sm text-gray-400">

                    Chưa có giá phòng

                </p>

                @endif

                <a href="{{ route('users.chitietkhachsan', $khachSan->ma_khach_san) }}"
                    class="block text-center w-full mt-5 bg-[#1040C5] text-white py-3 rounded-xl hover:bg-blue-700 transition">

                    Xem chi tiết

                </a>

            </div>

        </div>

        @endforeach

    </div>

    <div class="mt-8 text-center">

        <a href="{{ route('khachsan.index') }}"
            class="inline-flex items-center justify-center px-7 py-3 rounded-full border border-[#1040C5] text-[#1040C5] font-semibold hover:bg-[#1040C5] hover:text-white transition">

            Xem tất cả khách sạn

        </a>

    </div>

    @else

    <div class="bg-white rounded-3xl p-8 text-center text-gray-500 shadow-sm">

        Chưa có khách sạn nổi bật để hiển thị.

    </div>

    @endif

</section>