<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends CommonController
{
    public function category(){
        return view('admin.category.index');
    }
    public function addcategory(Request $request){
        $arr = $request->all();
        $data['cate_name'] = $arr['cate_name'];
        $data['is_show'] = $arr['is_show'];
        $data['addtime'] = time();
//        var_dump($data);exit;
        $res = CategoryModel::insert($data);
        if($res){
            return $this->message('00000','添加成功','/admin/showcategory');
        }else{
            return $this->message('00001','添加失败','');
        }
    }
    public function showcategory(){
        $info = CategoryModel::where('is_del',1)->orderBy('cate_id','asc')->paginate(2);
        return view('admin.category.show',['info'=>$info]);
    }
    /**
     * 删除功能
     */
    public function delcategory(Request $request){
        $cate_id =  $request->id;
        $res = CategoryModel::where('cate_id',$cate_id)->update(['is_del'=>2]);
        if($res){
            return $this->message('00000','删除成功','/admin/showcategory');
        }else{
            return $this->message('00001','删除失败','');
        }
    }
    /**
     * 修改功能
     */
    public function editcategory($id){
        $info = CategoryModel::where('cate_id',$id)->first();
        return view('admin.category.edit',['info'=>$info]);
    }

    public function updcategory(Request $request){
        $arr = $request->all();
//        var_dump($arr);exit;
        $data['cate_name'] = $arr['cate_name'];
        $data['is_show'] = $arr['is_show'];
        $data['addtime'] = time();
        $cate_id = $arr['cate_id'];
//        var_dump($data);exit;
        $res = CategoryModel::where('cate_id',$cate_id)->update($data);
        if($res !== false ){
            return $this->message('00000','修改成功','/admin/showcategory');
        }else{
            return $this->message('00001','修改失败',"/admin/shownav/$cate_id");
        }
    }
    /**
     * 即点即改
     */
    public function catename(Request $request){
        $info = $request->info;
        $id = $request->id;
        $res = CategoryModel::where('cate_id',$id)->update(['cate_name'=>$info]);
        if($res !== false ){
            return $this->message('00000','修改成功','/admin/showcategory');
        }else{
            return $this->message('00001','修改失败','');
        }
    }
    public function cateshow(Request $request){
        $info = $request->val;
        $id = $request->id;
        $res = CategoryModel::where('cate_id',$id)->update(['is_show'=>$info]);
        if($res !== false ){
            return $this->message('00000','修改成功','/admin/showcategory');
        }else{
            return $this->message('00001','修改失败','');
        }
    }
}
