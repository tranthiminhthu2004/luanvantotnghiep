<div class="bg-white rounded-xl shadow-sm border border-slate-100 p-5 mb-5">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 xl:gap-8">

        {{-- Giới thiệu --}}
        <div>

            <h2 class="font-bold text-2xl text-[#061755] mb-4">

                Giới thiệu khách sạn

            </h2>

            <div id="moTaRutGon">

                <p class="text-gray-600 leading-7 line-clamp-4">

                    {{ $khachSan->mo_ta ?: 'Khách sạn chưa cập nhật mô tả.' }}

                </p>

            </div>

            <div id="moTaDayDu" class="hidden">

                <p class="text-gray-600 leading-7 whitespace-pre-line">

                    {{ $khachSan->mo_ta ?: 'Khách sạn chưa cập nhật mô tả.' }}

                </p>

            </div>

            <button id="btnMoTa" onclick="toggleMoTa()"
                class="inline-block mt-3 text-blue-600 hover:text-blue-800 font-medium transition">

                Xem thêm

            </button>

        </div>

        {{-- Thông tin khách sạn --}}
        <div>

            <h2 class="font-bold text-2xl text-[#061755] mb-4">

                Thông tin khách sạn

            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Địa điểm --}}
                <div class="flex items-center gap-3 rounded-lg p-2 hover:bg-slate-50 transition">

                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">

                        <i class="fa-solid fa-map text-blue-500"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-500">

                            Địa điểm

                        </p>

                        <p class="font-semibold">

                            {{ $khachSan->diaDiem->ten_dia_diem ?? 'Chưa cập nhật' }}

                        </p>

                    </div>

                </div>

                {{-- Điện thoại --}}
                <div class="flex items-center gap-3 rounded-lg p-2 hover:bg-slate-50 transition">

                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">

                        <i class="fa-solid fa-phone text-green-500"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-500">

                            Số điện thoại

                        </p>

                        <p class="font-semibold">

                            {{ $khachSan->so_dien_thoai ?: 'Chưa cập nhật' }}

                        </p>

                    </div>

                </div>

                {{-- Email --}}
                <div class="flex items-center gap-3 rounded-lg p-2 hover:bg-slate-50 transition">

                    <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center flex-shrink-0">

                        <i class="fa-solid fa-envelope text-orange-500"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-500">

                            Email

                        </p>

                        <p class="font-semibold break-all">

                            {{ $khachSan->email ?: 'Chưa cập nhật' }}

                        </p>

                    </div>

                </div>

                {{-- Giờ nhận phòng --}}
                <div class="flex items-center gap-3 rounded-lg p-2 hover:bg-slate-50 transition">

                    <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center flex-shrink-0">

                        <i class="fa-solid fa-right-to-bracket text-indigo-500"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-500">

                            Giờ nhận phòng

                        </p>

                        <p class="font-semibold">

                            {{ \Carbon\Carbon::parse($khachSan->gio_check_in)->format('H:i') }}

                        </p>

                    </div>

                </div> {{-- Giờ trả phòng --}}
                <div class="flex items-center gap-3 rounded-lg p-2 hover:bg-slate-50 transition">

                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">

                        <i class="fa-solid fa-right-from-bracket text-red-500"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-500">

                            Giờ trả phòng

                        </p>

                        <p class="font-semibold">

                            {{ \Carbon\Carbon::parse($khachSan->gio_check_out)->format('H:i') }}

                        </p>

                    </div>

                </div>

                {{-- Chính sách hủy --}}
                <div class="flex items-center gap-3 rounded-lg p-2 hover:bg-slate-50 transition">

                    <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center flex-shrink-0">

                        <i class="fa-solid fa-calendar-xmark text-yellow-600"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-500">

                            Chính sách hủy

                        </p>

                        <p class="font-semibold">

                            Hủy miễn phí trước
                            {{ $khachSan->so_gio_huy_mien_phi }}
                            giờ nhận phòng

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- Tiện nghi khách sạn --}}
<div class="bg-white rounded-xl shadow-sm border border-slate-100 p-5 mb-5">

    <h2 class="font-bold text-xl text-[#061755] mb-5">

        Tiện nghi khách sạn

    </h2>

    <div class="flex flex-wrap gap-3">

        @forelse($khachSan->tienNghis as $tienNghi)

        <div class="relative group">

            <div
                class="inline-flex items-center gap-2 border border-slate-200 rounded-lg px-3 py-2 bg-white hover:bg-blue-50 hover:border-blue-300 transition duration-200 cursor-pointer">

                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">

                    <i class="fa-solid {{ $tienNghi->icon }} text-blue-600 text-sm"></i>

                </div>

                <span class="text-sm font-medium text-slate-700 whitespace-nowrap">

                    {{ $tienNghi->ten_tien_nghi }}

                </span>

            </div>

            {{-- Tooltip mô tả --}}
            @if(!empty($tienNghi->mo_ta))

            <div
                class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-64 bg-slate-900 text-white text-xs rounded-lg p-3 shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-200 z-50">

                <p class="font-semibold mb-1">

                    {{ $tienNghi->ten_tien_nghi }}

                </p>

                <p class="leading-5 text-slate-200">

                    {{ $tienNghi->mo_ta }}

                </p>

                {{-- Mũi tên --}}
                <div class="absolute -top-2 left-1/2 -translate-x-1/2 border-8 border-transparent border-b-slate-900">
                </div>

            </div>

            @endif

        </div>

        @empty

        <div class="w-full text-center py-8 text-gray-500">

            <i class="fa-solid fa-circle-info text-2xl mb-2"></i>

            <p>

                Khách sạn chưa cập nhật tiện nghi.

            </p>

        </div>

        @endforelse

    </div>

</div>
<script>
function toggleMoTa() {

    const rutGon = document.getElementById('moTaRutGon');
    const dayDu = document.getElementById('moTaDayDu');
    const btn = document.getElementById('btnMoTa');

    if (dayDu.classList.contains('hidden')) {

        dayDu.classList.remove('hidden');
        rutGon.classList.add('hidden');

        btn.innerHTML = `
                Thu gọn
                <i class="fa-solid fa-chevron-up ml-1 text-xs"></i>
            `;

    } else {

        dayDu.classList.add('hidden');
        rutGon.classList.remove('hidden');

        btn.innerHTML = `
                Xem thêm
                <i class="fa-solid fa-chevron-down ml-1 text-xs"></i>
            `;

    }
}
</script>