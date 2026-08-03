<div class="bg-white rounded-2xl shadow-sm p-4 mb-6">

    <form id="filterForm" method="GET" action="{{ route('admin.phong.index') }}">

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-6 gap-4">

            <!-- Số phòng -->
            <select name="so_phong" onchange="this.form.submit()"
                class="border rounded-xl px-4 py-3 text-base  text-black bg-white">

                <option value="">
                    Tất cả số phòng
                </option>

                @foreach($danhSachSoPhong as $phong)

                <option value="{{ $phong->so_phong }}" {{ request('so_phong') == $phong->so_phong ? 'selected' : '' }}>

                    {{ $phong->so_phong }}

                </option>

                @endforeach

            </select>

            <!-- Khách sạn -->
            <input type="text" id="ten_khach_san" name="ten_khach_san" value="{{ request('ten_khach_san') }}"
                placeholder="Tìm khách sạn..." class="border rounded-xl px-4 py-3 text-base text-black bg-white">

            <!-- Loại phòng -->
            <select name="ten_loai_phong" onchange="this.form.submit()"
                class="border rounded-xl px-4 py-3 text-base text-black bg-white">

                <option value="">
                    Tất cả loại phòng
                </option>

                @foreach($loaiPhongs as $loaiPhong)

                <option value="{{ $loaiPhong->ten_loai_phong }}"
                    {{ request('ten_loai_phong') == $loaiPhong->ten_loai_phong ? 'selected' : '' }}>

                    {{ $loaiPhong->ten_loai_phong }}

                </option>

                @endforeach

            </select>
            <!-- Trạng thái -->
            <select name="trang_thai_phong" onchange="this.form.submit()"
                class="border rounded-xl px-4 py-3 text-base  text-black bg-white">

                <option value=""
                    {{ request('trang_thai_phong') === null || request('trang_thai_phong') === '' ? 'selected' : '' }}>

                    Tất cả trạng thái

                </option>

                <option value="DangHoatDong" {{ request('trang_thai_phong') == 'DangHoatDong' ? 'selected' : '' }}>

                    Đang hoạt động

                </option>

                <option value="BaoTri" {{ request('trang_thai_phong') == 'BaoTri' ? 'selected' : '' }}>

                    Bảo trì

                </option>

                <option value="NgungHoatDong" {{ request('trang_thai_phong') == 'NgungHoatDong' ? 'selected' : '' }}>

                    Ngưng hoạt động

                </option>

            </select>

            <!-- Sắp xếp -->
            <select name="sap_xep" onchange="this.form.submit()"
                class="border rounded-xl px-4 py-3 text-base  text-black bg-white">

                <option value="desc" {{ request('sap_xep','desc') == 'desc' ? 'selected' : '' }}>

                    Mới nhất

                </option>

                <option value="asc" {{ request('sap_xep') == 'asc' ? 'selected' : '' }}>

                    Cũ nhất

                </option>

            </select>

            <!-- Xóa lọc -->
            <a href="{{ route('admin.phong.index') }}"
                class="rounded-xl bg-red-50 hover:bg-red-100 text-red-600 text-base font-medium flex items-center justify-center gap-2 px-4 py-3 transition">

                <i class="fa-solid fa-rotate-left"></i>

                Xóa lọc

            </a>

        </div>

    </form>

</div>
<script>
document.addEventListener('DOMContentLoaded', function() {

    const input = document.getElementById('ten_khach_san');
    const form = document.getElementById('filterForm');

    if (!input) return;

    let timer;

    input.addEventListener('input', function() {

        clearTimeout(timer);

        timer = setTimeout(function() {
            form.submit();
        }, 800);

    });

});
</script>