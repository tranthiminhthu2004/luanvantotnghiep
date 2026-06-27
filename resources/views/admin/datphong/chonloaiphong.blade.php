@extends('admin.trangchinh.admin')

@section('title','Chọn loại phòng')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="mb-6">

        <h2 class="text-3xl md:text-4xl font-bold text-[#061755]">

            Chọn loại phòng

        </h2>

        <p class="text-gray-500 mt-2">

            Các loại phòng còn trống trong khoảng thời gian đã chọn

        </p>

    </div>

    @if(session('error'))

    <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-5 py-3 rounded-xl">

        {{ session('error') }}

    </div>

    @endif

    @if($errors->any())

    <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-4">

        <ul class="list-disc list-inside text-red-600">

            @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    <form action="{{ route('admin.datphong.store') }}" method="POST">

        @csrf

        {{-- Giữ dữ liệu --}}
        @foreach($duLieuDatPhong as $key => $value)

        @if(!is_array($value))

        <input type="hidden" name="{{ $key }}" value="{{ $value }}">

        @endif

        @endforeach

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="overflow-x-auto">

                <table class="min-w-[1100px] w-full">

                    <thead class="bg-slate-50 text-black">

                        <tr>

                            <th class="px-6 py-4 text-left font-semibold">

                                Chọn

                            </th>

                            <th class="px-6 py-4 text-left font-semibold">

                                ID

                            </th>

                            <th class="px-6 py-4 text-left font-semibold">

                                Loại phòng

                            </th>

                            <th class="px-6 py-4 text-left font-semibold">

                                Số người tối đa

                            </th>

                            <th class="px-6 py-4 text-left font-semibold">

                                Giá / đêm

                            </th>

                            <th class="px-6 py-4 text-left font-semibold">

                                Còn trống

                            </th>

                            <th class="px-6 py-4 text-left font-semibold">

                                Số lượng

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($ketQua as $item)

                        <tr class="border-t hover:bg-slate-50 transition">

                            <td class="px-6 py-4">

                                <input type="checkbox" class="chon-phong w-5 h-5" name="loai_phong[]"
                                    value="{{ $item['loaiPhong']->ma_loai_phong }}">

                            </td>

                            <td class="px-6 py-4 font-semibold text-black">

                                {{ $item['loaiPhong']->ma_loai_phong }}

                            </td>

                            <td class="px-6 py-4 font-medium text-black">

                                {{ $item['loaiPhong']->ten_loai_phong }}

                            </td>

                            <td class="px-6 py-4 text-black">

                                {{ $item['loaiPhong']->so_nguoi_toi_da }} người

                            </td>

                            <td class="px-6 py-4 font-bold text-blue-600">

                                {{ number_format($item['loaiPhong']->gia_co_ban,0,',','.') }}đ

                            </td>

                            <td class="px-6 py-4">

                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">

                                    {{ $item['soPhongConLai'] }} phòng

                                </span>

                            </td>

                            <td class="px-6 py-4">

                                <input type="number" name="so_luong[{{ $item['loaiPhong']->ma_loai_phong }}]" min="1"
                                    max="{{ $item['soPhongConLai'] }}" value="1" disabled
                                    class="so-luong border rounded-xl px-3 py-2 w-24 text-center">

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7" class="text-center py-12 text-gray-500">

                                Không còn loại phòng nào trống.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
        <div class="mt-6 flex flex-wrap gap-4">

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full font-semibold transition">

                <i class="fa-solid fa-check mr-2"></i>

                Tạo đơn đặt phòng

            </button>

            <a href="{{ route('admin.datphong.create') }}"
                class="bg-slate-200 hover:bg-slate-300 text-black px-6 py-3 rounded-full font-semibold transition">

                Quay lại

            </a>

        </div>

    </form>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {

    const checkboxes = document.querySelectorAll('.chon-phong');

    checkboxes.forEach(function(checkbox) {

        checkbox.addEventListener('change', function() {

            const row = this.closest('tr');

            const soLuong = row.querySelector('.so-luong');

            if (this.checked) {
                soLuong.disabled = false;
                soLuong.focus();
            } else {
                soLuong.disabled = true;
                soLuong.value = 1;
            }

        });

    });

    document.querySelector('form').addEventListener('submit', function(e) {

        const daChon = document.querySelectorAll('.chon-phong:checked');

        if (daChon.length === 0) {
            e.preventDefault();

            alert('Vui lòng chọn ít nhất một loại phòng.');

            return;
        }

        let hopLe = true;

        daChon.forEach(function(item) {

            const row = item.closest('tr');

            const soLuong = row.querySelector('.so-luong');

            if (
                soLuong.value == '' ||
                parseInt(soLuong.value) < 1 ||
                parseInt(soLuong.value) > parseInt(soLuong.max)
            ) {
                hopLe = false;
            }

        });

        if (!hopLe) {
            e.preventDefault();

            alert('Số lượng phòng không hợp lệ.');

            return;
        }

    });

});
</script>

@endsection