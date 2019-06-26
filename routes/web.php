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
    return view('welcome');
});


Auth::routes();

Route::group(['prefix' => 'alipay'], function () {
	Route::any('notify','PayController@notify');
	Route::any('return','PayController@return');
	Route::get('pay/{id}','PayController@index');
});


Route::group(['prefix' => 'wechat'], function () {
	Route::get('pay_web/{id}','PayController@weixinWeb');
	Route::any('notify','PayController@weixinNotify');
	Route::get('pay/{id}','PayController@weixinIndex');
});

//前端路由
Route::get('/', 'FrontController@index')->name('index');
Route::get('/check','FrontController@check')->name('check');
Route::get('cat/{id}', 'FrontController@cat')->name('category');
Route::get('post/{id}', 'FrontController@post')->name('post');
Route::get('page/{id}', 'FrontController@page')->name('page');
Route::get('test',function(){
	//$a = app('name')->varifyCharacterGivenName('善良,有趣','man');
	dd(count(characterAll()));
});
Route::get('varify/{id}','FrontController@varifyPayStatus');
//api接口

//刷新缓存
Route::post('/clearCache','CommonApiController@clearCache');
Route::post('/api/submit_data', 'FrontController@submitInfo');
Route::get('/getRootSlug/{cat_id}','FrontController@getCatRootSlug');
//后台管理系统
Route::group(['middleware' => ['auth'], 'prefix' => 'zcjy'], function () {
	//后台首页
	Route::get('/', 'SettingController@setting')->name('settings.setting');

    //系统设置
    Route::get('settings/setting', 'SettingController@setting')->name('settings.setting');
    Route::post('settings/setting', 'SettingController@update')->name('settings.setting.update');
    //地图选择
    Route::get('settings/map','SettingController@map');
    //修改密码
	Route::get('setting/edit_pwd','SettingController@edit_pwd')->name('settings.edit_pwd');
    Route::post('setting/edit_pwd/{id}','SettingController@edit_pwd_api')->name('settings.pwd_update');
 
	//部署操作
	Route::get('helper', 'SettingController@helper')->name('settings.helper');

	//文章分类
	Route::resource('categories', 'CategoryController');
	//文章
	Route::resource('posts', 'PostController');

    //自定义文章类型
    Route::resource('customPostTypes', 'CustomPostTypeController');
    //获取所有自定义文章类型
    Route::post('getCustomType','PostController@getCustomType');
    //自定义文章详细字段
    Route::resource('{customposttype_id}/customPostTypeItems', 'CustomPostTypeItemsController');

    //自定义页面类型
    Route::resource('customPageTypes', 'CustomPageTypeController');
    //自定义页面详细字段
    Route::resource('{page_id}/pageItems', 'PageItemsController');
	//页面
	Route::resource('pages', 'PageController');
	//首页横幅
	Route::resource('banners', 'BannerController');

	Route::resource('{banner_id}/bannerItems', 'BannerItemController');
	
    
	//菜单
	Route::resource('menus', 'MenuController');
	//合作伙伴
	Route::resource('coorperators', 'CoorperatorController');
	//友情链接
	Route::resource('links', 'LinkController');
	//菜单
	Route::post('menu_items', 'MenuItemController@setMenus');
	Route::get('menu_items/add', 'MenuItemController@addItem');
	Route::get('menu_items/{menu_id}', 'MenuItemController@items');
	//留言消息
	Route::resource('messages', 'MessageController');
    //我们的客户
    Route::resource('clients', 'ClientController');
   	//姓氏管理
    Route::resource('nameSets', 'NameSetController');
    Route::get('frame_logs','SubmitLogController@frame');
    Route::post('logs/many/deletes','SubmitLogController@manyDeletes')->name('submitLogs.manydels');
    Route::resource('submitLogs', 'SubmitLogController');
});







Route::resource('nameCharacters', 'NameCharacterController');

