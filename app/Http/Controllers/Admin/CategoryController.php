<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Http\Controllers\CommonController;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
       return view('admin.category.add');
    }
    public function add_do(Request $request)
    {
        $arr = $request->all();
        // var_dump($arr);exit;
        $data['cate_name'] = $arr['cate_name'];
        $data['is_show'] = $arr['is_show'];
        $data['addtime'] = time();
        $res = Category::insert($data);
        if ($res) {
            $message = [
                'code' => '00000',
                'msg' => '添加成功',
                'url' => '/admin/category/list'
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
    public function list()
    {
        $info = Category::where(['is_del'=>1])->orderBy('cate_id','desc')->paginate(2);
        // var_dump($info);exit;
        return view('admin.category.list',['info'=>$info]);
      

    }//删除
    public function del(Request $request)
    {
        $cate_id = $request->cate_id;
        // var_dump($id);die;
        $res = Category::where('cate_id',$cate_id)->update(['is_del'=>2]);
        if($res){
            return $this->message('00000','删除成功','/admin/category/list');
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
}
