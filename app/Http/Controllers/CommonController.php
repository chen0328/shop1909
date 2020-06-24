<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    /**
     * 提示信息
     * @param $code
     * @param $msg
     * @param $url
     * @param array $data
     * @return string|void
     */
    public function message($code,$msg,$url,$data=[]){
        $message = [
            'code'=> $code,
            'msg'=> $msg,
            'url'=> $url,
            'data'=>$data
        ];
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
}
