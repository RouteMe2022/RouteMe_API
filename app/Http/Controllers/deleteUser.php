<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class deleteUser extends Controller
{
    //
    public function deleteUser(Request $request){

        $id = $request->input('id');
        $type = $request->input('type');

        if($id == ''){
            return [
                "status"=>405,
                "message"=>'User id is Required'
            ];
        }else if($type == ''){
            return [
                "status"=>405,
                "message"=>'type is Required [ driver - dispatcher - vendor ]'
            ];
        }else{
            if($type == 'driver'){
                $result = DB::delete("delete from drivers where id = $id");
                if(!$result){
                    return [
                        "status"=>404,
                        "message"=>'Not Found'
                    ];
                }else{
                    return [
                        "status"=>200,
                        "message"=>'Driver Account Deleted Successfully'
                    ];
                }
            }else if($type == 'dispatcher'){
                $result = DB::delete("delete from dispatchers where id = $id");
                if(!$result){
                    return [
                        "status"=>404,
                        "message"=>'Not Found'
                    ];
                }else{
                    return [
                        "status"=>200,
                        "message"=>'Dispatcher Account Deleted Successfully'
                    ];
                }
            }else if($type == 'vendor'){
                $result = DB::delete("delete from vendors where id = $id");
                if(!$result){
                    return [
                        "status"=>404,
                        "message"=>'Not Found'
                    ];
                }else{
                    return [
                        "status"=>200,
                        "message"=>'Vendor Account Deleted Successfully'
                    ];
                }
            }
        }
    }
}