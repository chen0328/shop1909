<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\UserRoleModel;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class LoginController extends CommonController
{
    public function reg(Request $request){
        if($request->ajax()){
            $user_name =  $request->user_name;
            $user_pwd =  $request->user_pwd;
            if(empty($user_name)){
                return $this->message('00002','用户名不能为空','');
            }
            if(empty($user_pwd)){
                return $this->message('00003','密码不能为空','');
            }
            $arr = [
                'user_name'=>$user_name,
                'user_pwd'=>md5($user_pwd),
                'addtime'=>time()
            ];
            $res = UserModel::insert($arr);
            if($res){
               return $this->message('00000','注册成功','/admin/login');
            }else{
                return $this->message('00001','注册失败','');
            }
        }else{
            return view('admin/login/reg');
        }
    }
    public function login(Request $request){
        if($request->ajax()){
            $user_name =  $request->user_name;
            $user_pwd =  $request->user_pwd;
            if(empty($user_name)){
                return $this->message('00002','用户名不能为空','');
            }
            if(empty($user_pwd)){
                return $this->message('00003','密码不能为空','');
            }
            $info = UserModel::where('user_name',$user_name)->first();
            if(!empty($info)){
                if($info['user_pwd'] == md5($user_pwd)){
                    session(['user_name'=>$user_name,'user_id'=>$info['user_id']]);
                    return $this->message('00000','登录成功','/admin/index');
                }else{
                    return $this->message('000002','密码错误,请重试','');
                }
            }else{
                return $this->message('00001','没有找到该用户','');
            }
        }else{
            return view('admin/login/login');
        }
    }
    /**
     * 添加用户
     */
    public function user(Request $request){
        if($request->ajax()){
            $user_name =  $request->user_name;
            $user_pwd =  $request->user_pwd;
            if(empty($user_name)){
                return $this->message('00002','用户名不能为空','');
            }
            if(empty($user_pwd)){
                return $this->message('00003','密码不能为空','');
            }
            $arr = [
                'user_name'=>$user_name,
                'user_pwd'=>md5($user_pwd),
                'addtime'=>time()
            ];
            $res = UserModel::insert($arr);
            if($res){
                return $this->message('00000','添加成功','/admin/showuser');
            }else{
                return $this->message('00001','添加失败','');
            }
        }else{
            return view('admin/user/index');
        }
    }
    /**
     * 查看用户
     */
    public function showuser(){
        $info = UserModel::where('is_del',1)->paginate(2);
//        $info = UserRoleModel::leftjoin('user','user_role.user_id','=','user.user_id')->leftjoin('role','user_role.role_id','=','role.role_id')->where('user.is_del',1)->paginate(2);
        $r_data = UserRoleModel::leftjoin('role','user_role.role_id','=','role.role_id')->where('role.is_del',1)->get();


        return view('admin/user/show',['info'=>$info,'r_data'=>$r_data]);
    }
    /**
     * 删除用户
     */
    public function deluser(Request $request){
        $id = $request->id;
        $res = UserModel::where('user_id',$id)->update(['is_del'=>2]);
        if($res){
            return $this->message('00000','删除成功','/admin/showuser');
        }else{
            return $this->message('00001','删除失败','');
        }
    }
    /**
     * 用户角色
     */
    public function userrole(Request $request,$id){
            $info = RoleModel::where('is_del',1)->get();
            $where=[
                ['user_id','=',$id],
                ['is_del','=',1]
            ];
            $data = UserModel::where($where)->first();
            return view('admin/user/role',['info'=>$info,'id'=>$id,'data'=>$data]);
    }
    public function adduserrole(Request $request){
        $role_id = $request->role_id;
        $user_id = $request->user_id;
        $role_id = explode(',',$role_id);
        foreach($role_id as $k=>$v){
            $data = [
                'role_id'=>$v,
                'user_id'=>$user_id
            ];
//            $info = UserRoleModel::where('user_id',$user_id)->where('role_id',$role_id)->first();
//            if(!empty($info)){
//                return $this->message('00002','用户已经有该角色了','/admin/showuser');
//            }
            $res = UserRoleModel::insert($data);
        }
        if($res){
            return $this->message('00000','添加成功','/admin/showuser');
        }else{
            return $this->message('00001','添加失败','/admin/showuser');
        }
    }
}
