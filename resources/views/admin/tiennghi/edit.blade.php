@extends('admin.trangchinh.admin')

@section('title','Cập nhật tiện nghi')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <div class="mb-8">

            <h2 class="text-4xl font-bold text-[#061755]">

                Cập nhật tiện nghi

            </h2>

        </div>

        @if ($errors->any())

        <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded-xl">

            <ul class="list-disc pl-5">

                @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

        @endif

        <form action="{{ route('admin.tiennghi.update',$tienNghi->ma_tien_nghi) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Tên tiện nghi -->
                <div>

                    <label class="font-medium text-slate-700">

                        Tên tiện nghi

                    </label>

                    <input type="text" name="ten_tien_nghi" value="{{ old('ten_tien_nghi',$tienNghi->ten_tien_nghi) }}"
                        class="w-full mt-2 border rounded-full px-5 py-3">

                </div>

                <!-- Icon -->
                <div>

                    <label class="font-medium text-slate-700">

                        Biểu tượng

                    </label>

                    <select name="icon" class="w-full mt-2 border rounded-full px-5 py-3">

                        <option value="fa-wifi" {{ $tienNghi->icon == 'fa-wifi' ? 'selected' : '' }}>📶 Wifi</option>

                        <option value="fa-tv" {{ $tienNghi->icon == 'fa-tv' ? 'selected' : '' }}>📺 TV</option>

                        <option value="fa-bed" {{ $tienNghi->icon == 'fa-bed' ? 'selected' : '' }}>🛏️ Giường</option>

                        <option value="fa-couch" {{ $tienNghi->icon == 'fa-couch' ? 'selected' : '' }}>🛋️ Sofa</option>

                        <option value="fa-snowflake" {{ $tienNghi->icon == 'fa-snowflake' ? 'selected' : '' }}>❄️ Điều
                            hòa</option>

                        <option value="fa-shower" {{ $tienNghi->icon == 'fa-shower' ? 'selected' : '' }}>🚿 Vòi sen
                        </option>

                        <option value="fa-bath" {{ $tienNghi->icon == 'fa-bath' ? 'selected' : '' }}>🛁 Bồn tắm</option>

                        <option value="fa-coffee" {{ $tienNghi->icon == 'fa-coffee' ? 'selected' : '' }}>☕ Cà phê
                        </option>

                        <option value="fa-water-ladder" {{ $tienNghi->icon == 'fa-water-ladder' ? 'selected' : '' }}>🏊
                            Hồ bơi</option>

                        <option value="fa-dumbbell" {{ $tienNghi->icon == 'fa-dumbbell' ? 'selected' : '' }}>🏋️ Gym
                        </option>

                        <option value="fa-spa" {{ $tienNghi->icon == 'fa-spa' ? 'selected' : '' }}>🌿 Spa</option>

                        <option value="fa-utensils" {{ $tienNghi->icon == 'fa-utensils' ? 'selected' : '' }}>🍴 Nhà hàng
                        </option>

                        <option value="fa-car" {{ $tienNghi->icon == 'fa-car' ? 'selected' : '' }}>🚗 Bãi đỗ xe</option>

                        <option value="fa-plane" {{ $tienNghi->icon == 'fa-plane' ? 'selected' : '' }}>✈️ Đưa đón sân
                            bay</option>

                        <option value="fa-elevator" {{ $tienNghi->icon == 'fa-elevator' ? 'selected' : '' }}>🛗 Thang
                            máy</option>

                        <option value="fa-bell-concierge"
                            {{ $tienNghi->icon == 'fa-bell-concierge' ? 'selected' : '' }}>🛎️ Lễ tân</option>

                        <option value="fa-shield-halved" {{ $tienNghi->icon == 'fa-shield-halved' ? 'selected' : '' }}>
                            🛡️ Bảo vệ</option>

                        <option value="fa-star" {{ $tienNghi->icon == 'fa-star' ? 'selected' : '' }}>⭐ Cao cấp</option>

                        <option value="fa-crown" {{ $tienNghi->icon == 'fa-crown' ? 'selected' : '' }}>👑 VIP</option>

                    </select>

                </div>

                <!-- Mô tả -->
                <div class="md:col-span-2">

                    <label class="font-medium text-slate-700">

                        Mô tả

                    </label>

                    <textarea name="mo_ta" rows="4"
                        class="w-full mt-2 border rounded-3xl px-5 py-3">{{ old('mo_ta',$tienNghi->mo_ta) }}</textarea>

                </div>

                <!-- Trạng thái -->
                <div>

                    <label class="font-medium text-slate-700">

                        Trạng thái

                    </label>

                    <select name="trang_thai" class="w-full mt-2 border rounded-full px-5 py-3">

                        <option value="1" {{ $tienNghi->trang_thai == 1 ? 'selected' : '' }}>

                            Hoạt động

                        </option>

                        <option value="0" {{ $tienNghi->trang_thai == 0 ? 'selected' : '' }}>

                            Tạm dừng

                        </option>

                    </select>

                </div>

            </div>

            <div class="flex flex-col md:flex-row gap-4 mt-8">

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                    Cập nhật

                </button>

                <a href="{{ route('admin.tiennghi.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl text-center">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection