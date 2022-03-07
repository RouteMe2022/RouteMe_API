<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getDriverTasks extends Controller
{
    public function getDriverTasks(Request $request)
    {
        $driverId = $request->input('driverId');

        if($driverId == ''){
            return [
                "status"=>405,
                "message"=>'driverId is Required',
            ];
        }else{
            $result = DB::select("select * from tasks where driverId  = $driverId");

            if ($result){
                return response(
                    json_encode($result),
                    200,
                    [
                        'Content-Type' => 'application/json;charset=UTF-8',
                    ],
                );
            }else {
                return [
                    "status"=>404,
                    "message"=>'No Task Found',
                ];
            }
        }
    }
}