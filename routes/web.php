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
});
