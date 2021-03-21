<?php

namespace App\Http\Controllers\Product;

use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Redis;

/**
 * ProductController
 * 产品相关控制器
 * @uses ProductBaseController
 * @package App\Http\Controllers\Product
 * @version $Id$
 * @author chenyong
 * @since 2021/3/21 10:55 上午
 */
class ProductController extends ProductBaseController
{
    public function index()
    {
        $rlt = Redis::set('test_lumen_redid', 1);
        $rlt = app('cache')->get('test_lumen_redid');

        return ['rlt' => $rlt];
    }
}
