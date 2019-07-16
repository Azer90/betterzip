<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->resource('nav', 'NavController')->names('admin.nav');
    $router->resource('seo', 'SeoController')->names('admin.seo');
    $router->resource('config', 'ConfigController')->names('admin.config');
    $router->resource('link', 'LinkController')->names('admin.link');
    $router->resource('article', 'ArticleController')->names('admin.article');
    $router->resource('classify', 'ClassifyController')->names('admin.classify');
    $router->resource('payorder', 'PayOrderController',['only' => ['index']])->names('admin.payorder');
    $router->resource('goods', 'GoodsController')->names('admin.goods');
    $router->resource('tag', 'TagController')->names('admin.tag');
    $router->resource('refundOrder', 'RefundOrderController',['only' => ['index']])->names('admin.refundOrder');
    $router->resource('singlepages', 'SinglePageController')->names('admin.singlepages');

    $router->post('refund', 'RefundController@init')->name('refund');

    $router->post('linkImport', 'ImportController@linkImport')->name('linkImport');

});
