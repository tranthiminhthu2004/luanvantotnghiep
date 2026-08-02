<section class="relative min-h-[560px] lg:h-[620px]">

    <!-- Ảnh nền -->
    <img src="{{ asset('images/timkiem.png') }}" alt="Banner" class="absolute inset-0 w-full h-full object-cover">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/30"></div>

    <!-- Nội dung -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 lg:px-8 pt-8 lg:pt-20">

        <!-- Tiêu đề -->
        <div class="max-w-2xl text-white">

            <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold leading-tight">

                KHÁM PHÁ NHỮNG ĐIỂM ĐẾN PHÙ HỢP VỚI BẠN

            </h1>

            <p class="mt-4 lg:mt-6 text-lg lg:text-xl text-white/90 leading-8">

                Tìm kiếm khách sạn và địa điểm du lịch cho chuyến đi hoàn hảo của bạn

            </p>

        </div>

        <!-- Search Box -->
        <div class="mt-8 lg:mt-32">

            <form method="GET" action="{{ route('timkiem.trangchu') }}">

                <div class="bg-white rounded-2xl shadow-2xl p-5">

                    <div class="grid grid-cols-12 gap-3 items-end">

                        <!-- Địa điểm -->
                        <div class="col-span-12 lg:col-span-2">

                            <label class="font-semibold text-black">
                                Bạn muốn đến đâu?
                            </label>

                            <select name="ma_dia_diem"
                                class="mt-2 w-full border rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                                <option value="">
                                    Chọn địa điểm
                                </option>

                                @foreach($diaDiems as $diaDiem)

                                <option value="{{ $diaDiem->ma_dia_diem }}"
                                    {{ old('ma_dia_diem', request('ma_dia_diem')) == $diaDiem->ma_dia_diem ? 'selected' : '' }}>
                                    {{ $diaDiem->ten_dia_diem }}

                                </option>

                                @endforeach

                            </select>
                            <div class="h-5 mt-1">
                                @error('ma_dia_diem')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>

                        <!-- Ngày nhận phòng -->
                        <div class="col-span-12 lg:col-span-2">

                            <label class="font-semibold text-black">
                                Ngày nhận phòng
                            </label>

                            <input type="text" name="ngay_nhan_phong" id="trang_chu_ngay_nhan_phong"
                                value="{{ old('ngay_nhan_phong', request('ngay_nhan_phong')) }}" placeholder="Chọn ngày"
                                autocomplete="off" readonly
                                class="mt-2 w-full border rounded-xl px-4 py-3 text-sm cursor-pointer bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <div class="h-5 mt-1">
                                @error('ngay_nhan_phong')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <!-- Ngày trả phòng -->
                        <div class="col-span-12 lg:col-span-2">

                            <label class="font-semibold text-black">
                                Ngày trả phòng
                            </label>


                            <input type="text" name="ngay_tra_phong" id="trang_chu_ngay_tra_phong"
                                value="{{ old('ngay_tra_phong', request('ngay_tra_phong')) }}" placeholder="Chọn ngày"
                                autocomplete="off" readonly
                                class="mt-2 w-full border rounded-xl px-4 py-3 text-sm cursor-pointer bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <div class="h-5 mt-1">
                                @error('ngay_tra_phong')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Khách -->
                        <div class="col-span-12 lg:col-span-5 relative">

                            <label class="font-semibold text-black">
                                Khách
                            </label>

                            <button type="button" id="trangChuGuestButton"
                                class="mt-2 w-full border rounded-xl px-4 py-3 text-sm text-left bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                                <span id="trangChuGuestSummary">
                                    1 người lớn · 0 trẻ em · 0 người cao tuổi · 1 phòng
                                </span>

                            </button>
                            <div class="h-5 mt-1"></div>

                            <div id="trangChuGuestDropdown"
                                class="hidden absolute z-50 bg-white border rounded-xl shadow-xl p-4 w-80 mt-2">

                                <!-- Người lớn -->
                                <div class="flex justify-between items-center mb-4">

                                    <span>Người lớn</span>

                                    <div class="flex items-center gap-3">

                                        <button type="button" onclick="trangChuChangeValue('adult', -1)"
                                            class="w-8 h-8 border rounded">
                                            -
                                        </button>

                                        <span id="trangChuAdultText">
                                            {{ request('so_nguoi_truong_thanh', 1) }}
                                        </span>

                                        <button type="button" onclick="trangChuChangeValue('adult', 1)"
                                            class="w-8 h-8 border rounded">
                                            +
                                        </button>

                                    </div>

                                </div>

                                <!-- Trẻ em -->
                                <div class="flex justify-between items-center mb-4">

                                    <span>Trẻ em (Dưới 6 tuổi)</span>

                                    <div class="flex items-center gap-3">

                                        <button type="button" onclick="trangChuChangeValue('child', -1)"
                                            class="w-8 h-8 border rounded">
                                            -
                                        </button>

                                        <span id="trangChuChildText">
                                            {{ request('so_tre_em', 0) }}
                                        </span>

                                        <button type="button" onclick="trangChuChangeValue('child', 1)"
                                            class="w-8 h-8 border rounded">
                                            +
                                        </button>

                                    </div>

                                </div>

                                <!-- Người cao tuổi -->
                                <div class="flex justify-between items-center mb-4">

                                    <span>Người cao tuổi</span>

                                    <div class="flex items-center gap-3">

                                        <button type="button" onclick="trangChuChangeValue('elder', -1)"
                                            class="w-8 h-8 border rounded">
                                            -
                                        </button>

                                        <span id="trangChuElderText">
                                            {{ request('so_nguoi_cao_tuoi', 0) }}
                                        </span>

                                        <button type="button" onclick="trangChuChangeValue('elder', 1)"
                                            class="w-8 h-8 border rounded">
                                            +
                                        </button>

                                    </div>

                                </div>

                                <!-- Số phòng -->
                                <div class="flex justify-between items-center">

                                    <span>Số phòng</span>

                                    <div class="flex items-center gap-3">

                                        <button type="button" onclick="trangChuChangeValue('room', -1)"
                                            class="w-8 h-8 border rounded">
                                            -
                                        </button>

                                        <span id="trangChuRoomText">
                                            {{ request('so_luong_phong', 1) }}
                                        </span>

                                        <button type="button" onclick="trangChuChangeValue('room', 1)"
                                            class="w-8 h-8 border rounded">
                                            +
                                        </button>

                                    </div>

                                </div>

                                <input type="hidden" name="so_nguoi_truong_thanh" id="trangChuAdultInput"
                                    value="{{ old('so_nguoi_truong_thanh', request('so_nguoi_truong_thanh', 1)) }}">

                                <input type="hidden" name="so_tre_em" id="trangChuChildInput"
                                    value="{{ old('so_tre_em', request('so_tre_em', 0)) }}">

                                <input type="hidden" name="so_nguoi_cao_tuoi" id="trangChuElderInput"
                                    value="{{ old('so_nguoi_cao_tuoi', request('so_nguoi_cao_tuoi', 0)) }}">

                                <input type="hidden" name="so_luong_phong" id="trangChuRoomInput"
                                    value="{{ old('so_luong_phong', request('so_luong_phong', 1)) }}">

                            </div>

                        </div>

                        <!-- Nút tìm kiếm -->
                        <div class="col-span-12 lg:col-span-1">

                            <button type="submit"
                                class="w-full bg-[#1040C5] hover:bg-blue-700 text-white rounded-xl py-3 h-[46px] mt-2 transition">

                                <i class="fa-solid fa-magnifying-glass"></i>

                            </button>
                            <div class="h-5 mt-1"></div>


                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function() {

    let trangChuAdult =
        parseInt(
            document.getElementById('trangChuAdultInput').value
        );

    let trangChuChild =
        parseInt(
            document.getElementById('trangChuChildInput').value
        );

    let trangChuElder =
        parseInt(
            document.getElementById('trangChuElderInput').value
        );

    let trangChuRoom =
        parseInt(
            document.getElementById('trangChuRoomInput').value
        );

    const trangChuGuestButton =
        document.getElementById('trangChuGuestButton');

    const trangChuGuestDropdown =
        document.getElementById('trangChuGuestDropdown');

    trangChuGuestButton.addEventListener('click', function() {

        trangChuGuestDropdown.classList.toggle('hidden');

    });

    window.trangChuChangeValue = function(type, amount) {

        if (type === 'adult') {

            trangChuAdult = Math.max(
                1,
                trangChuAdult + amount
            );

            document.getElementById('trangChuAdultText').innerText =
                trangChuAdult;

            document.getElementById('trangChuAdultInput').value =
                trangChuAdult;

        }

        if (type === 'child') {

            trangChuChild = Math.max(
                0,
                trangChuChild + amount
            );

            document.getElementById('trangChuChildText').innerText =
                trangChuChild;

            document.getElementById('trangChuChildInput').value =
                trangChuChild;

        }

        if (type === 'elder') {

            trangChuElder = Math.max(
                0,
                trangChuElder + amount
            );

            document.getElementById('trangChuElderText').innerText =
                trangChuElder;

            document.getElementById('trangChuElderInput').value =
                trangChuElder;

        }

        if (type === 'room') {

            trangChuRoom = Math.max(
                1,
                trangChuRoom + amount
            );

            document.getElementById('trangChuRoomText').innerText =
                trangChuRoom;

            document.getElementById('trangChuRoomInput').value =
                trangChuRoom;

        }

        trangChuUpdateSummary();

    }

    function trangChuUpdateSummary() {

        document
            .getElementById('trangChuGuestSummary')
            .innerText =
            trangChuAdult + ' người lớn · ' +
            trangChuChild + ' trẻ em · ' +
            trangChuElder + ' người cao tuổi · ' +
            trangChuRoom + ' phòng';

    }

    trangChuUpdateSummary();

    const trangChuNgayNhan = flatpickr("#trang_chu_ngay_nhan_phong", {
        dateFormat: "d/m/Y",
        defaultDate: document.getElementById("trang_chu_ngay_nhan_phong").value || null,
        minDate: "today",
        allowInput: false,
        disableMobile: true
    });

    const trangChuNgayTra = flatpickr("#trang_chu_ngay_tra_phong", {
        dateFormat: "d/m/Y",
        defaultDate: document.getElementById("trang_chu_ngay_tra_phong").value || null,
        minDate: new Date().fp_incr(1),
        allowInput: false,
        disableMobile: true
    });

    document
        .getElementById('trang_chu_ngay_nhan_phong')
        .addEventListener('change', function() {

            if (!this.value) {
                return;
            }

            let parts = this.value.split('/');

            let date = new Date(
                parts[2],
                parts[1] - 1,
                parts[0]
            );

            date.setDate(
                date.getDate() + 1
            );

            trangChuNgayTra.set(
                'minDate',
                date
            );

            trangChuNgayTra.clear();

        });

    document.addEventListener('click', function(event) {

        if (
            !trangChuGuestButton.contains(event.target) &&
            !trangChuGuestDropdown.contains(event.target)
        ) {
            trangChuGuestDropdown.classList.add('hidden');
        }

    });

});
</script>