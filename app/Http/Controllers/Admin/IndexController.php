<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /*
    整体
    */
    public function index(Request $request)
    {
        return view("admin/index/index");
    }
    /*
    头部
    */
    public function head(Request $request)
    {
        return view("admin/index/head");
    }
    /*
    左侧
    */
    public function left(Request $request)
    {
        return view("admin/index/left");
    }
     /*
    主题
    */
    public function main(Request $request)
    {
        return view("admin/index/main");
    }
}
