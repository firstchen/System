<?php

namespace App\Http\Controllers\Authenticate;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Validation\ValidationException;

/**
 * AuthenticateController
 * 认证相关控制器
 * @uses Controller
 * @package App\Http\Controllers\Authenticate
 * @version $Id$
 * @author chenyong
 * @since 2021/3/22 10:26 下午
 */
class AuthenticateController extends Controller
{
    /**
     * authenticate
     * 认证
     * @param Request $request
     * @access public
     * @return mixed
     */
    public function authenticate(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);
        } catch (ValidationException $e) {
            return $e->getResponse();
        }

        if (!$token = JWTAuth::attempt($request->only('email', 'password'))) {
            return $this->error(5000, Response::HTTP_UNAUTHORIZED);
        }

        return $this->success(['token' => $token]);
    }

    public function register()
    {

    }

    /**
     * login
     * 登录
     * @access public
     * @return mixed
     */
    public function login()
    {
        return $this->success(['info' => JWTAuth::parseToken()->authenticate()]);
    }

    public function logout(Request $request)
    {
        try {
            $this->validate($request, [
                'token' => 'required'
            ]);
        } catch (ValidationException $e) {
            return $e->getResponse();
        }

    }

    public function refresh()
    {

    }
}
