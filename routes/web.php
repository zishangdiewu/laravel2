<?php

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
    return redirect('/home/index');
});
// // 
Route::get('admin/login','Admin\LoginController@index');
// 登录
Route::post('admin/dologin','Admin\LoginController@dologin');
// 转换
Route::get('admin/change','Admin\LoginController@change');
Route::get('admin/back','Admin\LoginController@back');

// // 注册
Route::get('admin/register','Admin\LoginController@register');
Route::post('admin/doregister','Admin\LoginController@doregister');


// 后台路由群组     创建中间件在app/Http/Middleware创建Login中间件  给路由定义中间件app/Http/Kernel.php指定login
Route::group(['prefix'=>'admin','middleware'=>'login'],function(){
    
     // 后台首页、
    Route::resource('/index','Admin\AdminController');
    
    // 用户列表
    Route::resource('/demo','Admin\UserController');   
    // 分类列表
    Route::resource('/sort','Admin\SortController');
    // 添加子类
    Route::get('/sortSon/{id}','Admin\SortController@createSon');
    // 执行添加子类
    Route::post('/sortSon','Admin\SortController@storeSon');
    // 商品列表
    Route::resource('/good','Admin\GoodController');

  
    Route::get('/ajax','Admin\GoodController@doget');
    Route::post('/ajax','Admin\GoodController@dopost');
    // 网站配置管理
    Route::resource('/config','Admin\ConfigController'); 
    // 改密码
    Route::resource('/pass','Admin\PassController'); 
    // 轮播图 
    Route::resource('/image','Admin\ImageController'); 
    Route::resource('/sku','Admin\SkuController'); 

    //订单管理
    Route::resource('/order','Admin\OrderController');
    //连接管理
    Route::resource('/links','Admin\LinksController');  
    // 评论
    Route::resource('/comment','Admin\CommentController');  
  
    // 管理员列表
    Route::resource('/adminuser','Admin\AdminuserController');

    // 后台注销退出
    Route::get('/over','Admin\LoginController@over');
});



Route::group(['prefix'=>'home'],function(){
    // 首页
    Route::resource('/index','Home\HomeController'); 
    // 商城首页
    Route::resource('/shop','Home\ShopController');
    // 搜索 
    Route::resource('/search','Home\ListController'); 
   
    // 手机列表
    Route::resource('/list','Home\ListController'); 
    // 手机系列分类 
    Route::get('/st/{id}','Home\ListController@dosort');
    // 配件列表
    Route::resource('/parts','Home\PartsController');
    // 配件分类
    Route::get('/pt/{id}','Home\PartsController@dosort');
    // 商品详情
    Route::get('/detail/{id}','Home\DetailsController@index');

    // 购物车 
    Route::resource('/ct','Home\CartController');
    
    // 添加收货地址
    Route::resource('/order','Home\CityController');

    Route::resource('/pay','Home\OrderController');
    Route::post('/pa/{id}','Home\OrderController@pay');
    // 支付
    Route::get('/pp/{id}','Home\OrderController@dopay');
        //收货地址管理
    Route::resource('site','Home\SiteController');
    // 城市联动
    Route::get('/sites/get','Home\SiteController@doget');
    Route::post('/sitess/post','Home\SiteController@dopost');
    // 默认地址
    Route::get('/adress/{id}','Home\SiteController@adress');
    //修改个人资料
    Route::resource('/user','Home\UserController');
    // 修改普通用户密码
    Route::get('/userpass','Home\UserController@pass');
    Route::post('/userpass','Home\UserController@dopass');
    // 评论管理
    Route::resource('/comment','Home\CommentController');
    // 我的订单
    Route::resource('/mo','Home\MyorderController');
    Route::get('/mo/{id}','Home\MyorderController@update');
    Route::get('/look/{id}','Home\MyorderController@look');
    
    // 添加地址  Ajax城市联动
    Route::get('/ajaxo','Home\CityController@doget');
    Route::post('/ajaxo','Home\CityController@dopost');

	 // 登录 
    Route::get('/enter','Home\EnterController@index');
    Route::post('/doenter','Home\EnterController@dologin');
    // 注册
    Route::get('enroll','Home\EnterController@register');
    Route::post('doenroll','Home\EnterController@doregister');
    // 验证码
    Route::get('captch/{tmp}','Home\EnterController@captch');

    // 前台个人中心退出注销
    Route::get('/logout','Home\EnterController@logout');

});
