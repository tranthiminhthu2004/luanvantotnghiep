<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Xác nhận đặt phòng</title>
</head>

<body style="margin:0;padding:30px;background:#f4f4f4;font-family:Arial,Helvetica,sans-serif;">

    @php

    $khachSan = $datPhong->khachSan;

    $thanhToan = $datPhong->thanhToan;

    $googleMaps = null;

    if(
    $khachSan &&
    $khachSan->vi_do &&
    $khachSan->kinh_do
    ){
    $googleMaps =
    "https://www.google.com/maps?q={$khachSan->vi_do},{$khachSan->kinh_do}";
    }

    @endphp

    <table width="700" align="center" cellpadding="0" cellspacing="0" style="
        background:#ffffff;
        border:1px solid #dddddd;
        border-radius:8px;
    ">

        <tr>

            <td style="padding:35px;">

                <h2 style="
        margin:0;
        color:#2563eb;
    ">

                    🏨 HOTEL BOOKING

                </h2>

                <p style="
        margin-top:20px;
        line-height:28px;
        color:#444444;
    ">

                    Xin chào

                    <b>

                        {{ $datPhong->ho_va_ten_dem_khach }}
                        {{ $datPhong->ten_khach }}

                    </b>

                    <br><br>

                    Đơn đặt phòng của bạn đã được tạo thành công.

                    Thông tin chi tiết như sau.

                </p>

                <hr style="
        margin:30px 0;
        border:none;
        border-top:1px solid #dddddd;
    ">

                <h3 style="
        margin:0 0 20px;
        color:#111827;
    ">

                    Chi tiết đơn đặt phòng

                </h3>

                <table width="100%" cellpadding="10" cellspacing="0" style="
        border-collapse:collapse;
    ">

                    <tr>

                        <td width="220">

                            <b>Mã đơn đặt phòng</b>

                        </td>

                        <td>

                            {{ $datPhong->ma_dat_phong }}

                        </td>

                    </tr>

                    <tr>

                        <td>

                            <b>Khách sạn</b>

                        </td>

                        <td>

                            {{ optional($khachSan)->ten_khach_san }}

                        </td>

                    </tr>

                    <tr>

                        <td>

                            <b>Địa chỉ</b>

                        </td>

                        <td>

                            {{ optional($khachSan)->dia_chi }}

                            @if($khachSan)

                            ,

                            {{ $khachSan->thanh_pho }}

                            @endif

                        </td>

                    </tr>

                    @if(optional($khachSan)->so_dien_thoai)

                    <tr>

                        <td>

                            <b>Số điện thoại khách sạn</b>

                        </td>

                        <td>

                            {{ $khachSan->so_dien_thoai }}

                        </td>

                    </tr>

                    @endif

                    <tr>

                        <td>

                            <b>Ngày đặt</b>

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($datPhong->ngay_dat)->format('d/m/Y H:i') }}

                        </td>

                    </tr>

                    <tr>

                        <td>

                            <b>Ngày nhận phòng</b>

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}

                        </td>

                    </tr>

                    <tr>

                        <td>

                            <b>Ngày trả phòng</b>

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}

                        </td>

                    </tr>

                    <tr>

                        <td valign="top">

                            <b>Loại phòng</b>

                        </td>

                        <td>

                            @foreach($datPhong->chiTietDatPhong as $chiTiet)

                            • {{ optional($chiTiet->loaiPhong)->ten_loai_phong }}

                            × {{ $chiTiet->so_luong_phong }} phòng

                            @if(!$loop->last)

                            <br><br>

                            @endif

                            @endforeach

                        </td>

                    </tr>

                    <tr>

                        <td valign="top">

                            <b>Số khách</b>

                        </td>

                        <td>

                            {{ $datPhong->so_nguoi_truong_thanh }} Người lớn

                            @if($datPhong->so_tre_em>0)

                            <br>

                            {{ $datPhong->so_tre_em }} Trẻ em

                            @endif

                            @if($datPhong->so_nguoi_cao_tuoi>0)

                            <br>

                            {{ $datPhong->so_nguoi_cao_tuoi }} Người cao tuổi

                            @endif

                        </td>

                    </tr>

                    {{-- PHẦN 2 BẮT ĐẦU TỪ ĐÂY --}}
                    <tr>

                        <td>

                            <b>Phương thức thanh toán</b>

                        </td>

                        <td>

                            {{ optional($thanhToan)->phuong_thuc_thanh_toan ?? 'Thanh toán tại khách sạn' }}

                        </td>

                    </tr>

                    <tr>

                        <td>

                            <b>Tổng tiền</b>

                        </td>

                        <td>

                            <b style="font-size:18px;color:#dc2626;">

                                {{ number_format($datPhong->tong_tien,0,',','.') }}đ

                            </b>

                        </td>

                    </tr>

                    <tr>

                        <td>

                            <b>Trạng thái</b>

                        </td>

                        <td>

                            @if($datPhong->trang_thai_dat_phong=='DaXacNhan')

                            <span style="
display:inline-block;
background:#dcfce7;
color:#15803d;
padding:4px 10px;
border-radius:4px;
">

                                Đã xác nhận

                            </span>

                            @elseif($datPhong->trang_thai_dat_phong=='ChoXacNhan')

                            <span style="
display:inline-block;
background:#fef3c7;
color:#b45309;
padding:4px 10px;
border-radius:4px;
">

                                Chờ xác nhận

                            </span>

                            @elseif($datPhong->trang_thai_dat_phong=='DaHuy')

                            <span style="
display:inline-block;
background:#fee2e2;
color:#dc2626;
padding:4px 10px;
border-radius:4px;
">

                                Đã hủy

                            </span>

                            @else

                            {{ $datPhong->trang_thai_dat_phong }}

                            @endif

                        </td>

                    </tr>

                    @if(!empty($datPhong->ghi_chu))

                    <tr>

                        <td valign="top">

                            <b>Ghi chú</b>

                        </td>

                        <td>

                            {{ $datPhong->ghi_chu }}

                        </td>

                    </tr>

                    @endif

                </table>

                @if($googleMaps)

                <p style="
margin-top:30px;
text-align:center;
">

                    <a href="{{ $googleMaps }}" target="_blank" style="
display:inline-block;
padding:12px 22px;
background:#2563eb;
color:white;
text-decoration:none;
border-radius:5px;
">

                        📍 Xem vị trí khách sạn

                    </a>

                </p>

                @endif

                <hr style="
margin:30px 0;
border:none;
border-top:1px solid #dddddd;
">

                <p style="
margin:0;
line-height:28px;
font-size:14px;
color:#555555;
">

                    <b>Lưu ý</b>

                    <br><br>

                    • Vui lòng mang theo CCCD hoặc Hộ chiếu khi nhận phòng.

                    <br>

                    • Có mặt đúng thời gian nhận phòng.

                    <br>

                    • Nếu đến muộn vui lòng liên hệ trực tiếp khách sạn.

                    <br>

                    • Nếu cần hỗ trợ vui lòng phản hồi email này hoặc liên hệ khách sạn.

                </p>

                <hr style="
margin:30px 0;
border:none;
border-top:1px solid #dddddd;
">

                <p style="
text-align:center;
font-size:13px;
color:#777777;
line-height:24px;
margin:0;
">

                    <b>{{ config('app.name') }}</b>

                    <br>

                    Email:
                    {{ config('mail.from.address') }}

                    @if(config('app.url'))

                    <br>

                    Website:
                    {{ config('app.url') }}

                    @endif

                    <br><br>

                    Cảm ơn bạn đã lựa chọn dịch vụ của chúng tôi.

                </p>

            </td>

        </tr>

    </table>

</body>

</html>