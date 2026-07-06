@extends('admin.trangchinh.admin')

@section('title','Thêm tiện nghi')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">

        <form action="{{ route('admin.tiennghi.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Tên tiện nghi -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Tên tiện nghi

                    </label>

                    <input type="text" name="ten_tien_nghi" value="{{ old('ten_tien_nghi') }}"
                        placeholder="Ví dụ: Wifi miễn phí"
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                    @error('ten_tien_nghi')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Biểu tượng -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Biểu tượng

                    </label>

                    <select name="icon" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                        <optgroup label="Tiện nghi phòng">

                            <option value="fa-wifi" {{ old('icon')=='fa-wifi' ? 'selected' : '' }}>📶 Wifi</option>

                            <option value="fa-tv" {{ old('icon')=='fa-tv' ? 'selected' : '' }}>📺 TV</option>

                            <option value="fa-snowflake" {{ old('icon')=='fa-snowflake' ? 'selected' : '' }}>❄️ Điều hòa
                            </option>

                            <option value="fa-shower" {{ old('icon')=='fa-shower' ? 'selected' : '' }}>🚿 Vòi sen
                            </option>

                            <option value="fa-bath" {{ old('icon')=='fa-bath' ? 'selected' : '' }}>🛁 Bồn tắm</option>

                            <option value="fa-toilet" {{ old('icon')=='fa-toilet' ? 'selected' : '' }}>🚽 Nhà vệ sinh
                            </option>

                            <option value="fa-towel" {{ old('icon')=='fa-towel' ? 'selected' : '' }}>🧻 Khăn tắm
                            </option>

                            <option value="fa-pump-soap" {{ old('icon')=='fa-pump-soap' ? 'selected' : '' }}>🧴 Đồ vệ
                                sinh</option>

                            <option value="fa-coffee" {{ old('icon')=='fa-coffee' ? 'selected' : '' }}>☕ Cà phê</option>

                            <option value="fa-mug-hot" {{ old('icon')=='fa-mug-hot' ? 'selected' : '' }}>🍵 Trà</option>

                        </optgroup>

                        <optgroup label="Dịch vụ">

                            <option value="fa-utensils" {{ old('icon')=='fa-utensils' ? 'selected' : '' }}>🍴 Nhà hàng
                            </option>

                            <option value="fa-champagne-glasses"
                                {{ old('icon')=='fa-champagne-glasses' ? 'selected' : '' }}>🥂 Quầy bar</option>

                            <option value="fa-shirt" {{ old('icon')=='fa-shirt' ? 'selected' : '' }}>👕 Giặt ủi</option>

                            <option value="fa-bus" {{ old('icon')=='fa-bus' ? 'selected' : '' }}>🚌 Xe đưa đón</option>

                        </optgroup>

                        <optgroup label="Tiện ích khách sạn">

                            <option value="fa-water-ladder" {{ old('icon')=='fa-water-ladder' ? 'selected' : '' }}>🏊 Hồ
                                bơi</option>

                            <option value="fa-dumbbell" {{ old('icon')=='fa-dumbbell' ? 'selected' : '' }}>🏋️ Phòng gym
                            </option>

                            <option value="fa-spa" {{ old('icon')=='fa-spa' ? 'selected' : '' }}>🌿 Spa</option>

                            <option value="fa-car" {{ old('icon')=='fa-car' ? 'selected' : '' }}>🚗 Bãi đỗ xe</option>

                            <option value="fa-elevator" {{ old('icon')=='fa-elevator' ? 'selected' : '' }}>🛗 Thang máy
                            </option>

                        </optgroup>

                        <optgroup label=" An toàn">

                            <option value="fa-camera" {{ old('icon')=='fa-camera' ? 'selected' : '' }}>📷 Camera an ninh
                            </option>

                            <option value="fa-shield-halved" {{ old('icon')=='fa-shield-halved' ? 'selected' : '' }}>🛡️
                                Bảo vệ</option>

                            <option value="fa-fire-extinguisher"
                                {{ old('icon')=='fa-fire-extinguisher' ? 'selected' : '' }}>🧯 PCCC</option>

                        </optgroup>

                    </select>

                </div>
                <!-- Mô tả -->
                <div class="md:col-span-2">

                    <label class="block text-base font-semibold text-black">

                        Mô tả

                    </label>

                    <textarea name="mo_ta" rows="4" placeholder="Nhập mô tả tiện nghi..."
                        class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">{{ old('mo_ta') }}</textarea>

                    @error('mo_ta')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                    @enderror

                </div>

                <!-- Trạng thái -->
                <div>

                    <label class="block text-base font-semibold text-black">

                        Trạng thái

                    </label>

                    <select name="trang_thai" class="w-full mt-2 border rounded-xl px-4 py-2.5 text-sm text-black">

                        <option value="1" {{ old('trang_thai',1)==1 ? 'selected' : '' }}>

                            Hoạt động

                        </option>

                        <option value="0" {{ old('trang_thai')==='0' ? 'selected' : '' }}>

                            Tạm dừng

                        </option>

                    </select>

                </div>

            </div>

            <!-- Button -->
            <div class="flex flex-wrap gap-3 mt-6">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full text-base font-semibold transition">

                    Lưu tiện nghi

                </button>

                <a href="{{ route('admin.tiennghi.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 text-black px-5 py-2.5 rounded-full text-base font-semibold transition">

                    Quay lại

                </a>

            </div>

        </form>

    </div>

</div>

@endsection