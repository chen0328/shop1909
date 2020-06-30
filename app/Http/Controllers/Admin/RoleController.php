<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\PowerModel;
use App\Models\RoleModel;
use App\Models\RoleRightModel;
use Illuminate\Http\Request;

class RoleController extends CommonController
{
    public function role(Request $request){
        if($request->ajax()){
            $arr = $request->all();
            $res = RoleModel::insert($arr);
            if($res){
                return $this->message('00000','添加成功','/admin/showrole');
            }else{
                return $this->message('00001','添加失败','');
            }
        }else{
            return view('admin/role/index');
        }
    }
    public function showrole(){
        $info = RoleModel::where('is_del',1)->paginate(2);
        $p_data = RoleRightModel::leftjoin('power','roleright.p_id','=','power.p_id')->where('power.is_del',1)->get();
        return view('admin/role/show',['info'=>$info,'p_data'=>$p_data]);
    }
    public function delrole(){
        $role_id = request()->id;
//        echo $role_id;exit;
        $res = RoleModel::where('role_id',$role_id)->update(['is_del'=>2]);
        if($res){
            return $this->message('00000','删除成功','/admin/showrole');
        }else{
            return $this->message('00001','删除失败','');
        }
    }
    /**
     * 修改页面
     */
    public function editrole($id){
        $info = RoleModel::where('role_id',$id)->first();
        return view('admin/role/edit',['info'=>$info]);
    }
    /**
     * 修改功能
     */
    public function updrole(Request $request){
        $role_name = $request->role_name;
        $role_id = $request->role_id;
        $res = RoleModel::where('role_id',$role_id)->update(['role_name'=>$role_name]);
        if($res !== false){
            return $this->message('00000','修改成功','/admin/showrole');
        }else{
            return $this->message('00001','修改失败','');
        }
    }
    /**
     * 角色添加权限
     */
    public function roleright($id){
        $info = PowerModel::where('is_del',1)->get();
        $where=[
            ['role_id','=',$id],
            ['is_del','=',1]
        ];
        $data = RoleModel::where($where)->first();
        return view('admin/role/power',['role_id'=>$id,'info'=>$info,'data'=>$data]);
    }
    public function addroleright(Request $request){
        $p_id = $request->p_id;
        $role_id = $request->role_id;

        $p_id = explode(',',$p_id);
//        var_dump($p_id);exit;
        foreach($p_id as $k=>$v){
            $data = [
                'role_id'=>$role_id,
                'p_id'=>$v
            ];
//            $info = RoleRightModel::where('p_id',$p_id)->where('role_id',$role_id)->first();
//            if(!empty($info)){
//                return $this->message('00002','已经有该权限了','/admin/showrole');
//            }
            $res = RoleRightModel::insert($data);
        }
        if($res){
            return $this->message('00000','添加成功','/admin/showrole');
        }else{
            return $this->message('00001','添加失败','/admin/showrole');
        }
    }
}
