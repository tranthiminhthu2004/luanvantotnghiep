<?php

namespace App\Http\Controllers\DatPhong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DatPhong;
use App\Models\KhachSan;
use App\Services\PhongService;
use App\Models\LoaiPhong;
use App\Models\ChiTietDatPhong;
use App\Models\LichPhong;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDatPhongController extends Controller
{
     protected $phongService;

    public function __construct(
        PhongService $phongService
    )
    {
        $this->phongService = $phongService;
    }
    public function index()
{
    $query = DatPhong::with([
        'nguoiDung',
        'khachSan'
    ]);

    // Mã đặt phòng
    if(request('ma_dat_phong'))
    {
        $query->where(
            'ma_dat_phong',
            'like',
            '%' . request('ma_dat_phong') . '%'
        );
    }

    // Khách hàng
    if(request('khach_hang'))
    {
        $query->where(function($q){

            $q->where(
                'ho_va_ten_dem_khach',
                'like',
                '%' . request('khach_hang') . '%'
            )
            ->orWhere(
                'ten_khach',
                'like',
                '%' . request('khach_hang') . '%'
            );

        });
    }

    // Khách sạn
    if(request('ma_khach_san'))
    {
        $query->where(
            'ma_khach_san',
            request('ma_khach_san')
        );
    }

    // Trạng thái
    if(request('trang_thai_dat_phong'))
    {
        $query->where(
            'trang_thai_dat_phong',
            request('trang_thai_dat_phong')
        );
    }

    // Sắp xếp
    $query->orderBy(
        'ma_don_dat_phong',
        request('sap_xep','desc')
    );

    $datPhongs = $query
        ->paginate(10)
        ->withQueryString();

    // Thống kê
    $tongDon = DatPhong::count();

    $choXacNhan = DatPhong::where(
        'trang_thai_dat_phong',
        'ChoXacNhan'
    )->count();

    $daXacNhan = DatPhong::where(
        'trang_thai_dat_phong',
        'DaXacNhan'
    )->count();

    $hoanThanh = DatPhong::where(
        'trang_thai_dat_phong',
        'HoanThanh'
    )->count();

    $daHuy = DatPhong::where(
        'trang_thai_dat_phong',
        'DaHuy'
    )->count();

    $khongDen = DatPhong::where(
        'trang_thai_dat_phong',
        'KhongDen'
    )->count();

    $khachSans = KhachSan::all();

    return view(
        'admin.datphong.index',
        compact(
            'datPhongs',
            'tongDon',
            'choXacNhan',
            'daXacNhan',
            'hoanThanh',
            'daHuy',
            'khongDen',
            'khachSans'
        )
    );
}

    public function create()
    {
        $khachSans = KhachSan::all();

        return view(
            'admin.datphong.create',
            compact('khachSans')
        );
    }
    public function kiemTraPhong(Request $request)
{
    $request->validate([

        'ma_khach_san' => 'required',

        'ngay_nhan_phong' =>
        'required|date|after_or_equal:today',

    'ngay_tra_phong' =>
        'required|date|after:ngay_nhan_phong'

    ]);

    $loaiPhongs = LoaiPhong::where(
        'ma_khach_san',
        $request->ma_khach_san
    )->get();

    $ketQua = [];

    foreach($loaiPhongs as $loaiPhong)
    {
        $soPhongConLai =
            $this->phongService
            ->demSoPhongConLai(
                $loaiPhong->ma_loai_phong,
                $request->ngay_nhan_phong,
                $request->ngay_tra_phong
            );

        if($soPhongConLai > 0)
        {
            $ketQua[] = [

                'loaiPhong' => $loaiPhong,

                'soPhongConLai' => $soPhongConLai

            ];
        }
    }

    return view(
        'admin.datphong.chonloaiphong',
        [
            'ketQua' => $ketQua,
            'duLieuDatPhong' => $request->all()
        ]
    );
}
public function store(Request $request)
{
    DB::beginTransaction();

    try {

        $datPhong = DatPhong::create([

            'ma_nguoi_dung' => auth()->user()->ma_nguoi_dung,

            'ma_khach_san' => $request->ma_khach_san,

            'ho_va_ten_dem_khach' => $request->ho_va_ten_dem_khach,

            'ten_khach' => $request->ten_khach,

            'email_khach' => $request->email_khach,

            'so_dien_thoai_khach' => $request->so_dien_thoai_khach,

            'ngay_nhan_phong' => $request->ngay_nhan_phong,

            'ngay_tra_phong' => $request->ngay_tra_phong,

            'so_nguoi_truong_thanh' => $request->so_nguoi_truong_thanh,

            'so_tre_em' => $request->so_tre_em,

            'so_nguoi_cao_tuoi' => $request->so_nguoi_cao_tuoi,

            'tong_tien' => 0,

            'trang_thai_dat_phong' => 'ChoXacNhan',

            'ngay_dat' => now()
            
        ]);
        $datPhong->update([

    'ma_dat_phong' =>
        'DP' .
        str_pad(
            $datPhong->ma_don_dat_phong,
            6,
            '0',
            STR_PAD_LEFT
        )

]);

        $tongTien = 0;

        $soDem =
            Carbon::parse(
                $request->ngay_nhan_phong
            )->diffInDays(
                Carbon::parse(
                    $request->ngay_tra_phong
                )
            );

        foreach ($request->loai_phong as $maLoaiPhong)
        {
            $soLuong =
                $request->so_luong[$maLoaiPhong];

            $loaiPhong =
                LoaiPhong::findOrFail(
                    $maLoaiPhong
                );

            $thanhTien =
                $loaiPhong->gia_co_ban
                * $soLuong
                * $soDem;

            ChiTietDatPhong::create([

                'ma_don_dat_phong'
                    => $datPhong->ma_don_dat_phong,

                'ma_loai_phong'
                    => $maLoaiPhong,

                'so_luong_phong'
                    => $soLuong,

                'gia_dat_thuc_te'
                    => $loaiPhong->gia_co_ban,

                'so_dem'
                    => $soDem,

                'thanh_tien'
                    => $thanhTien
            ]);

            $tongTien += $thanhTien;

            $phongTrong =
                $this->phongService
                ->timPhongTrong(

                    $maLoaiPhong,

                    $request->ngay_nhan_phong,

                    $request->ngay_tra_phong,

                    $soLuong
                );

            foreach ($phongTrong as $phong)
            {
                $ngay =
                    Carbon::parse(
                        $request->ngay_nhan_phong
                    );

                while (
                    $ngay <
                    Carbon::parse(
                        $request->ngay_tra_phong
                    )
                )
                {
                    LichPhong::create([

                        'ma_phong'
                            => $phong->ma_phong,

                        'ngay'
                            => $ngay->format('Y-m-d'),

                        'trang_thai'
                            => 'DaDat'
                    ]);

                    $ngay->addDay();
                }
            }
        }

        $datPhong->update([

            'tong_tien' => $tongTien

        ]);

        DB::commit();

       return redirect()
    ->route('admin.datphong.index')
    ->with(
        'success',
        'Đặt phòng thành công'
    );
    }
    catch (\Exception $e)
    {
        DB::rollBack();

        return back()->with(
            'error',
            $e->getMessage()
        );
    }
}
public function capNhatTrangThai(
    Request $request,
    $id
)
{
    $datPhong = DatPhong::findOrFail($id);

    $datPhong->update([
        'trang_thai_dat_phong'
            => $request->trang_thai_dat_phong
    ]);

    return back()->with(
        'success',
        'Cập nhật trạng thái thành công'
    );
}
public function show($id)
{
    $datPhong = DatPhong::with([
        'khachSan',
        'nguoiDung',
        'chiTietDatPhong.loaiPhong'
    ])->findOrFail($id);

    return view(
        'admin.datphong.show',
        compact('datPhong')
    );
}
public function destroy($id)
{
    $datPhong = DatPhong::findOrFail($id);

    ChiTietDatPhong::where(
        'ma_don_dat_phong',
        $id
    )->delete();

    $datPhong->delete();

    return redirect()
        ->route('admin.datphong.index')
        ->with(
            'success',
            'Xóa đơn đặt phòng thành công'
        );
}
public function edit($id)
{
    $datPhong = DatPhong::with([
        'khachSan',
        'chiTietDatPhong.loaiPhong'
    ])->findOrFail($id);

    return view(
        'admin.datphong.edit',
        compact('datPhong')
    );
}
public function update(
    Request $request,
    $id
)
{
    $request->validate([

        'ho_va_ten_dem_khach'
            => 'required',

        'ten_khach'
            => 'required',

        'email_khach'
            => 'required|email',

        'so_dien_thoai_khach'
            => 'required'
    ]);

    $datPhong = DatPhong::findOrFail($id);

    $datPhong->update([

        'ho_va_ten_dem_khach'
            => $request->ho_va_ten_dem_khach,

        'ten_khach'
            => $request->ten_khach,

        'email_khach'
            => $request->email_khach,

        'so_dien_thoai_khach'
            => $request->so_dien_thoai_khach

    ]);

    return redirect()
        ->route(
            'admin.datphong.index'
        )
        ->with(
            'success',
            'Cập nhật đơn đặt phòng thành công'
        );
}
}