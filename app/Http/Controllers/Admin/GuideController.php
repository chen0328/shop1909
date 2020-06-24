<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Admin\Guide;

class GuideController extends CommonController
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
    //导航栏添加
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
                'url' => '/admin/guide/list'
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
    //导航栏展示
    public function list()
    {
        $info = Guide::where(['is_del'=>1])->orderBy('sorts','desc')->paginate(2);
        // var_dump($info);exit;
        return view('admin.guide.list',['info'=>$info]);
      

    }
    //导航栏删除
    public function del(Request $request)
    {
        $id = $request->id;
        // var_dump($id);die;
        $res = Guide::where('id',$id)->update(['is_del'=>2]);
        if($res){
            return $this->message('00000','删除成功','/admin/guide/list');
        }else{
            return $this->message('00001','删除失败','');
        }
    }
    //修改
    public function upd($id){
        // $id = $request->id;
        // var_dump($id);exit;
        $info = Guide::where('id',$id)->first();
        // var_dump($info);exit;
        return view('admin.guide.upd',['info'=>$info]);
    }
            
    public function upd_do($id){
        // var_dump($id);exit;
        $arr = request()->all();
        // var_dump($arr);exit;
        $data['gui_name'] = $arr['gui_name'];
        $data['url'] = $arr['url'];
        $data['sorts'] = $arr['sorts'];
        $data['is_show'] = $arr['is_show'];
        $data['addtime'] = time();
        $res = Guide::where('id',$id)->update($data);
        if($res !== false ){
            return $this->message('00000','修改成功','/admin/guide/list');
        }else{
            return $this->message('00001','修改失败','');
        }
    }
     /**
     * 即点即改
     */
    public function editsorts(Request $request){
        $data = $request->info;
        $id=$request->id;
        // var_dump($id,$data);
        $res = Guide::where('id',$id)->update(['sorts'=>$data]);
        if($res !== false){
            return $this->message('00000','修改成功','/admin/guide/list');
        }else{
            return $this->message('00001','修改失败','');
        }
    }
    public function edithidden(Request $request){
        $data = $request->val;
        $id=$request->id;
        // var_dump($id,$data);exit;
        $data = intval($data);
        $info = ['is_show'=>$data];
        // var_dump($info);exit;
        $res = Guide::where('id',$id)->update($info);
        // var_dump($res);exit;
        if($res !== false){
            return $this->message('00000','修改成功','/admin/guide/list');
        }else{
            return $this->message('00001','修改失败','');
        }
    }
}
