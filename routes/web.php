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

// 用户相关
$router->group(['namespace' => 'User'], function () use ($router) {

});

// 客户相关
$router->group(['namespace' => 'Customer'], function () use ($router) {

});

// 销售相关
$router->group(['namespace' => 'Sale'], function () use ($router) {

});

// 产品相关
$router->group(['namespace' => 'Product'], function () use ($router) {

});

// 财务相关
$router->group(['namespace' => 'Finance'], function () use ($router) {

});

// 审批体系相关
$router->group(['namespace' => 'Approve'], function () use ($router) {

});

// 渠道合作商相关
$router->group(['namespace' => 'Channel'], function () use ($router) {

});
