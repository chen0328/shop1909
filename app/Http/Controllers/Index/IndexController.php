<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NavModel;
use App\Http\Controllers\CommonController;
class IndexController extends Controller
{
    public function index(){
        // $info = NAVModel::find();
        return view('index.index.index');
    }
    public function show_nav(){
        $info = NavModel::where(['hidden'=>1])->limit(7)->get();
        return $info;
    }

}
