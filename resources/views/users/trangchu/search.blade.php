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

            <form id="formTimKiemTrangChu" method="GET" action="{{ route('timkiem.trangchu') }}">

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
document.addEventListener('DOMContentLoaded', function () {

    // ==========================
    // Guest
    // ==========================
    let trangChuAdult = parseInt(document.getElementById('trangChuAdultInput').value);
    let trangChuChild = parseInt(document.getElementById('trangChuChildInput').value);
    let trangChuElder = parseInt(document.getElementById('trangChuElderInput').value);
    let trangChuRoom = parseInt(document.getElementById('trangChuRoomInput').value);

    const trangChuGuestButton = document.getElementById('trangChuGuestButton');
    const trangChuGuestDropdown = document.getElementById('trangChuGuestDropdown');

    trangChuGuestButton.addEventListener('click', function () {
        trangChuGuestDropdown.classList.toggle('hidden');
    });

    window.trangChuChangeValue = function(type, amount) {

        if(type === 'adult'){
            trangChuAdult = Math.max(1, trangChuAdult + amount);
            document.getElementById('trangChuAdultText').innerText = trangChuAdult;
            document.getElementById('trangChuAdultInput').value = trangChuAdult;
        }

        if(type === 'child'){
            trangChuChild = Math.max(0, trangChuChild + amount);
            document.getElementById('trangChuChildText').innerText = trangChuChild;
            document.getElementById('trangChuChildInput').value = trangChuChild;
        }

        if(type === 'elder'){
            trangChuElder = Math.max(0, trangChuElder + amount);
            document.getElementById('trangChuElderText').innerText = trangChuElder;
            document.getElementById('trangChuElderInput').value = trangChuElder;
        }

        if(type === 'room'){
            trangChuRoom = Math.max(1, trangChuRoom + amount);
            document.getElementById('trangChuRoomText').innerText = trangChuRoom;
            document.getElementById('trangChuRoomInput').value = trangChuRoom;
        }

        updateSummary();
    }

    function updateSummary() {
        document.getElementById('trangChuGuestSummary').innerText =
            trangChuAdult + ' người lớn · ' +
            trangChuChild + ' trẻ em · ' +
            trangChuElder + ' người cao tuổi · ' +
            trangChuRoom + ' phòng';
    }

    updateSummary();

    document.addEventListener('click', function(e){
        if(
            !trangChuGuestButton.contains(e.target) &&
            !trangChuGuestDropdown.contains(e.target)
        ){
            trangChuGuestDropdown.classList.add('hidden');
        }
    });

    // ==========================
    // Flatpickr
    // ==========================

    const now = new Date();
    let minCheckIn = new Date();

    if(now.getHours() >= 22){
        minCheckIn.setDate(minCheckIn.getDate() + 1);
    }

    const trangChuNgayTra = flatpickr("#trang_chu_ngay_tra_phong",{
        locale:"vn",
        dateFormat:"d/m/Y",
        minDate:new Date(minCheckIn.getTime() + 86400000)
    });

    flatpickr("#trang_chu_ngay_nhan_phong",{
        locale:"vn",
        dateFormat:"d/m/Y",
        minDate:minCheckIn,

        onChange:function(selectedDates){

            if(selectedDates.length==0) return;

            let minTra = new Date(selectedDates[0]);

            minTra.setDate(minTra.getDate()+1);

            trangChuNgayTra.set('minDate',minTra);

            trangChuNgayTra.clear();

        }
    });

    // ==========================
    // Khởi tạo Swiper
    // ==========================

    function khoiTaoSwiperKetQua() {

        if(document.querySelector('.diaDiemDuLichSwiper')){

            new Swiper(".diaDiemDuLichSwiper",{
                slidesPerView:1,
                spaceBetween:24,
                navigation:{
                    nextEl:".diaDiemDuLichNext",
                    prevEl:".diaDiemDuLichPrev"
                },
                breakpoints:{
                    640:{slidesPerView:1},
                    768:{slidesPerView:2},
                    1024:{slidesPerView:3}
                }
            });

        }

        if(document.querySelector('.khachSanSwiper')){

            new Swiper(".khachSanSwiper",{
                slidesPerView:1,
                spaceBetween:24,
                navigation:{
                    nextEl:".khachSanNext",
                    prevEl:".khachSanPrev"
                },
                breakpoints:{
                    640:{slidesPerView:1},
                    768:{slidesPerView:2},
                    1024:{slidesPerView:3}
                }
            });

        }

    }

    // ==========================
    // Ajax tìm kiếm
    // ==========================
document
    .getElementById('formTimKiemTrangChu')
    .addEventListener('submit', function (e) {

        e.preventDefault();

        const form = this;

        const ketQua =
            document.getElementById('ketQuaTimKiemTrangChu');

        const noiDungTrangChu =
            document.getElementById('noiDungTrangChu');

        if (!ketQua || !noiDungTrangChu) {
            console.error('Không tìm thấy phần tử HTML.');
            return;
        }

        // Hiện loading
        ketQua.classList.remove('hidden');

        ketQua.innerHTML = `
            <div class="py-10 text-center">
                <i class="fa-solid fa-spinner fa-spin text-3xl text-blue-600"></i>
                <p class="mt-3 text-gray-500">
                    Đang tìm thông tin...
                </p>
            </div>
        `;

        const url =
            form.action +
            '?' +
            new URLSearchParams(
                new FormData(form)
            ).toString();

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (response.status === 422) {
                return response.json().then(data => {
                    const errors = data.errors || {};
                    const errorDiaDiem = document.querySelector('#formTimKiemTrangChu select[name="ma_dia_diem"]');
                    const errorNgayNhan = document.getElementById('trang_chu_ngay_nhan_phong');
                    const errorNgayTra = document.getElementById('trang_chu_ngay_tra_phong');

                    // Clear old error messages
                    const errorContainers = [
                        errorDiaDiem ? errorDiaDiem.nextElementSibling : null,
                        errorNgayNhan ? errorNgayNhan.nextElementSibling : null,
                        errorNgayTra ? errorNgayTra.nextElementSibling : null
                    ];
                    errorContainers.forEach(container => {
                        if (container) {
                            container.innerHTML = '';
                        }
                    });

                    if (errors.ma_dia_diem && errorDiaDiem) {
                        const p = document.createElement('p');
                        p.className = 'text-red-500 text-sm ajax-error-msg mt-1';
                        p.textContent = errors.ma_dia_diem[0];
                        const container = errorDiaDiem.nextElementSibling;
                        if (container) container.appendChild(p);
                    }
                    if (errors.ngay_nhan_phong && errorNgayNhan) {
                        const p = document.createElement('p');
                        p.className = 'text-red-500 text-sm ajax-error-msg mt-1';
                        p.textContent = errors.ngay_nhan_phong[0];
                        const container = errorNgayNhan.nextElementSibling;
                        if (container) container.appendChild(p);
                    }
                    if (errors.ngay_tra_phong && errorNgayTra) {
                        const p = document.createElement('p');
                        p.className = 'text-red-500 text-sm ajax-error-msg mt-1';
                        p.textContent = errors.ngay_tra_phong[0];
                        const container = errorNgayTra.nextElementSibling;
                        if (container) container.appendChild(p);
                    }

                    ketQua.innerHTML = '';
                    ketQua.classList.add('hidden');
                    noiDungTrangChu.classList.remove('hidden');
                    throw null;
                });
            }

            if (!response.ok) {
                throw new Error('Có lỗi xảy ra. Vui lòng thử lại.');
            }

            return response.text();
        })
        .then(html => {

            if (!html) return;

            // Clear old error messages
            const errorDiaDiem = document.querySelector('#formTimKiemTrangChu select[name="ma_dia_diem"]');
            const errorNgayNhan = document.getElementById('trang_chu_ngay_nhan_phong');
            const errorNgayTra = document.getElementById('trang_chu_ngay_tra_phong');
            [errorDiaDiem, errorNgayNhan, errorNgayTra].forEach(el => {
                if (el && el.nextElementSibling) {
                    el.nextElementSibling.innerHTML = '';
                }
            });

            ketQua.innerHTML = html;

            noiDungTrangChu.classList.add('hidden');

            // Khởi tạo lại Swiper
            if (typeof khoiTaoSwiperKetQua === 'function') {
                khoiTaoSwiperKetQua();
            }

            ketQua.scrollIntoView({
                behavior: 'smooth'
            });

        })
        .catch(error => {

            if (error === null) return;

            ketQua.innerHTML = `
                <div class="py-10 text-center text-red-500">
                    Có lỗi xảy ra. Vui lòng thử lại.
                </div>
            `;

            console.error(error);

        });

    });
});
</script>