<div class="bg-white rounded-2xl shadow-2xl p-5">

    <form method="GET" action="{{ route('khachsan.show',$khachSan->ma_khach_san) }}">

        <div class="grid grid-cols-12 gap-3 items-end">

            {{-- Ngày nhận phòng --}}
            <div class="col-span-12 lg:col-span-3">

                <label class="font-semibold text-black">

                    Ngày nhận phòng

                </label>

                <input type="text" name="ngay_nhan_phong" id="ngay_nhan_phong" value="{{ request('ngay_nhan_phong') }}"
                    placeholder="Chọn ngày" autocomplete="off" class="mt-2 w-full border rounded-xl px-4 py-3">

            </div>

            {{-- Ngày trả phòng --}}
            <div class="col-span-12 lg:col-span-3">

                <label class="font-semibold text-black">

                    Ngày trả phòng

                </label>

                <input type="text" name="ngay_tra_phong" id="ngay_tra_phong" value="{{ request('ngay_tra_phong') }}"
                    placeholder="Chọn ngày" autocomplete="off" class="mt-2 w-full border rounded-xl px-4 py-3">

            </div>

            {{-- Khách --}}
            <div class="col-span-12 lg:col-span-5 relative">

                <label class="font-semibold text-black">

                    Khách

                </label>

                <button type="button" id="guestButton"
                    class="mt-2 w-full border rounded-xl px-4 py-3 text-left bg-white">

                    <span id="guestSummary">

                        1 người lớn · 0 trẻ em · 0 người cao tuổi · 1 phòng

                    </span>

                </button>

                <div id="guestDropdown" class="hidden absolute z-50 bg-white border rounded-xl shadow-xl p-4 w-80 mt-2">

                    {{-- Người lớn --}}
                    <div class="flex justify-between items-center mb-4">

                        <span>

                            Người lớn

                        </span>

                        <div class="flex items-center gap-3">

                            <button type="button" onclick="changeValue('adult',-1)" class="w-8 h-8 border rounded">

                                -

                            </button>

                            <span id="adultText">

                                {{ request('so_nguoi_truong_thanh',1) }}

                            </span>

                            <button type="button" onclick="changeValue('adult',1)" class="w-8 h-8 border rounded">

                                +

                            </button>

                        </div>

                    </div>

                    {{-- Trẻ em --}}
                    <div class="flex justify-between items-center mb-4">

                        <span>

                            Trẻ em

                        </span>

                        <div class="flex items-center gap-3">

                            <button type="button" onclick="changeValue('child',-1)" class="w-8 h-8 border rounded">

                                -

                            </button>

                            <span id="childText">

                                {{ request('so_tre_em',0) }}

                            </span>

                            <button type="button" onclick="changeValue('child',1)" class="w-8 h-8 border rounded">

                                +

                            </button>

                        </div>

                    </div>

                    {{-- Người cao tuổi --}}
                    <div class="flex justify-between items-center mb-4">

                        <span>

                            Người cao tuổi

                        </span>

                        <div class="flex items-center gap-3">

                            <button type="button" onclick="changeValue('elder',-1)" class="w-8 h-8 border rounded">

                                -

                            </button>

                            <span id="elderText">

                                {{ request('so_nguoi_cao_tuoi',0) }}

                            </span>

                            <button type="button" onclick="changeValue('elder',1)" class="w-8 h-8 border rounded">

                                +

                            </button>

                        </div>

                    </div>

                    {{-- Số phòng --}}
                    <div class="flex justify-between items-center">

                        <span>

                            Số phòng

                        </span>

                        <div class="flex items-center gap-3">

                            <button type="button" onclick="changeValue('room',-1)" class="w-8 h-8 border rounded">

                                -

                            </button>

                            <span id="roomText">

                                {{ request('so_luong_phong',1) }}

                            </span>

                            <button type="button" onclick="changeValue('room',1)" class="w-8 h-8 border rounded">

                                +

                            </button>

                        </div>

                    </div>

                    <input type="hidden" name="so_nguoi_truong_thanh" id="adultInput"
                        value="{{ request('so_nguoi_truong_thanh',1) }}">

                    <input type="hidden" name="so_tre_em" id="childInput" value="{{ request('so_tre_em',0) }}">

                    <input type="hidden" name="so_nguoi_cao_tuoi" id="elderInput"
                        value="{{ request('so_nguoi_cao_tuoi',0) }}">

                    <input type="hidden" name="so_luong_phong" id="roomInput" value="{{ request('so_luong_phong',1) }}">

                </div>

            </div>

            {{-- Nút kiểm tra --}}
            <div class="col-span-12 lg:col-span-1">

                <button type="submit"
                    class="w-full bg-[#1040C5] hover:bg-blue-700 text-white rounded-xl py-3 h-[52px] mt-2">

                    <i class="fa-solid fa-magnifying-glass"></i>

                </button>

            </div>

        </div>

    </form>

</div>
<script>
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

document
    .getElementById('guestButton')
    .addEventListener('click', function() {

        document
            .getElementById('guestDropdown')
            .classList.toggle('hidden');

    });

function updateSummary() {
    document
        .getElementById('guestSummary')
        .innerText =
        adult +
        ' người lớn · ' +
        child +
        ' trẻ em · ' +
        elder +
        ' người cao tuổi · ' +
        room +
        ' phòng';
}

function changeValue(type, amount) {
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

updateSummary();
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {

    const ngayNhan = flatpickr("#ngay_nhan_phong", {

        locale: "vn",

        dateFormat: "d/m/Y",

        minDate: "today",

        defaultDate: document.getElementById("ngay_nhan_phong").value ?
            document.getElementById("ngay_nhan_phong").value :
            null,

        onChange: function(selectedDates) {

            if (selectedDates.length > 0) {
                const ngayNhanDaChon = selectedDates[0];

                ngayTra.set(
                    "minDate",
                    ngayNhanDaChon.fp_incr(1)
                );

                const ngayTraDangChon =
                    ngayTra.selectedDates[0];

                if (
                    !ngayTraDangChon ||
                    ngayTraDangChon <= ngayNhanDaChon
                ) {
                    ngayTra.setDate(
                        ngayNhanDaChon.fp_incr(1)
                    );
                }
            }

        }

    });

    const ngayTra = flatpickr("#ngay_tra_phong", {

        locale: "vn",

        dateFormat: "d/m/Y",

        minDate: new Date().fp_incr(1),

        defaultDate: document.getElementById("ngay_tra_phong").value ?
            document.getElementById("ngay_tra_phong").value :
            null

    });

    document.addEventListener("click", function(e) {

        const button =
            document.getElementById("guestButton");

        const dropdown =
            document.getElementById("guestDropdown");

        if (
            !button.contains(e.target) &&
            !dropdown.contains(e.target)
        ) {
            dropdown.classList.add("hidden");
        }

    });

});
</script>