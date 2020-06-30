<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Models\MessagesModel;
use App\Models\NavModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends CommonController
{

    public function index(){
        $user_name = session('user_name');
//        var_dump($user_name);exit;
        return view('admin.index',['user_name'=>$user_name]);
    }
    public function nav(){
        return view('admin.nav');
    }

    /**
     * 添加导航
     * @param Request $request
     * @return string|void
     */
    public function addnav(Request $request){
        $arr = $request->all();
//        var_dump($arr);exit;
        $data['name'] = $arr['nav_name'];
        $data['url'] = $arr['url'];
        $data['sorts'] = $arr['sorts'];
        $data['hidden'] = $arr['is_show'];
        $data['addtime'] = time();
        $res = NavModel::insert($data);
        if($res){
            return $this->message('00000','添加成功','/admin/shownav');
        }else{
            return $this->message('00001','添加失败','');
        }
    }
    /**
     * 展示导航
     */
    public function shownav(){
        $info = NavModel::where(['is_del'=>1])->orderBy('sorts','desc')->paginate(2);
//        var_dump($info);exit;
        return view('admin.shownav',['info'=>$info]);
    }
    /**
     * 删除
     */
    public function delnav(Request $request){
        $id = $request->id;
        $res = NavModel::where('id',$id)->update(['is_del'=>2]);
        if($res){
            return $this->message('00000','删除成功','/admin/shownav');
        }else{
            return $this->message('00001','删除失败',"");
        }
    }
    /**
     * 修改页面
     */
    public function updnav($id){
//        $id = $request->id;
//        var_dump($id);exit;
        $info = NavModel::where('id',$id)->first();
//        var_dump($info);exit;
        return view('admin.updnav',['info'=>$info]);
    }
    /**
     * 修改
     */
    public function editnav($id){
//        var_dump($id);exit;
        $arr = request()->all();
//        var_dump($arr);exit;
        $data['name'] = $arr['nav_name'];
        $data['url'] = $arr['url'];
        $data['sorts'] = $arr['sorts'];
        $data['hidden'] = $arr['is_show'];
        $data['addtime'] = time();
        $res = NavModel::where('id',$id)->update($data);
        if($res !== false ){
            return $this->message('00000','修改成功','/admin/shownav');
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
//        var_dump($id,$data);
        $res = NavModel::where('id',$id)->update(['sorts'=>$data]);
        if($res !== false){
            return $this->message('00000','修改成功','/admin/shownav');
        }else{
            return $this->message('00001','修改失败','');
        }
    }
    public function edithidden(Request $request){
        $data = $request->val;
        $id=$request->id;
//        var_dump($id,$data);exit;
        $data = intval($data);
        $info = ['hidden'=>$data];
//        var_dump($info);exit;
        $res = NavModel::where('id',$id)->update($info);
//        var_dump($res);exit;
        if($res !== false){
            return $this->message('00000','修改成功','/admin/shownav');
        }else{
            return $this->message('00001','修改失败','');
        }
    }

    /**
     * 文件上传
     */
    public function upload(){
        return view('admin/upload');
    }
    public function addupload(Request $request){
        $fileinfo = $_FILES['Filedata'];
//        var_dump($fileinfo);exit;
        $tmpName = $fileinfo['tmp_name' ];//_上传文件临时文件
        $ext = explode("." ,$fileinfo[ 'name'])[1];//文件扩展名
        $newFileName = md5(uniqid())."." . $ext;//新文件名字
        $newFilePath ="./uploads/".Date("Y/m/d/",time());
        if(!is_dir($newFilePath)){
            mkdir($newFilePath,0777,true);
        }
        $newFilePath = $newFilePath.$newFileName ;
        move_uploaded_file( $tmpName,$newFilePath);
        $newFilePath = ltrim( $newFilePath,".");
        echo $newFilePath;
    }

//    public function addupload(Request $request){
//        $fileCharater = $request->file('source');
//        if ($fileCharater->isValid()) {
//            //括号里面的是必须加的哦
//            //如果括号里面的不加上的话，下面的方法也无法调用的
//
//            //获取文件的扩展名
//            $ext = $fileCharater->getClientOriginalExtension();
//
//            //获取文件的绝对路径
//            $path = $fileCharater->getRealPath();
////            var_dump($path);exit;
//
//            //定义文件名
////            $filename = date('Y-m-d-h-i-s').'.'.$ext;
//            //防止文件名重复用uniqid
//            $filename = md5(uniqid()).'.'.$ext;
////            echo $filename;exit;
//
//            //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
//            Storage::disk('public')->put($filename, file_get_contents($path));
//        }
//    }
    /***
     * 查看留言
     */
    public function messages(){
        $info = MessagesModel::where('is_del',1)->paginate(2);
        return view('/admin/liuyan',['info'=>$info]);
    }
    public function delmessages(){
        $id = request()->id;
        $res = MessagesModel::where('msg_id',$id)->update(['is_del'=>2]);
        if($res){
            return $this->message('00000','删除成功','/admin/messages');
        }else{
            return $this->message('00001','删除失败','');
        }
    }
}
