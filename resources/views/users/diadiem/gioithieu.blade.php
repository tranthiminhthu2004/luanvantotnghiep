<section class="bg-white rounded-3xl shadow-sm border border-slate-200 p-6 lg:p-10 mt-10">


    {{-- Tên địa điểm --}}
    <h1 class="mt-6 text-3xl md:text-4xl lg:text-5xl font-bold text-[#061755]">

        {{ $diaDiem->ten_dia_diem }}

    </h1>

    {{-- Đường kẻ --}}
    <div class="w-60 h-1 bg-[#1040C5] rounded-full mt-5"></div>

    {{-- Tiêu đề --}}
    <h2 class="mt-8 text-2xl font-bold text-[#061755]">

        Giới thiệu

    </h2>

    {{-- Nội dung --}}
    <div class="mt-5 text-slate-700 leading-8 whitespace-pre-line text-justify">

        {{ $diaDiem->mo_ta }}

    </div>

</section>