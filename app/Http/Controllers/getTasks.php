<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getTasks extends Controller
{
    public function getTasks(Request $request)
    {
        $dispatcherId = $request->input('dispatcherId');

        if($dispatcherId == ''){
            return [
                "status"=>405,
                "message"=>'dispatcherId is Required',
            ];
        }else{
            $result = DB::select("select * from tasks where dispatcherId  = $dispatcherId");

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