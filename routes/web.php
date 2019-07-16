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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','HomeController@Home')->name('/');
Route::get('feature.html','HomeController@Feature')->name('feature');
Route::get('download.html','HomeController@Download')->name('download');
Route::get('goumai.html','HomeController@Purchase')->name('purchase');
Route::get('support.html','HomeController@Support')->name('support');
Route::get('lists_{id?}.html','HomeController@Support')->name('lists');
Route::get('detail_{id}.html','HomeController@detail')->name('detail');




Route::post('alipay_notify', 'BuyController@alipay_notify')->name('alipay_notify');
Route::post('wechat_notify', 'BuyController@wechat_notify')->name('wechat_notify');
Route::post('wechat_find', 'BuyController@wechat_find')->name('wechat_find');
Route::post('ali_find', 'BuyController@ali_find')->name('ali_find');
Route::post('sendData', 'BuyController@sendData')->name('sendData');

Route::post('pay', 'BuyController@pay')->name('pay'); //支付
