<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::any('/admin/reg','Admin\LoginController@reg');
Route::any('/admin/login','Admin\LoginController@login');
Route::get('/admin/index','Admin\IndexController@index');
Route::namespace('Admin')->prefix('admin')->middleware('checklogin')->group(function(){
    ######################### 导航栏 ############################
    Route::any('/nav','IndexController@nav');
    Route::any('/addnav','IndexController@addnav');
    Route::any('/shownav','IndexController@shownav');
    Route::any('/delnav','IndexController@delnav');
    Route::any('/updnav/{id}','IndexController@updnav');
    Route::any('/editnav/{id}','IndexController@editnav');
    Route::any('/editsorts','IndexController@editsorts');
    Route::any('/edithidden','IndexController@edithidden');
    ############################ 导航栏 #####################################

    ############################# 分类 ##################################
    Route::get('/category','CategoryController@category');
    Route::any('/addcategory','CategoryController@addcategory');
    Route::any('/showcategory','CategoryController@showcategory');
    Route::any('/delcategory','CategoryController@delcategory');
    Route::any('/editcategory/{id}','CategoryController@editcategory');
    Route::any('/updcategory','CategoryController@updcategory');
    Route::any('/cateshow','CategoryController@cateshow');
    Route::any('/catename','CategoryController@catename');
    ############################# 分类 ##################################

    ############################# 详情 ##################################
    Route::any('/details','DetailsController@details');
    Route::any('showdetails','DetailsController@showdetails');
    Route::any('/deldetails','DetailsController@deldetails');
    Route::any('/editdetails/{id}','DetailsController@editdetails');
    Route::any('/upddetails','DetailsController@upddetails');
    Route::any('/detailsSorts','DetailsController@detailsSorts');
    Route::any('/detailsShow','DetailsController@detailsShow');
    ############################# 详情 ##################################

    ############################# 留言 ##################################
    Route::get('/messages','IndexController@messages');
    Route::get('/delmessages','IndexController@delmessages');
    Route::get('/editmessages/{id}','IndexController@editmessages');
    Route::get('/updmessages','IndexController@updmessages');
    ############################# 留言 ##################################

    ############################## 用户登录和注册 #################################

    Route::any('/user','LoginController@user');
    Route::get('/showuser','LoginController@showuser');
    Route::get('/deluser','LoginController@deluser');
    Route::any('/userrole/{id}','LoginController@userrole');
    Route::any('adduserrole','LoginController@adduserrole');
    ############################## 用户登录和注册 #################################

    ############################## 角色 #################################
    Route::any('/role','RoleController@role');
    Route::any('/showrole','RoleController@showrole');
    Route::any('/delrole','RoleController@delrole');
    Route::any('/editrole/{id}','RoleController@editrole');
    Route::any('/updrole','RoleController@updrole');
    Route::any('roleright/{id}','RoleController@roleright');
    Route::any('addroleright','RoleController@addroleright');
    ############################## 角色 #################################

    ############################## 权限 #################################
    Route::any('/power','PowerController@power');
    Route::any('/showpower','PowerController@showpower');
    Route::any('/delpower','PowerController@delpower');
    Route::any('/editpower/{id}','PowerController@editpower');
    Route::any('/updpower','PowerController@updpower');
    ############################## 权限 #################################

   ############################# 练习文件上传 ##################################
   Route::get('/upload','IndexController@upload');
   Route::any('/addupload','IndexController@addupload');

   ############################# 练习文件上传 ##################################
});

  ########################### 前台 #############################################
    Route::get('/messages','IndexController@messages');
    Route::get('/addmessages','IndexController@addmessages');
    Route::get('/imageCode','IndexController@imageCode');
  ########################### 前台 #############################################

Route::prefix('index')->group(function(){
    Route::any('/index','Index\IndexController@index');
    Route::any('/show_nav','Index\IndexController@show_nav');
    Route::any('/details','Index\IndexController@details');
    ########################### 登录 #############################################
    Route::any('/login','Index\LoginController@login');
    Route::any('/reg','Index\LoginController@reg');
    Route::any('/reg_do','Index\LoginController@reg_do');
    Route::any('/login_do','Index\LoginController@login_do');
    ########################### 登录 #############################################
});
