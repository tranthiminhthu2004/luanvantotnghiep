@extends('doitac.index')

@section('title','Khách sạn của tôi')

@section('content')

<div class="bg-white rounded-2xl shadow-sm p-6">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-2xl font-bold text-[#061755]">

                Khách sạn của tôi

            </h2>

            <p class="text-gray-500 mt-1">

                Quản lý khách sạn của bạn.

            </p>

        </div>

        <a href="{{ route('doitac.khachsan.create') }}"
            class="bg-[#1040C5] hover:bg-blue-700 text-white px-5 py-3 rounded-xl font-semibold">

            <i class="fa-solid fa-plus mr-2"></i>

            Đăng khách sạn

        </a>

    </div>

    @if($khachSans->isEmpty())

    <div class="py-20 text-center">

        <i class="fa-solid fa-hotel text-6xl text-blue-200"></i>

        <h3 class="mt-6 text-2xl font-bold text-[#061755]">

            Bạn chưa đăng khách sạn

        </h3>

        <p class="text-gray-500 mt-3">

            Hãy gửi thông tin khách sạn để Admin xét duyệt.

        </p>

        <a href="{{ route('doitac.khachsan.create') }}"
            class="inline-block mt-8 bg-[#1040C5] hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

            Đăng khách sạn ngay

        </a>

    </div>

    @else

    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead>

                <tr class="border-b">

                    <th class="px-4 py-3 text-left">

                        Mã

                    </th>

                    <th class="px-4 py-3 text-left">

                        Tên khách sạn

                    </th>

                    <th class="px-4 py-3 text-left">

                        Trạng thái

                    </th>

                    <th class="px-4 py-3 text-left">

                        Duyệt

                    </th>

                    <th class="px-4 py-3 text-center">

                        Thao tác

                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($khachSans as $khachSan)

                <tr class="border-b">

                    <td class="px-4 py-4">

                        {{ $khachSan->ma_khach_san }}

                    </td>

                    <td class="px-4 py-4">

                        {{ $khachSan->ten_khach_san }}

                    </td>

                    <td class="px-4 py-4">

                        @if($khachSan->trang_thai)

                        <span class="text-green-600 font-semibold">

                            Hoạt động

                        </span>

                        @else

                        <span class="text-red-600 font-semibold">

                            Tạm khóa

                        </span>

                        @endif

                    </td>

                    <td class="px-4 py-4">

                        {{ $khachSan->trang_thai_duyet }}

                    </td>

                    <td class="px-4 py-4 text-center">

                        <a href="{{ route('doitac.khachsan.edit',$khachSan->ma_khach_san) }}"
                            class="text-blue-600 hover:text-blue-800">

                            <i class="fa-solid fa-pen"></i>

                        </a>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    @endif

</div>

@endsection