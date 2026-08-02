<section class="relative min-h-[560px] lg:h-[620px]">

    <!-- Ảnh nền -->
    <img src="{{ asset('images/tc.png') }}" alt="Banner" class="absolute inset-0 w-full h-full object-cover">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/30"></div>

    <!-- Nội dung -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 lg:px-8 pt-8 lg:pt-20">

        <!-- Tiêu đề -->
        <div class="max-w-2xl text-white">

            <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold leading-tight">

                KHÁCH SẠN

            </h1>

            <p class="mt-4 lg:mt-6 text-lg lg:text-xl text-white/90">

                Khám phá và đặt phòng khách sạn phù hợp cho những chuyến đi của bạn

            </p>

        </div>

        <!-- Search Box -->
        <div class="mt-16 lg:mt-56">
            <form method="GET" action="{{ route('khachsan.timkiem') }}">

                <div class="bg-white rounded-2xl shadow-2xl p-5">

                    <div class="grid grid-cols-12 gap-3 items-end">

                        <!-- Địa điểm -->
                        <div class="col-span-12 lg:col-span-2">

                            <label class="font-semibold text-black">
                                Bạn muốn đến đâu?
                            </label>

                            <select name="ma_dia_diem" class="mt-2 w-full border rounded-xl px-4 py-3">

                                <option value="">
                                    Chọn địa điểm
                                </option>

                                @foreach($diaDiems as $diaDiem)

                                <option value="{{ $diaDiem->ma_dia_diem }}"
                                    {{ old('ma_dia_diem') == $diaDiem->ma_dia_diem ? 'selected' : '' }}>

                                    {{ $diaDiem->ten_dia_diem }}

                                </option>

                                @endforeach

                            </select>
                            <div class="h-5 mt-1">
                                @error('ma_dia_diem')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Ngày nhận phòng -->
                        <div class="col-span-12 lg:col-span-2">

                            <label class="font-semibold text-black">
                                Ngày nhận phòng
                            </label>

                            <input type="text" name="ngay_nhan_phong" id="ngay_nhan_phong"
                                value="{{ old('ngay_nhan_phong') }}" placeholder="Chọn ngày" autocomplete="off"
                                class="mt-2 w-full border rounded-xl px-4 py-3">
                            <div class="h-5 mt-1">
                                @error('ngay_nhan_phong')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Ngày trả phòng -->
                        <div class="col-span-12 lg:col-span-2">

                            <label class="font-semibold text-black">
                                Ngày trả phòng
                            </label>

                            <input type="text" name="ngay_tra_phong" id="ngay_tra_phong"
                                value="{{ old('ngay_tra_phong') }}" placeholder="Chọn ngày" autocomplete="off"
                                class="mt-2 w-full border rounded-xl px-4 py-3">
                            <div class="h-5 mt-1">
                                @error('ngay_tra_phong')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Khách -->
                        <div class="col-span-12 lg:col-span-5 relative">

                            <label class="font-semibold text-black">
                                Khách
                            </label>

                            <button type="button" id="guestButton"
                                class="mt-2 w-full border rounded-xl px-4 py-3 text-left bg-white">

                                <span id="guestSummary">
                                    1 người lớn · 0 trẻ em · 0 người cao tuổi
                                </span>

                            </button>
                            <div class="h-5 mt-1"></div>

                            <div id="guestDropdown"
                                class="hidden absolute z-50 bg-white border rounded-xl shadow-xl p-4 w-80 mt-2">

                                <div class="flex justify-between items-center mb-4">

                                    <span>Người lớn</span>

                                    <div class="flex items-center gap-3">

                                        <button type="button" onclick="changeValue('adult',-1)"
                                            class="w-8 h-8 border rounded">
                                            -
                                        </button>

                                        <span id="adultText">
                                            {{ request('so_nguoi_truong_thanh',1) }}
                                        </span>

                                        <button type="button" onclick="changeValue('adult',1)"
                                            class="w-8 h-8 border rounded">
                                            +
                                        </button>

                                    </div>

                                </div>

                                <div class="flex justify-between items-center mb-4">

                                    <span>Trẻ em (Dưới 6 tuổi)</span>

                                    <div class="flex items-center gap-3">

                                        <button type="button" onclick="changeValue('child',-1)"
                                            class="w-8 h-8 border rounded">-</button>
                                        <span id="childText">
                                            {{ request('so_tre_em',0) }}
                                        </span>

                                        <button type="button" onclick="changeValue('child',1)"
                                            class="w-8 h-8 border rounded">+</button>

                                    </div>

                                </div>

                                <div class="flex justify-between items-center mb-4">

                                    <span>Người cao tuổi</span>

                                    <div class="flex items-center gap-3">

                                        <button type="button" onclick="changeValue('elder',-1)"
                                            class="w-8 h-8 border rounded">-</button>

                                        <span id="elderText">
                                            {{ request('so_nguoi_cao_tuoi',0) }}
                                        </span>

                                        <button type="button" onclick="changeValue('elder',1)"
                                            class="w-8 h-8 border rounded">+</button>

                                    </div>

                                </div>
                                <div class="flex justify-between items-center">

                                    <span>Số phòng</span>

                                    <div class="flex items-center gap-3">

                                        <button type="button" onclick="changeValue('room',-1)"
                                            class="w-8 h-8 border rounded">
                                            -
                                        </button>

                                        <span id="roomText">
                                            {{ request('so_luong_phong',1) }}
                                        </span>

                                        <button type="button" onclick="changeValue('room',1)"
                                            class="w-8 h-8 border rounded">
                                            +
                                        </button>

                                    </div>

                                </div>

                                <input type="hidden" name="so_nguoi_truong_thanh" id="adultInput"
                                    value="{{ old('so_nguoi_truong_thanh',1) }}">

                                <input type="hidden" name="so_tre_em" id="childInput" value="{{ old('so_tre_em',0) }}">

                                <input type="hidden" name="so_nguoi_cao_tuoi" id="elderInput"
                                    value="{{ old('so_nguoi_cao_tuoi',0) }}">

                                <input type="hidden" name="so_luong_phong" id="roomInput"
                                    value="{{ old('so_luong_phong',1) }}">

                            </div>

                        </div>

                        <!-- Nút tìm kiếm -->
                        <div class="col-span-12 lg:col-span-1">

                            <button type="submit"
                                class="w-full bg-[#1040C5] hover:bg-blue-700 text-white rounded-xl py-3 h-[52px] mt-2">

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

    let adult =
        parseInt(
            document.getElementById('adultInput').value
        );

    let child =
        parseInt(
            document.getElementById('childInput').value
        );

    let elder =
        parseInt(
            document.getElementById('elderInput').value
        );

    let room =
        parseInt(
            document.getElementById('roomInput').value
        );

    const guestButton =
        document.getElementById('guestButton');

    const guestDropdown =
        document.getElementById('guestDropdown');

    guestButton.addEventListener('click', function() {

        guestDropdown.classList.toggle('hidden');

    });

    window.changeValue = function(type, amount) {

        if (type === 'adult') {

            adult = Math.max(1, adult + amount);

            document.getElementById('adultText').innerText = adult;

            document.getElementById('adultInput').value = adult;
        }

        if (type === 'child') {

            child = Math.max(0, child + amount);

            document.getElementById('childText').innerText = child;

            document.getElementById('childInput').value = child;
        }

        if (type === 'elder') {

            elder = Math.max(0, elder + amount);

            document.getElementById('elderText').innerText = elder;

            document.getElementById('elderInput').value = elder;
        }

        if (type === 'room') {

            room = Math.max(1, room + amount);

            document.getElementById('roomText').innerText = room;

            document.getElementById('roomInput').value = room;
        }

        updateSummary();

    }

    function updateSummary() {

        document
            .getElementById('guestSummary')
            .innerText =
            adult + ' người lớn · ' +
            child + ' trẻ em · ' +
            elder + ' người cao tuổi · ' +
            room + ' phòng';

    }

    updateSummary();

    const ngayNhan = flatpickr(
        "#ngay_nhan_phong", {
            dateFormat: "d/m/Y",
            minDate: "today",
            allowInput: false,
            disableMobile: true
        }
    );

    const ngayTra = flatpickr(
        "#ngay_tra_phong", {
            dateFormat: "d/m/Y",
            minDate: new Date().fp_incr(1),
            allowInput: false,
            disableMobile: true
        }
    );

    document
        .getElementById('ngay_nhan_phong')
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

            ngayTra.set(
                'minDate',
                date
            );

            ngayTra.clear();

        });

    document.addEventListener('click', function(event) {

        if (
            !guestButton.contains(event.target) &&
            !guestDropdown.contains(event.target)
        ) {
            guestDropdown.classList.add('hidden');
        }

    });

});
</script>