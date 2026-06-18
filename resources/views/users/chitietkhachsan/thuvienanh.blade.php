<div>

    {{-- Tên khách sạn --}}
    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-3 text-[#061755]">

        {{ $khachSan->ten_khach_san }}

    </h1>

    {{-- Thông tin --}}
    <div class="flex flex-col lg:flex-row lg:items-center gap-3 lg:gap-5 mb-5">

        <div class="flex">

            @for($i = 1; $i <= $khachSan->so_sao_khach_san; $i++)

                <i class="fa-solid fa-star text-yellow-400"></i>

                @endfor

        </div>

        <span class="text-gray-500">

            <i class="fa-solid fa-location-dot text-red-500"></i>

            {{ $khachSan->dia_chi }}

        </span>

    </div>

    {{-- Thư viện ảnh --}}
    @if($khachSan->hinhAnh->count())

    <div class="space-y-3">

        {{-- Hàng trên --}}
        <div class="grid grid-cols-12 gap-3">

            {{-- Ảnh lớn --}}
            <div class="col-span-8">

                <img src="{{ asset($khachSan->hinhAnh->first()->duong_dan_anh) }}" onclick="openImage(this.src)"
                    class="w-full h-[450px] rounded-2xl object-cover cursor-pointer">

            </div>

            {{-- 2 ảnh bên phải --}}
            <div class="col-span-4 grid grid-rows-2 gap-3">

                @foreach($khachSan->hinhAnh->skip(1)->take(2) as $anh)

                <img src="{{ asset($anh->duong_dan_anh) }}" onclick="openImage(this.src)"
                    class="w-full h-[218px] rounded-2xl object-cover cursor-pointer">

                @endforeach

            </div>

        </div>

        {{-- Hàng dưới --}}
        <div class="grid grid-cols-4 gap-3">

            @foreach($khachSan->hinhAnh->skip(3)->take(3) as $anh)

            <img src="{{ asset($anh->duong_dan_anh) }}" onclick="openImage(this.src)"
                class="w-full h-[140px] rounded-2xl object-cover cursor-pointer">

            @endforeach

            {{-- Nút xem tất cả --}}
            @if($khachSan->hinhAnh->count() > 6)

            <div class="relative">

                <img src="{{ asset($khachSan->hinhAnh->skip(6)->first()->duong_dan_anh ?? $khachSan->hinhAnh->last()->duong_dan_anh) }}"
                    class="w-full h-[140px] rounded-2xl object-cover">

                <button onclick="toggleAlbum()"
                    class="absolute inset-0 bg-black/40 hover:bg-black/50 rounded-2xl flex flex-col items-center justify-center text-white transition">

                    <span class="text-4xl font-bold">

                        +{{ $khachSan->hinhAnh->count() - 6 }}

                    </span>

                    <span class="text-sm">

                        Xem tất cả ảnh

                    </span>

                </button>

            </div>

            @endif

        </div>

    </div>

    {{-- Album đầy đủ --}}
    <div id="albumAnh" class="hidden mt-8 bg-white rounded-2xl shadow p-6">

        <div class="flex items-center justify-between mb-5">

            <h2 class="text-2xl font-bold">

                Tất cả ảnh khách sạn

            </h2>

            <button onclick="toggleAlbum()" class="px-4 py-2 bg-slate-200 rounded-xl">

                Thu gọn

            </button>

        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

            @foreach($khachSan->hinhAnh as $anh)

            <img src="{{ asset($anh->duong_dan_anh) }}" onclick="openImage(this.src)"
                class="w-full h-60 rounded-2xl object-cover cursor-pointer hover:scale-105 transition">

            @endforeach

        </div>

    </div>

    @else

    <img src="{{ asset('images/no-image.jpg') }}" class="w-full h-[400px] rounded-2xl object-cover">

    @endif

</div>

{{-- Lightbox --}}
<div id="lightbox" class="hidden fixed inset-0 bg-black/90 z-[9999] flex items-center justify-center p-5">

    <button onclick="closeImage()" class="absolute top-5 right-8 text-white text-5xl">

        &times;

    </button>

    <img id="lightboxImage" src="" class="max-w-[95%] max-h-[90vh] rounded-2xl">

</div>

<script>
function toggleAlbum() {
    document
        .getElementById('albumAnh')
        .classList
        .toggle('hidden');
}

function openImage(src) {
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightboxImage').src = src;
    document.body.style.overflow = 'hidden';
}

function closeImage() {
    document.getElementById('lightbox').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

document.getElementById('lightbox').addEventListener(
    'click',
    function(e) {
        if (e.target.id === 'lightbox') {
            closeImage();
        }
    }
);
</script>