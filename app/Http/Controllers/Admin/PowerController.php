<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\PowerModel;
use Illuminate\Http\Request;

class PowerController extends CommonController
{
    public function power(Request $request){
        if($request->ajax()){
            $arr = $request->all();
            $res = PowerModel::insert($arr);
            if($res){
                return $this->message('00000','添加成功','/admin/showpower');
            }else{
                return $this->message('00001','添加失败','');
            }
        }else{
            return view('admin/power/index');
        }
    }
    public function showpower(){
        $info = PowerModel::where('is_del',1)->paginate(2);
        return view('admin/power/show',['info'=>$info]);
    }
    public function delpower(Request $request){
        $id = $request->id;
        $res = PowerModel::where('p_id',$id)->update(['is_del'=>2]);
        if($res){
            return $this->message('00000','删除成功','/admin/showpower');
        }else{
            return $this->message('00001','删除失败','');
        }
    }
    public function editpower($id){
       $info = PowerModel::where('p_id',$id)->first();
        return view('admin/power/edit',['info'=>$info]);
    }
    public function updpower(Request $request){
        $arr['p_name'] = $request->p_name;
        $arr['url'] = $request->url;
        $p_id = $request->p_id;
        $res = PowerModel::where('p_id',$p_id)->update($arr);
        if($res !== false){
            return $this->message('00000','修改成功','/admin/showpower');
        }else{
            return $this->message('00001','修改失败','');
        }
    }
}
