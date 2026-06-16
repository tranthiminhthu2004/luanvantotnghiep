@extends('admin.trangchinh.admin')

@section('title','Thêm tiện nghi')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-3xl shadow p-6">

        <div class="mb-8">

            <h2 class="text-4xl font-bold text-[#061755]">

                Thêm tiện nghi mới

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

        <form action="{{ route('admin.tiennghi.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Tên tiện nghi -->
                <div>

                    <label class="font-medium text-slate-700">

                        Tên tiện nghi

                    </label>

                    <input type="text" name="ten_tien_nghi" value="{{ old('ten_tien_nghi') }}"
                        placeholder="Ví dụ: Wifi miễn phí" class="w-full mt-2 border rounded-full px-5 py-3">

                </div>


                <!-- Biểu tượng -->
                <div>

                    <label class="font-medium text-slate-700">

                        Biểu tượng

                    </label>

                    <select name="icon" class="w-full mt-2 border rounded-full px-5 py-3">

                        <!-- Tiện nghi phòng -->
                        <option value="fa-wifi">📶 Wifi</option>
                        <option value="fa-tv">📺 TV</option>
                        <option value="fa-couch">🛋️ Sofa</option>
                        <option value="fa-snowflake">❄️ Điều hòa</option>
                        <option value="fa-fan">🌀 Quạt</option>
                        <option value="fa-wind">💨 Thông gió</option>
                        <option value="fa-shower">🚿 Vòi sen</option>
                        <option value="fa-bath">🛁 Bồn tắm</option>
                        <option value="fa-toilet">🚽 Nhà vệ sinh</option>
                        <option value="fa-sink">🚰 Bồn rửa</option>
                        <option value="fa-towel">🧻 Khăn tắm</option>
                        <option value="fa-pump-soap">🧴 Xà phòng</option>
                        <option value="fa-coffee">☕ Cà phê</option>
                        <option value="fa-mug-hot">🍵 Trà nóng</option>

                        <!-- Dịch vụ -->
                        <option value="fa-utensils">🍴 Nhà hàng</option>
                        <option value="fa-champagne-glasses">🥂 Quầy bar</option>

                        <!-- Tiện ích -->
                        <option value="fa-water-ladder">🏊 Hồ bơi</option>
                        <option value="fa-dumbbell">🏋️ Phòng gym</option>
                        <option value="fa-spa">🌿 Spa</option>
                        <option value="fa-person-walking">🚶 Khu đi bộ</option>
                        <option value="fa-tree">🌳 Khu vườn</option>
                        <option value="fa-umbrella-beach">🏖️ Bãi biển</option>
                        <option value="fa-mountain">⛰️ View núi</option>
                        <option value="fa-water">🌊 View biển</option>

                        <!-- Di chuyển -->
                        <option value="fa-car">🚗 Bãi đỗ xe</option>
                        <option value="fa-bicycle">🚲 Cho thuê xe đạp</option>
                        <option value="fa-motorcycle">🏍️ Cho thuê xe máy</option>
                        <option value="fa-bus">🚌 Xe đưa đón</option>

                        <!-- Khác -->
                        <option value="fa-shirt">👕 Giặt ủi</option>
                        <option value="fa-elevator">🛗 Thang máy</option>
                        <option value="fa-camera">📷 Camera an ninh</option>
                        <option value="fa-shield-halved">🛡️ Bảo vệ</option>
                        <option value="fa-fire-extinguisher">🧯 PCCC</option>

                        <!-- Giải trí -->
                        <option value="fa-child">🧒 Khu vui chơi trẻ em</option>
                        <option value="fa-gamepad">🎮 Phòng giải trí</option>
                        <option value="fa-table-tennis-paddle-ball">🏓 Bóng bàn</option>
                        <option value="fa-volleyball">🏐 Sân thể thao</option>

                        <!-- Công việc -->
                        <option value="fa-book">📚 Thư viện</option>
                        <option value="fa-desktop">💻 Máy tính</option>
                        <option value="fa-print">🖨️ Máy in</option>
                        <option value="fa-briefcase">💼 Phòng họp</option>
                        <option value="fa-users">👥 Hội nghị</option>

                        <!-- Cao cấp -->
                        <option value="fa-crown">👑 VIP</option>
                        <option value="fa-star">⭐ Cao cấp</option>

                    </select>

                </div>

                <!-- Mô tả -->
                <div class="md:col-span-2">

                    <label class="font-medium text-slate-700">

                        Mô tả

                    </label>

                    <textarea name="mo_ta" rows="4" class="w-full mt-2 border rounded-3xl px-5 py-3"
                        placeholder="Nhập mô tả tiện nghi...">{{ old('mo_ta') }}</textarea>

                </div>

                <!-- Trạng thái -->
                <div>

                    <label class="font-medium text-slate-700">

                        Trạng thái

                    </label>

                    <select name="trang_thai" class="w-full mt-2 border rounded-full px-5 py-3">

                        <option value="1">

                            Hoạt động

                        </option>

                        <option value="0">

                            Tạm dừng

                        </option>

                    </select>

                </div>

            </div>

            <div class="flex flex-col md:flex-row gap-4 mt-8">

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                    Lưu tiện nghi

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