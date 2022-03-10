<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use App\Models\order;

class taskStatus extends Controller
{
    public function taskStatus(Request $request){

        $taskId = $request->input('taskId');
        $orderId = $request->input('orderId');
        $taskStatus = $request->input('status');
        $orderStatus = $request->input('state');

        if($taskId == ''){
            return [
                "status"=>405,
                "message"=>'taskId is Required',
            ];
        }else if($orderId == ''){
            return [
                "status"=>405,
                "message"=>'orderId is Required',
            ];
        }else if($taskStatus == ''){
            return [
                "status"=>405,
                "message"=>'taskStatus is Required',
            ];
        }else if($orderStatus == ''){
            return [
                "status"=>405,
                "message"=>'orderStatus is Required',
            ];
        }else{
            if(!is_null(Task::find($taskId))){
                $task = Task::find($taskId);
                $result = $task->update($request->all());
                if($result){
                    return [
                        "status"=>200,
                        "message"=>'Task Status Updated Successfully',
                    ];
                }else{
                    return [
                        "status"=>404,
                        "message"=>'Task not Found',
                    ];
                }
            }
            if(!is_null(Order::find($orderId))){
                $order = Order::find($orderId);
                $result = $order->update($request->all());
                if($result){
                    return [
                        "status"=>200,
                        "message"=>'Order Status Updated Successfully',
                    ];
                }else{
                    return [
                        "status"=>404,
                        "message"=>'Order not Found',
                    ];
                }
            }
        }
    }
}