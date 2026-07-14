<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Xác nhận đặt phòng</title>
</head>

<body style="margin:0;padding:30px;background:#f5f5f5;font-family:Arial,Helvetica,sans-serif;color:#333;">

    @php
    $khachSan = $datPhong->khachSan;

    $thanhToan = $datPhong->thanhToans
    ->sortByDesc('ngay_thanh_toan')
    ->first();

    $tongTien = (float) $datPhong->tong_tien;

    $soTienDaThanhToan = $datPhong->thanhToans
    ->where('trang_thai_thanh_toan', 'ThanhCong')
    ->sum('so_tien');

    $soTienConLai = max(
    $tongTien - $soTienDaThanhToan,
    0
    );
    @endphp

    <table width="700" align="center" cellpadding="0" cellspacing="0"
        style="background:#fff;border:1px solid #ddd;border-collapse:collapse;">

        <tr>
            <td style="padding:30px;">

                <h2 style="margin:0;color:#2563eb;">Chi tiết đơn đặt phòng </h2>

                <p style="margin:25px 0 10px;line-height:28px;">
                    Xin chào <b>{{ trim($datPhong->ho_va_ten_dem_khach.' '.$datPhong->ten_khach) }}</b>,
                </p>

                <p style="margin:0 0 25px;line-height:28px;">
                    Cảm ơn bạn đã sử dụng dịch vụ của Hotel Booking.
                    Đơn đặt phòng của bạn đã được tạo thành công.
                    Vui lòng kiểm tra thông tin bên dưới.
                </p>

                <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;">

                    <tr>
                        <td colspan="2"
                            style="padding:10px 0;font-size:18px;font-weight:bold;color:#2563eb;border-bottom:1px solid #ddd;">
                            THÔNG TIN ĐẶT PHÒNG
                        </td>
                    </tr>

                    <tr>
                        <td width="220"><b>Mã đơn đặt phòng</b></td>
                        <td>{{ $datPhong->ma_dat_phong }}</td>
                    </tr>

                    <tr>
                        <td><b>Ngày đặt</b></td>
                        <td>{{ \Carbon\Carbon::parse($datPhong->ngay_dat)->format('d/m/Y H:i') }}</td>
                    </tr>

                    <tr>
                        <td><b>Trạng thái</b></td>
                        <td>
                            @if($datPhong->trang_thai_dat_phong == 'DaXacNhan')
                            Đã xác nhận
                            @elseif($datPhong->trang_thai_dat_phong == 'DaHuy')
                            Đã hủy
                            @else
                            {{ $datPhong->trang_thai_dat_phong }}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td><b>Phương thức thanh toán</b></td>
                        <td>{{ optional($thanhToan)->phuong_thuc_thanh_toan ?? 'Thanh toán tại khách sạn' }}</td>
                    </tr>

                    <tr>
                        <td colspan="2"
                            style="padding:25px 0 10px;font-size:18px;font-weight:bold;color:#2563eb;border-bottom:1px solid #ddd;">
                            THÔNG TIN KHÁCH SẠN
                        </td>
                    </tr>

                    <tr>
                        <td><b>Khách sạn</b></td>
                        <td>{{ optional($khachSan)->ten_khach_san }}</td>
                    </tr>

                    <tr>
                        <td valign="top"><b>Địa chỉ</b></td>
                        <td>
                            {{ optional($khachSan)->dia_chi }}
                            @if($khachSan)
                            <br>{{ $khachSan->thanh_pho }}
                            @endif
                        </td>
                    </tr>

                    @if(optional($khachSan)->so_dien_thoai)
                    <tr>
                        <td><b>Số điện thoại</b></td>
                        <td>{{ $khachSan->so_dien_thoai }}</td>
                    </tr>
                    @endif

                    @if(optional($khachSan)->email)
                    <tr>
                        <td><b>Email</b></td>
                        <td>{{ $khachSan->email }}</td>
                    </tr>
                    @endif

                    <tr>
                        <td><b>Ngày nhận phòng</b></td>
                        <td>{{ \Carbon\Carbon::parse($datPhong->ngay_nhan_phong)->format('d/m/Y') }}</td>
                    </tr>

                    <tr>
                        <td><b>Giờ nhận phòng</b></td>
                        <td>{{ \Carbon\Carbon::parse($khachSan->gio_check_in)->format('H:i') }}</td>
                    </tr>

                    <tr>
                        <td><b>Ngày trả phòng</b></td>
                        <td>{{ \Carbon\Carbon::parse($datPhong->ngay_tra_phong)->format('d/m/Y') }}</td>
                    </tr>

                    <tr>
                        <td><b>Giờ trả phòng</b></td>
                        <td>{{ \Carbon\Carbon::parse($khachSan->gio_check_out)->format('H:i') }}</td>
                    </tr>

                    <tr>
                        <td colspan="2"
                            style="padding:25px 0 10px;font-size:18px;font-weight:bold;color:#2563eb;border-bottom:1px solid #ddd;">
                            THÔNG TIN KHÁCH
                        </td>
                    </tr>
                    <tr>
                        <td><b>Người lớn</b></td>
                        <td>{{ $datPhong->so_nguoi_truong_thanh }}</td>
                    </tr>

                    @if($datPhong->so_tre_em > 0)
                    <tr>
                        <td><b>Trẻ em</b></td>
                        <td>{{ $datPhong->so_tre_em }}</td>
                    </tr>
                    @endif

                    @if($datPhong->so_nguoi_cao_tuoi > 0)
                    <tr>
                        <td><b>Người cao tuổi</b></td>
                        <td>{{ $datPhong->so_nguoi_cao_tuoi }}</td>
                    </tr>
                    @endif

                    <tr>
                        <td><b>Tổng số khách</b></td>
                        <td>
                            {{ $datPhong->so_nguoi_truong_thanh + $datPhong->so_tre_em + $datPhong->so_nguoi_cao_tuoi }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"
                            style="padding:25px 0 10px;font-size:18px;font-weight:bold;color:#2563eb;border-bottom:1px solid #ddd;">
                            CHI TIẾT PHÒNG
                        </td>
                    </tr>

                    @foreach($datPhong->chiTietDatPhong as $chiTiet)

                    <tr>
                        <td><b>Loại phòng</b></td>
                        <td>{{ optional($chiTiet->loaiPhong)->ten_loai_phong }}</td>
                    </tr>

                    <tr>
                        <td><b>Số lượng</b></td>
                        <td>{{ $chiTiet->so_luong_phong }} phòng</td>
                    </tr>

                    <tr>
                        <td><b>Đơn giá</b></td>
                        <td>{{ number_format($chiTiet->gia_dat_thuc_te,0,',','.') }}đ</td>
                    </tr>

                    <tr>
                        <td><b>Số đêm</b></td>
                        <td>{{ $chiTiet->so_dem }}</td>
                    </tr>

                    <tr>
                        <td><b>Thành tiền</b></td>
                        <td>
                            <b style="color:#dc2626;">
                                {{ number_format($chiTiet->thanh_tien,0,',','.') }}đ
                            </b>
                        </td>
                    </tr>

                    @if(!$loop->last)
                    <tr>
                        <td colspan="2" style="padding:12px 0;border-bottom:1px dashed #cccccc;"></td>
                    </tr>
                    @endif

                    @endforeach

                    <tr>
                        <td colspan="2"
                            style="padding:25px 0 10px;font-size:18px;font-weight:bold;color:#2563eb;border-bottom:1px solid #ddd;">
                            THANH TOÁN
                        </td>
                    </tr>

                    <tr>
                        <td><b>Phương thức</b></td>
                        <td>{{ optional($thanhToan)->phuong_thuc_thanh_toan ?? 'Thanh toán tại khách sạn' }}</td>
                    </tr>
                    <tr>
                        <td><b>Hình thức thanh toán</b></td>
                        <td>
                            @if(optional($thanhToan)->loai_thanh_toan == 'Coc30')
                            Đặt cọc 30%
                            @elseif(optional($thanhToan)->loai_thanh_toan == 'ThanhToanToanBo')
                            Thanh toán toàn bộ
                            @else
                            {{ optional($thanhToan)->loai_thanh_toan }}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td><b>Tổng tiền đặt phòng</b></td>
                        <td>{{ number_format($tongTien, 0, ',', '.') }}đ</td>
                    </tr>

                    <tr>
                        <td><b>Số tiền đã thanh toán</b></td>
                        <td>
                            <b style="color:#16a34a;">
                                {{ number_format($soTienDaThanhToan, 0, ',', '.') }}đ
                            </b>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Số tiền còn lại phải thanh toán</b></td>
                        <td>
                            <b style="color:#dc2626;">
                                {{ number_format($soTienConLai, 0, ',', '.') }}đ
                            </b>
                        </td>
                    </tr>

                    @if($thanhToan)

                    <tr>
                        <td><b>Trạng thái thanh toán</b></td>
                        <td>{{ $thanhToan->trang_thai_thanh_toan }}</td>
                    </tr>

                    @if($thanhToan->ma_giao_dich)

                    <tr>
                        <td><b>Mã giao dịch</b></td>
                        <td>{{ $thanhToan->ma_giao_dich }}</td>
                    </tr>

                    @endif

                    @endif

                    <tr>
                        <td colspan="2"
                            style="padding:25px 0 10px;font-size:18px;font-weight:bold;color:#2563eb;border-bottom:1px solid #ddd;">
                            LƯU Ý
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="line-height:28px;padding-top:10px;">
                            • Vui lòng mang theo CCCD hoặc Hộ chiếu khi nhận phòng.<br>
                            • Có mặt đúng thời gian nhận phòng để được hỗ trợ nhanh nhất.<br>
                            • Nếu đến muộn vui lòng liên hệ trực tiếp khách sạn.<br>
                            • Chính sách hủy phòng sẽ được áp dụng theo quy định của khách sạn.
                        </td>
                    </tr>

                    @if($khachSan && $khachSan->vi_do && $khachSan->kinh_do)

                    <tr>
                        <td colspan="2" style="padding-top:20px;text-align:center;">

                            <a href="https://www.google.com/maps?q={{ $khachSan->vi_do }},{{ $khachSan->kinh_do }}"
                                target="_blank"
                                style="display:inline-block;padding:10px 18px;background:#2563eb;color:#fff;text-decoration:none;border-radius:4px;margin-right:10px;">

                                📍 Xem vị trí khách sạn

                            </a>

                            <a href="#" target="_blank"
                                style="display:inline-block;padding:10px 18px;background:#16a34a;color:#fff;text-decoration:none;border-radius:4px;">

                                🔍 Tra cứu đơn đặt phòng

                            </a>

                        </td>
                    </tr>

                    @endif

                </table>


            </td>
        </tr>

    </table>

</body>

</html>