<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getVendorOrders extends Controller
{
    //
    public function getVendorOrders(Request $request){ 

        $orderId  = $request->input('orderId');
        $vendorId   = $request->input('vendorId');

        if($vendorId == ''){
            return [
                "status"=>405,
                "message"=>'vendorId is Required',
            ];
        }else{
            if($orderId == ''){
                $result = DB::select("select * from orders where vendorId  = $vendorId");
                if($result){
                    return [
                        "status"=>200,
                        "orders"=>$result,
                    ];
                }else{
                    return [
                        "status"=>404,
                        "message"=>'No Orders Founded',
                    ];
                }
            }else{
                $result = DB::select("select * from orders where vendorId  = $vendorId and id  = $orderId");
                if($result){
                    return [
                        "status"=>200,
                        "orders"=>$result,
                    ];
                }else{
                    return [
                        "status"=>404,
                        "message"=>'No Orders Founded',
                    ];
                }
            }
        }
    }
}