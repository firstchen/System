<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// 认证相关
$router->group(['namespace' => 'Authenticate', 'prefix' => 'authenticate'], function () use ($router) {
    $router->post('/authenticate', 'AuthenticateController@authenticate');
    $router->post('/login', 'AuthenticateController@login');
});

// 用户相关
$router->group(['namespace' => 'User', 'prefix' => 'user'], function () use ($router) {

});

// 客户相关
$router->group(['namespace' => 'Customer', 'prefix' => 'customer'], function () use ($router) {

});

// 销售相关
$router->group(['namespace' => 'Sale', 'prefix' => 'sale'], function () use ($router) {

});

// 生产出货相关
$router->group(['namespace' => 'Produce', 'prefix' => 'produce'], function () use ($router) {

});

// 采购相关
$router->group(['namespace' => 'Purchase', 'prefix' => 'purchase'], function () use ($router) {

});

// 产品相关
$router->group(['namespace' => 'Product', 'prefix' => 'product'], function () use ($router) {
    $router->get('/index', 'ProductController@index');
});

// 财务相关
$router->group(['namespace' => 'Finance', 'prefix' => 'finance'], function () use ($router) {

});

// 审批体系相关
$router->group(['namespace' => 'Approve', 'prefix' => 'approve'], function () use ($router) {

});

// 渠道合作商相关
$router->group(['namespace' => 'Channel', 'prefix' => 'channel'], function () use ($router) {

});
