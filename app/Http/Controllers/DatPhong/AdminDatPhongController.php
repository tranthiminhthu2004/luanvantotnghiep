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
use App\Services\DatPhongService;

class AdminDatPhongController extends Controller
{
    protected $phongService;
    protected $datPhongService;

   public function __construct(
    PhongService $phongService,
    DatPhongService $datPhongService
)
{
    $this->phongService = $phongService;
    $this->datPhongService = $datPhongService;
}

    public function index()
{
    $query = DatPhong::with([
        'nguoiDung',
        'khachSan'
    ]);

    if(request('ma_dat_phong'))
    {
        $query->where(
            'ma_dat_phong',
            'like',
            '%' . request('ma_dat_phong') . '%'
        );
    }

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

    if(request('ma_khach_san'))
    {
        $query->where(
            'ma_khach_san',
            request('ma_khach_san')
        );
    }

    if(request('trang_thai_dat_phong'))
    {
        $query->where(
            'trang_thai_dat_phong',
            request('trang_thai_dat_phong')
        );
    }
    
    $query->orderBy(
        'ma_don_dat_phong',
        request('sap_xep','desc')
    );

    $datPhongs = $query
        ->paginate(10)
        ->withQueryString();

    $tongDon = DatPhong::count();

   $daXacNhan = DatPhong::where(
    'trang_thai_dat_phong',
    'DaXacNhan'
)->count();

$daNhanPhong = DatPhong::where(
    'trang_thai_dat_phong',
    'DaNhanPhong'
)->count();

$daTraPhong = DatPhong::where(
    'trang_thai_dat_phong',
    'DaTraPhong'
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
            'daXacNhan',
            'daNhanPhong',
            'daTraPhong',
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

        'ma_khach_san' =>
            'required|exists:khach_san,ma_khach_san',

        'ngay_nhan_phong' =>
            'required|date|after_or_equal:today',

        'ngay_tra_phong' =>
            'required|date|after:ngay_nhan_phong',

    ], [

        'ma_khach_san.required' =>
            'Vui lòng chọn khách sạn.',

        'ma_khach_san.exists' =>
            'Khách sạn không tồn tại.',

        'ngay_nhan_phong.required' =>
            'Vui lòng chọn ngày nhận phòng.',

        'ngay_nhan_phong.date' =>
            'Ngày nhận phòng không hợp lệ.',

        'ngay_nhan_phong.after_or_equal' =>
            'Ngày nhận phòng phải từ hôm nay trở đi.',

        'ngay_tra_phong.required' =>
            'Vui lòng chọn ngày trả phòng.',

        'ngay_tra_phong.date' =>
            'Ngày trả phòng không hợp lệ.',

        'ngay_tra_phong.after' =>
            'Ngày trả phòng phải sau ngày nhận phòng.',

    ]);

    $loaiPhongs = LoaiPhong::where(
        'ma_khach_san',
        $request->ma_khach_san
    )->get();

    $ketQua = [];

    foreach ($loaiPhongs as $loaiPhong)
    {
        $soPhongConLai =
            $this->phongService
            ->demSoPhongConLai(

                $loaiPhong->ma_loai_phong,

                $request->ngay_nhan_phong,

                $request->ngay_tra_phong

            );

        if ($soPhongConLai > 0)
        {
            $ketQua[] = [

                'loaiPhong' => $loaiPhong,

                'soPhongConLai' => $soPhongConLai

            ];
        }
    }

    if (empty($ketQua))
    {
        return back()
            ->withInput()
            ->with(
                'error',
                'Không còn loại phòng trống trong khoảng thời gian này.'
            );
    }

    session([
    'duLieuDatPhong' => $request->all()
]);
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
    $request->validate([

        'ma_khach_san' =>
            'required|exists:khach_san,ma_khach_san',

        'ho_va_ten_dem_khach' =>
            'nullable|max:100',

        'ten_khach' =>
            'required|max:50',

        'email_khach' =>
            'required|email|max:191',

        'so_dien_thoai_khach' =>
            'required|digits_between:10,11',

        'ngay_nhan_phong' =>
            'required|date|after_or_equal:today',

        'ngay_tra_phong' =>
            'required|date|after:ngay_nhan_phong',

        'so_nguoi_truong_thanh' =>
            'required|integer|min:1',

        'so_tre_em' =>
            'nullable|integer|min:0',

        'so_nguoi_cao_tuoi' =>
            'nullable|integer|min:0',

        'ghi_chu' =>
            'nullable|max:500',

        'loai_phong' =>
            'required|array|min:1',

    ], [

        'ma_khach_san.required' =>
            'Vui lòng chọn khách sạn.',

        'ma_khach_san.exists' =>
            'Khách sạn không tồn tại.',

        'ten_khach.required' =>
            'Vui lòng nhập tên khách.',

        'ten_khach.max' =>
            'Tên khách không được vượt quá 50 ký tự.',

        'email_khach.required' =>
            'Vui lòng nhập email.',

        'email_khach.email' =>
            'Email không đúng định dạng.',

        'so_dien_thoai_khach.required' =>
            'Vui lòng nhập số điện thoại.',

        'so_dien_thoai_khach.digits_between' =>
            'Số điện thoại phải từ 10 đến 11 số.',

        'ngay_nhan_phong.required' =>
            'Vui lòng chọn ngày nhận phòng.',

        'ngay_nhan_phong.after_or_equal' =>
            'Ngày nhận phòng phải từ hôm nay trở đi.',

        'ngay_tra_phong.required' =>
            'Vui lòng chọn ngày trả phòng.',

        'ngay_tra_phong.after' =>
            'Ngày trả phòng phải sau ngày nhận phòng.',

        'so_nguoi_truong_thanh.required' =>
            'Vui lòng nhập số người lớn.',

        'so_nguoi_truong_thanh.min' =>
            'Phải có ít nhất 1 người lớn.',

        'so_tre_em.min' =>
            'Số trẻ em không hợp lệ.',

        'so_nguoi_cao_tuoi.min' =>
            'Số người cao tuổi không hợp lệ.',

        'ghi_chu.max' =>
            'Ghi chú không được vượt quá 500 ký tự.',

        'loai_phong.required' =>
            'Vui lòng chọn ít nhất một loại phòng.',

    ]);

try {

    $soDem = Carbon::parse(
        $request->ngay_nhan_phong
    )->diffInDays(
        Carbon::parse(
            $request->ngay_tra_phong
        )
    );

    $chiTietPhong = [];

    foreach ($request->loai_phong as $maLoaiPhong)
    {
        $soLuong =
            (int) $request->so_luong[$maLoaiPhong];

        if ($soLuong <= 0)
        {
            continue;
        }

        $loaiPhong = LoaiPhong::findOrFail(
            $maLoaiPhong
        );

        $chiTietPhong[] = [

            'ma_loai_phong' =>
                $maLoaiPhong,

            'so_luong_phong' =>
                $soLuong,

            'gia_dat_thuc_te' =>
                $loaiPhong->gia_co_ban,

            'so_dem' =>
                $soDem,

            'thanh_tien' =>
                $loaiPhong->gia_co_ban
                * $soLuong
                * $soDem

        ];
    }

    $this->datPhongService->taoDonDatPhong([

        'ma_nguoi_dung' =>
            auth()->user()->ma_nguoi_dung,

        'ma_khach_san' =>
            $request->ma_khach_san,

        'ho_va_ten_dem_khach' =>
            $request->ho_va_ten_dem_khach,

        'ten_khach' =>
            $request->ten_khach,

        'email_khach' =>
            $request->email_khach,

        'so_dien_thoai_khach' =>
            $request->so_dien_thoai_khach,

        'ngay_nhan_phong' =>
            $request->ngay_nhan_phong,

        'ngay_tra_phong' =>
            $request->ngay_tra_phong,

        'so_nguoi_truong_thanh' =>
            $request->so_nguoi_truong_thanh,

        'so_tre_em' =>
            $request->so_tre_em ?? 0,

        'so_nguoi_cao_tuoi' =>
            $request->so_nguoi_cao_tuoi ?? 0,

        'ghi_chu' =>
            $request->ghi_chu,

        'chi_tiet_phong' =>
            $chiTietPhong

    ]);

    session()->forget(
        'duLieuDatPhong'
    );

    
        return redirect()
            ->route('admin.datphong.index')
            ->with(
                'success',
                'Đặt phòng thành công.'
            );

    }
    catch (\Exception $e)
    {
        DB::rollBack();

        return back()
            ->withInput()
            ->with(
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
    $request->validate([

        'trang_thai_dat_phong' =>
            'required|in:DaXacNhan,DaNhanPhong,DaTraPhong,DaHuy,KhongDen'

    ]);

    $datPhong = DatPhong::findOrFail($id);

    $trangThaiCu = $datPhong->trang_thai_dat_phong;

    $trangThaiMoi = $request->trang_thai_dat_phong;

    // Luồng chuyển trạng thái hợp lệ
   $hopLe = [

    'DaXacNhan' => [
        'DaNhanPhong',
        'DaHuy',
        'KhongDen'
    ],

    'DaNhanPhong' => [
        'DaTraPhong'
    ],

    'DaTraPhong' => [],

    'DaHuy' => [],

    'KhongDen' => []

];
    // Nếu chọn lại chính trạng thái hiện tại
    if ($trangThaiCu == $trangThaiMoi)
    {
        return back();
    }

    // Không cho chuyển sai nghiệp vụ
    if (!in_array($trangThaiMoi, $hopLe[$trangThaiCu]))
    {
        return back()->with(
            'error',
            'Không thể chuyển từ "' .
            $trangThaiCu .
            '" sang "' .
            $trangThaiMoi .
            '".'
        );
    }

    $datPhong->update([

        'trang_thai_dat_phong' =>

            $trangThaiMoi

    ]);

    return back()->with(

        'success',

        'Cập nhật trạng thái thành công.'

    );
}
public function show($id)
{
   $datPhong = DatPhong::with([
    'khachSan',
    'nguoiDung',
    'chiTietDatPhong.loaiPhong',
    'thanhToans'
])->findOrFail($id);

    return view(
        'admin.datphong.show',
        compact('datPhong')
    );
}

public function destroy($id)
{
    DB::beginTransaction();

    try {

        $datPhong = DatPhong::findOrFail($id);

        ChiTietDatPhong::where(
            'ma_don_dat_phong',
            $id
        )->delete();

        $datPhong->delete();

        DB::commit();

        return redirect()
            ->route('admin.datphong.index')
            ->with(
                'success',
                'Xóa đơn đặt phòng thành công.'
            );

    }
    catch (\Exception $e)
    {
        DB::rollBack();

        return back()->with(
            'error',
            'Không thể xóa đơn đặt phòng.'
        );
    }
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

        'ho_va_ten_dem_khach' =>
            'nullable|max:100',

        'ten_khach' =>
            'required|max:50',

        'email_khach' =>
            'required|email|max:191',

        'so_dien_thoai_khach' =>
            'required|digits_between:10,11',

        'ghi_chu' =>
            'nullable|max:500',

    ], [

        'ten_khach.required' =>
            'Vui lòng nhập tên khách.',

        'ten_khach.max' =>
            'Tên khách không được vượt quá 50 ký tự.',

        'email_khach.required' =>
            'Vui lòng nhập email.',

        'email_khach.email' =>
            'Email không đúng định dạng.',

        'email_khach.max' =>
            'Email không được vượt quá 191 ký tự.',

        'so_dien_thoai_khach.required' =>
            'Vui lòng nhập số điện thoại.',

        'so_dien_thoai_khach.digits_between' =>
            'Số điện thoại phải từ 10 đến 11 số.',

        'ghi_chu.max' =>
            'Ghi chú không được vượt quá 500 ký tự.'

    ]);

    $datPhong = DatPhong::findOrFail($id);

    $datPhong->update([

        'ho_va_ten_dem_khach' =>
            $request->ho_va_ten_dem_khach,

        'ten_khach' =>
            $request->ten_khach,

        'email_khach' =>
            $request->email_khach,

        'so_dien_thoai_khach' =>
            $request->so_dien_thoai_khach,

        'ghi_chu' =>
            $request->ghi_chu

    ]);

    return redirect()
        ->route(
            'admin.datphong.index'
        )
        ->with(
            'success',
            'Cập nhật đơn đặt phòng thành công.'
        );
}

}