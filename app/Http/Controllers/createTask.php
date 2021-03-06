<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class createTask extends Controller
{
    public function createTask(Request $request){
        $task = new task();

        $task->server = $request->input('server');
        $task->orderNumber = $request->input('orderNumber');
        $task->driverId = $request->input('driverId');
        $task->driver = $request->input('driver');
        $task->dispatcherId = $request->input('dispatcherId');
        $task->clientName = $request->input('clientName');
        $task->clientPhone = $request->input('clientPhone');
        $task->itemCount = $request->input('itemCount');
        $task->price = $request->input('price');
        $task->vendorId = $request->input('vendorId');
        $task->vendor = $request->input('vendor');
        $task->branch = $request->input('branch');
        $task->lon = $request->input('lon');
        $task->lat = $request->input('lat');
        $task->address = $request->input('address');
        $task->start = $request->input('start');
        $task->end = $request->input('end');
        $task->comment = $request->input('comment');
        $task->status = $request->input('status');

        $result = DB::select("select * from tasks where orderNumber = '$task->orderNumber'");
        
        if($result){
            return [
                "status"=>408,
                "message"=>'Task Already Exist',
            ];
        }else{
            if($task->orderNumber == ''){
                return [
                    "status"=>405,
                    "message"=>'orderNumber is Required',
                ];
            }else if($task->driverId ==''){
                return [
                    "status"=>405,
                    "message"=>'driverId is Required',
                ];
            }else if($task->server ==''){
                return [
                    "status"=>405,
                    "message"=>'server is Required',
                ];
            }else if($task->dispatcherId ==''){
                return [
                    "status"=>405,
                    "message"=>'dispatcherId is Required',
                ];
            }else if($task->clientName ==''){
                return [
                    "status"=>405,
                    "message"=>'clientName is Required',
                ];
            }else if($task->clientPhone ==''){
                return [
                    "status"=>405,
                    "message"=>'clientPhone is Required',
                ];
            }else if($task->itemCount ==''){
                return [
                    "status"=>405,
                    "message"=>'itemCount is Required',
                ];
            }else if($task->driver ==''){
                return [
                    "status"=>405,
                    "message"=>'driver is Required',
                ];
            }else if($task->vendor ==''){
                return [
                    "status"=>405,
                    "message"=>'vendor is Required',
                ];
            }else if($task->price ==''){
                return [
                    "status"=>405,
                    "message"=>'price is Required',
                ];
            }else if($task->vendorId ==''){
                return [
                    "status"=>405,
                    "message"=>'vendorId is Required',
                ];
            }else if($task->branch ==''){
                return [
                    "status"=>405,
                    "message"=>'branch is Required',
                ];
            }else if($task->lon ==''){
                return [
                    "status"=>405,
                    "message"=>'lon is Required ( Longitude )',
                ];
            }else if($task->lat ==''){
                return [
                    "status"=>405,
                    "message"=>'lat is Required ( Latitude )',
                ];
            }else if($task->address ==''){
                return [
                    "status"=>405,
                    "message"=>'address is Required',
                ];
            }else if($task->start ==''){
                return [
                    "status"=>405,
                    "message"=>'start is Required',
                ];
            }else if($task->end ==''){
                return [
                    "status"=>405,
                    "message"=>'end is Required',
                ];
            }else if($task->comment ==''){
                return [
                    "status"=>405,
                    "message"=>'comment is Required',
                ];
            }else if($task->status ==''){
                return [
                    "status"=>405,
                    "message"=>'status is Required',
                ];
            }else{
                $result = $task->save();
                if($result){
                    return [
                        "status"=>200,
                        "message"=>'Task Created Successfully',
                    ];
                }else{
                    return [
                        "status"=>500,
                        "message"=>'Failed to Create Task',
                    ];
                }
            }
        }
    }
}