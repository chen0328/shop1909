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
Route::prefix('/admin')->group(function(){
    Route::any('index', 'Admin\IndexController@index');//首页
    Route::any('head', 'Admin\IndexController@head');//首页头部
    Route::any('left', 'Admin\IndexController@left');//首页左侧
    Route::any('main', 'Admin\IndexController@main');//首页主题
    //导航栏
    Route::prefix('/guide')->group(function(){
        Route::any('add', 'Admin\GuideController@add');
        Route::any('add_do', 'Admin\GuideController@add_do');
        Route::any('list', 'Admin\GuideController@list');
        Route::any('del', 'Admin\GuideController@del');
        Route::any('upd/{id}', 'Admin\GuideController@upd');
        Route::any('upd_do/{id}', 'Admin\GuideController@upd_do');
        // Route::any('editsorts', 'Admin\GuideController@editsorts');
        // Route::any('edithidden', 'Admin\GuideController@edithidden');
    });
    //分类
    Route::prefix('/category')->group(function(){
        Route::any('/add', 'Admin\CategoryController@add');
        Route::any('/add_do', 'Admin\CategoryController@add_do');
        Route::any('/list', 'Admin\CategoryController@list');
        Route::any('/del', 'Admin\CategoryController@del');
        Route::any('/upd/{id}', 'Admin\CategoryController@upd');
        Route::any('/upd_do/{id}', 'Admin\CategoryController@upd_do');
    });
    //用户
    Route::prefix('/user')->group(function(){
        Route::any('/add', 'Admin\UserController@add');
        Route::any('/add_do', 'Admin\UserController@add_do');
        Route::any('/list', 'Admin\UserController@list');
        Route::any('/del', 'Admin\UserController@del');
        Route::any('/upd/{id}', 'Admin\UserController@upd');
        Route::any('/upd_do/{id}', 'Admin\UserController@upd_do');
    });
    //权限
    Route::prefix('/priv')->group(function(){
        Route::any('/add', 'Admin\PrivController@add');
        Route::any('/add_do', 'Admin\PrivController@add_do');
        Route::any('/list', 'Admin\PrivController@list');
        Route::any('/del', 'Admin\PrivController@del');
        Route::any('/upd/{id}', 'Admin\PrivController@upd');
        Route::any('/upd_do/{id}', 'Admin\PrivController@upd_do');
    });
    //角色
    Route::prefix('/role')->group(function(){
        Route::any('/add', 'Admin\RoleController@add');
        Route::any('/add_do', 'Admin\RoleController@add_do');
        Route::any('/list', 'Admin\RoleController@list');
        Route::any('/del', 'Admin\RoleController@del');
        Route::any('/upd/{id}', 'Admin\RoleController@upd');
        Route::any('/upd_do/{id}', 'Admin\RoleController@upd_do');
    });
});
