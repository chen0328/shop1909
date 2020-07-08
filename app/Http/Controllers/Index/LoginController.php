<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoginModel;
use App\Http\Controllers\CommonController;
class LoginController extends CommonController
{
    public function login(){
        return view('index.login.login');
    }
    public function reg(){
        return view('index.login.reg');
    }
    public function reg_do(Request $request){
        if($request->ajax()){
            $name =  $request->name;
            $pwd =  $request->pwd;
            if(empty($name)){
                return $this->message('00002','用户名不能为空','');
            }
            if(empty($pwd)){
                return $this->message('00003','密码不能为空','');
            }
            $arr = [
                'name'=>$name,
                'pwd'=>md5($pwd),
                'addtime'=>time()
            ];
            $res = LoginModel::insert($arr);
            if($res){
               return $this->message('00000','注册成功','/index/login');
            }else{
                return $this->message('00001','注册失败','');
            }
        }else{
            return view('index/reg');
        }
    }
    public function login_do(Request $request){
        if($request->ajax()){
            $name =  $request->name;
            $pwd =  $request->pwd;
            if(empty($name)){
                return $this->message('00002','用户名不能为空','');
            }
            if(empty($pwd)){
                return $this->message('00003','密码不能为空','');
            }
            $info = LoginModel::where('name',$name)->first();
            if(!empty($info)){
                if($info['pwd'] == md5($pwd)){
                    session(['name'=>$name,'id'=>$info['id']]);
                    return $this->message('00000','登录成功','/index/index');
                }else{
                    return $this->message('000002','密码错误,请重试','');
                }
            }else{
                return $this->message('00001','没有找到该用户','');
            }
        }else{
            return view('index/login');
        }
    }

}
