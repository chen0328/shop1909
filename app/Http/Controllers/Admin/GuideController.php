<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Guide;

class GuideController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
       return view('admin.guide.add');
    }
    public function add_do(Request $request)
    {
        $arr = $request->all();
        // var_dump($arr);exit;
        $data['gui_name'] = $arr['gui_name'];
        $data['url'] = $arr['url'];
        $data['sorts'] = $arr['sorts'];
        $data['is_show'] = $arr['is_show'];
        $data['addtime'] = time();
        $res = Guide::insert($data);
        if ($res) {
            $message = [
                'code' => '00000',
                'msg' => '添加成功',
                'url' => '/admin/shownav'
            ];
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        } else {
            $message = [
                'code' => '00001',
                'msg' => '添加失败',
                'url' => ''
            ];
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        }
    }
}
