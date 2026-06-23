<div class="bg-white rounded-2xl shadow p-6">

    <h2 class="text-2xl font-bold mb-5">
        Thông tin lưu trú
    </h2>

    <div class="grid md:grid-cols-3 gap-5">

        <div>
            <div class="text-gray-500">
                Ngày nhận phòng
            </div>

            <div class="font-semibold text-lg">
                {{ $ngayNhanPhong }}
            </div>
        </div>

        <div>
            <div class="text-gray-500">
                Ngày trả phòng
            </div>

            <div class="font-semibold text-lg">
                {{ $ngayTraPhong }}
            </div>
        </div>

        <div>
            <div class="text-gray-500">
                Số khách
            </div>

            <div class="font-semibold text-lg">
                {{ $tongNguoi }} khách
            </div>
        </div>

    </div>

</div>