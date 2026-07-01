<?php

namespace App\Services;

class VNPayService
{
protected $tmnCode;

    protected $hashSecret;

    protected $url;

    protected $returnUrl;
    

    public function __construct()
    {
        $this->tmnCode = config('services.vnpay.tmn_code');

        $this->hashSecret = config('services.vnpay.hash_secret');

        $this->url = config('services.vnpay.url');

        $this->returnUrl = config('services.vnpay.return_url');
    }
    public function createPaymentUrl(
    $maDonDatPhong,
    $soTien,
    $moTa
)
{
    $vnpData = [

        'vnp_Version' => '2.1.0',

        'vnp_Command' => 'pay',

        'vnp_TmnCode' => $this->tmnCode,

        'vnp_Amount' => $soTien * 100,

        'vnp_CurrCode' => 'VND',

        'vnp_TxnRef' => $maDonDatPhong,

        'vnp_OrderInfo' => $moTa,

        'vnp_OrderType' => 'other',

        'vnp_Locale' => 'vn',

        'vnp_ReturnUrl' => $this->returnUrl,

        'vnp_IpAddr' => request()->ip(),

        'vnp_CreateDate' => date('YmdHis'),
        'vnp_ExpireDate' => date('YmdHis',strtotime('+15 minutes')),
    ];

    ksort($vnpData);

   $query = '';

$hashData = '';

foreach ($vnpData as $key => $value) {
    $hashData .= ($hashData ? '&' : '') . urlencode($key) . "=" . urlencode($value);
    $query .= urlencode($key) . "=" . urlencode($value) . "&";
}

$query = rtrim($query, '&');

$secureHash = hash_hmac(
    'sha512',
    $hashData,
    $this->hashSecret
);

$url = $this->url
    . '?'
    . $query
    . '&vnp_SecureHash='
    . $secureHash;

return $url;
}
public function verifyResponse(array $input)
{
    $vnpSecureHash = $input['vnp_SecureHash'] ?? '';

    unset($input['vnp_SecureHash']);
    unset($input['vnp_SecureHashType']);

    ksort($input);

    $hashData = '';

    foreach ($input as $key => $value) {
        $hashData .= ($hashData ? '&' : '') . urlencode($key) . '=' . urlencode($value);
    }

    $secureHash = hash_hmac(
        'sha512',
        $hashData,
        $this->hashSecret
    );

    return hash_equals($secureHash, $vnpSecureHash);
}
}