<?php

namespace App\Http\Controllers\Authenticate;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
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
     * Handle a authenticate request to the application.
     *
     * @param Request $request
     *
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response|null
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
            return $this->onUnauthorized();
        }

        return $this->onAuthorized($token);
    }

    /**
     * Get authenticated user.
     *
     * @return JsonResponse
     */
    public function login()
    {
        return new JsonResponse(['message' => 'authenticated_user', 'data' => JWTAuth::parseToken()->authenticate(), Response::HTTP_OK]);
    }

    /**
     * What response should be returned on authorized.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function onAuthorized($token)
    {
        return new JsonResponse(['message' => 'Authorized', 'data' => ['token' => $token]], Response::HTTP_OK);
    }

    /**
     * What response should be returned on invalid credentials.
     *
     * @return JsonResponse
     */
    private function onUnauthorized()
    {
        return new JsonResponse(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }
}
