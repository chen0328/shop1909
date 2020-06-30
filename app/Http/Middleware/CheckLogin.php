<?php

namespace App\Http\Middleware;

use App\Models\PowerModel;
use App\Models\RoleRightModel;
use App\Models\UserModel;
use App\Models\UserRoleModel;
use Closure;
use Illuminate\Foundation\Auth\User;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_id = session('user_id');
        if(empty($user_id)){
            return redirect('/admin/login');
        }
        $url = $request->path();
//        var_dump($url);exit;
        $where=[
            ['user.user_id','=',$user_id],
            ['power.is_del','=',1],
            ['role.is_del','=',1],
            ['user.is_del','=',1]
        ];
        $role_data = UserModel::leftjoin('user_role','user_role.user_id','=','user.user_id')
                    ->leftjoin('role','role.role_id','=','user_role.role_id')
                    ->leftjoin('roleright','roleright.role_id','=','role.role_id')
                    ->leftjoin('power','power.p_id','=','roleright.p_id')
                   ->where($where) ->get();
//        var_dump($role_data);exit;
        foreach($role_data as $k=>$v){
            if($v->role_name !== '超级管理员'){
                if($v->url!==$url){
                    echo "<script>alert('没有权限访问');window.history.go(-1);</script>";
                }
            }
        }
        return $next($request);
    }
}
