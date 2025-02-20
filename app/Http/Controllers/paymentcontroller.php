<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paymentcontroller extends Controller
{
    public function createPayment(Request $request)
    {
        $vnp_TmnCode = env('VNP_TMN_CODE'); 
        $vnp_HashSecret = env('VNP_HASH_SECRET'); 
        $vnp_Url = env('VNP_URL'); 
        $vnp_Returnurl = env('VNP_RETURN_URL'); 

        $vnp_TxnRef = time(); 
        $vnp_OrderInfo = "Thanh toán đơn hàng #$vnp_TxnRef";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $request->amount * 100; 
        $vnp_Locale = "vn";
        $vnp_BankCode = $request->bank_code; 
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (!empty($vnp_BankCode)) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";

        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function paymentReturn(Request $request)
{
    $vnp_HashSecret = env('VNP_HASH_SECRET'); 
    $inputData = $request->all();

    $vnp_SecureHash = $inputData['vnp_SecureHash'];
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    
    $hashData = "";
    $i = 0;
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

    if ($secureHash === $vnp_SecureHash) { 
        if ($request->vnp_ResponseCode == "00") {
            return view('vnpay_return', ['status' => 'success', 'message' => 'Thanh toán thành công!']);
        } else {
            return view('vnpay_return', ['status' => 'fail', 'message' => 'Thanh toán thất bại!']);
        }
    } else {
        return view('vnpay_return', ['status' => 'error', 'message' => 'Dữ liệu không hợp lệ!']);
    }
}
}