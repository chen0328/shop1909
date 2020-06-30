<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Models\CategoryModel;
use App\Models\DetailsModel;
use Illuminate\Http\Request;

class DetailsController extends CommonController
{
    public function details(Request $request){
        if($request->ajax()){
            $arr = $request->all();
            $arr['addtime']=time();
            $res = DetailsModel::insert($arr);
            if($res){
                return $this->message('00000','添加成功','/admin/showdetails');
            }else{
                return $this->message('00001','添加失败','');
            }
        }else{
            $where = [
                ['is_show','=',1],
                ['is_del','=',1]
            ];
            $info = CategoryModel::where($where)->get();
            return view('admin/details/index',['info'=>$info]);
        }
    }
    public function showdetails(){
        $info = CategoryModel::leftjoin('details',"details.cate_id","=", "category.cate_id")
            ->where('details.is_del',1)
            ->orderBy('details.sorts','desc')
            ->paginate(2);
//        var_dump($info);
        return view('admin/details/show',['info'=>$info]);
    }

    /**
     * 删除功能
     */
    public function deldetails(){
        $id = request()->id;
        $res=DetailsModel::where('details_id',$id)->update(['is_del'=>2]);
        if($res){
            return $this->message('00000','删除成功','/admin/showdetails');
        }else{
            return $this->message('00001','删除失败','');
        }
    }

    /**
     * 修改页面
     */
    public function editdetails($id){
        $where = [
            ['is_show','=',1],
            ['is_del','=',1]
        ];
        $data = CategoryModel::where($where)->get();
        $info = DetailsModel::where('details_id',$id)->first();
        return view('admin/details/edit',['info'=>$info,'data'=>$data]);
    }

    /**
     * 修改功能
     */
    public function upddetails(Request $request){
       $arr = $request->all();
//        var_dump($arr);
        $arr['addtime']=time();
        $details_id = $arr['details_id'];
        $res = DetailsModel::where('details_id',$details_id)->update($arr);
        if($res !== false){
            return $this->message('00000','修改成功','/admin/showdetails');
        }else{
            return $this->message('00001','修改失败',"/admin/editdetails/$details_id");
        }
    }

    /**
     * 即点即改
     */
    public function detailsSorts(Request $request){
        $data = $request->info;
        $id=$request->id;
//        var_dump($id,$data);
        $res = DetailsModel::where('details_id',$id)->update(['sorts'=>$data]);
        if($res !== false){
            return $this->message('00000','修改成功','/admin/showdetails');
        }else{
            return $this->message('00001','修改失败','');
        }
    }
    public function detailsShow(Request $request){
        $data = $request->val;
        $id=$request->id;
//        var_dump($id,$data);exit;
        $data = intval($data);
        $info = ['is_show'=>$data];
//        var_dump($info);exit;
        $res = DetailsModel::where('details_id',$id)->update($info);
//        var_dump($res);exit;
        if($res !== false){
            return $this->message('00000','修改成功','/admin/showdetails');
        }else{
            return $this->message('00001','修改失败','');
        }
    }
}
