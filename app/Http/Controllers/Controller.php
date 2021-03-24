<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * success
     * 执行一个成功的请求输出
     * @param array $data
     * @return JsonResponse
     * @access public
     */
    public function success(array $data)
    {
        $response = [
            'status' => Response::HTTP_OK,
            'data' => $data,
            'message' => '请求成功'
        ];

        return new JsonResponse($response, Response::HTTP_OK);
    }

    /**
     * error
     * 执行一个失败的请求输出
     * @param int $errorCode
     * @param int $httpCode
     * @return JsonResponse
     * @access public
     */
    public function error(int $errorCode, $httpCode = Response::HTTP_BAD_REQUEST)
    {
        $response = [
            'status' => $errorCode,
            'message' => trans("message.{$errorCode}")
        ];

        return new JsonResponse($response, $httpCode);
    }
}
