<form action="{{ route('khachsan.index') }}" method="GET">

    {{-- Giữ lại địa điểm đã tìm ở thanh Search --}}
    @if(request('ma_dia_diem'))
    <input type="hidden" name="ma_dia_diem" value="{{ request('ma_dia_diem') }}">
    @endif

    {{-- Giữ ngày nhận phòng --}}
    @if(request('ngay_nhan_phong'))
    <input type="hidden" name="ngay_nhan_phong" value="{{ request('ngay_nhan_phong') }}">
    @endif

    {{-- Giữ ngày trả phòng --}}
    @if(request('ngay_tra_phong'))
    <input type="hidden" name="ngay_tra_phong" value="{{ request('ngay_tra_phong') }}">
    @endif

    {{-- Giữ số người lớn --}}
    @if(request('so_nguoi_truong_thanh'))
    <input type="hidden" name="so_nguoi_truong_thanh" value="{{ request('so_nguoi_truong_thanh') }}">
    @endif

    {{-- Giữ trẻ em --}}
    @if(request('so_tre_em'))
    <input type="hidden" name="so_tre_em" value="{{ request('so_tre_em') }}">
    @endif

    {{-- Giữ người cao tuổi --}}
    @if(request('so_nguoi_cao_tuoi'))
    <input type="hidden" name="so_nguoi_cao_tuoi" value="{{ request('so_nguoi_cao_tuoi') }}">
    @endif

    {{-- Giữ số phòng --}}
    @if(request('so_luong_phong'))
    <input type="hidden" name="so_luong_phong" value="{{ request('so_luong_phong') }}">
    @endif

    <div class="w-full lg:w-72 bg-white rounded-2xl border border-gray-200 shadow-sm p-5 h-fit sticky top-24">

        <div class="flex items-center justify-between mb-6">

            <h3 class="text-xl font-bold text-[#061755]">

                Bộ lọc

            </h3>

            <a href="{{ route('khachsan.index') }}" class="text-sm text-blue-600 hover:underline">

                Xóa bộ lọc

            </a>

        </div>

        <!-- Khoảng giá -->

        <div class="mb-8">

            <h4 class="font-semibold text-black mb-3">

                Khoảng giá

            </h4>

            <div class="space-y-3">

                <label class="flex items-center gap-3 cursor-pointer">

                    <input type="checkbox" name="gia[]" value="duoi500"
                        {{ in_array('duoi500',request('gia',[])) ? 'checked' : '' }}>

                    <span>

                        Dưới 500.000đ

                    </span>

                </label>

                <label class="flex items-center gap-3 cursor-pointer">

                    <input type="checkbox" name="gia[]" value="500-1000"
                        {{ in_array('500-1000',request('gia',[])) ? 'checked' : '' }}>

                    <span>

                        500.000đ - 1.000.000đ

                    </span>

                </label>

                <label class="flex items-center gap-3 cursor-pointer">

                    <input type="checkbox" name="gia[]" value="1000-2000"
                        {{ in_array('1000-2000',request('gia',[])) ? 'checked' : '' }}>

                    <span>

                        1.000.000đ - 2.000.000đ

                    </span>

                </label>

                <label class="flex items-center gap-3 cursor-pointer">

                    <input type="checkbox" name="gia[]" value="tren2000"
                        {{ in_array('tren2000',request('gia',[])) ? 'checked' : '' }}>

                    <span>

                        Trên 2.000.000đ

                    </span>

                </label>

            </div>

        </div>

        <!-- Số sao -->

        <div class="mb-8">

            <h4 class="font-semibold text-black mb-3">

                Số sao khách sạn

            </h4>

            <div class="space-y-3">

                @for($i = 5; $i >= 3; $i--)

                <label class="flex items-center gap-3 cursor-pointer">

                    <input type="checkbox" name="so_sao[]" value="{{ $i }}"
                        {{ in_array($i,request('so_sao',[])) ? 'checked' : '' }}>

                    <span>

                        {{ str_repeat('⭐',$i) }}

                    </span>

                </label>

                @endfor

            </div>

        </div>

        <!-- Tiện nghi -->

        <div class="mb-8">

            <h4 class="font-semibold text-black mb-3">

                Tiện nghi

            </h4>

            <div class="space-y-3 max-h-64 overflow-y-auto">

                @foreach($tienNghis as $tienNghi)

                <label class="flex items-center gap-3 cursor-pointer">

                    <input type="checkbox" name="tien_nghi[]" value="{{ $tienNghi->ma_tien_nghi }}"
                        {{ in_array($tienNghi->ma_tien_nghi,request('tien_nghi',[])) ? 'checked' : '' }}>

                    <span>

                        {{ $tienNghi->ten_tien_nghi }}

                    </span>

                </label>

                @endforeach

            </div>

        </div>

        <div class="space-y-3">

            <button type="submit"
                class="w-full bg-[#1040C5] hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">

                Áp dụng bộ lọc

            </button>
        </div>

    </div>

</form>