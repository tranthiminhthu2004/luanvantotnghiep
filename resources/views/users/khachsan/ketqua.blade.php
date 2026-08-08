<div class="flex flex-col lg:flex-row gap-6">

    {{-- Sidebar bộ lọc --}}
    @include('users.khachsan.boloc')

    {{-- Nội dung kết quả --}}
    <div class="flex-1 min-w-0">

        {{-- Tiêu đề --}}
        <div class="mb-5">

            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">

                <div>

                    <h1 class="text-3xl font-bold text-[#061755] mt-2">

                        Tìm thấy {{ $khachSans->total() }} khách sạn phù hợp

                    </h1>

                </div>

            </div>

        </div>

        {{-- Danh sách khách sạn --}}
        <div class="space-y-5">

            @forelse($khachSans as $khachSan)

                @include('users.khachsan.thekhachsan')

            @empty

                <div class="bg-white rounded-3xl border shadow-sm p-12 text-center">

                    <div class="w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center mx-auto">

                        <i class="fa-solid fa-hotel text-3xl text-slate-400"></i>

                    </div>

                    <h3 class="text-2xl font-bold text-slate-700 mt-5">

                        Không tìm thấy khách sạn

                    </h3>

                    <p class="text-gray-500 mt-2">

                        Vui lòng thử địa điểm khác hoặc thay đổi điều kiện tìm kiếm.

                    </p>

                </div>

            @endforelse

        </div>

        {{-- Phân trang --}}
        @if($khachSans->hasPages())

            <div class="mt-8">

                {{ $khachSans->links() }}

            </div>

        @endif

    </div>

</div>