<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\V1\Controller;
use App\Http\Requests\loginRequests;
use App\Traits\ResponderTrait;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller {

    use ResponderTrait;

    public function login(loginRequests $request) {
        $userCreds = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($userCreds)) {
            return $this->negativeResponse('error', null, 'Unauthorized', 401);
        }

        return $this->generateToken($token);
    }

    public function generateToken($token) {
        return $this->positiveResponse('success', [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ], 'Token generated successfully');
    }

    public function logout() {
        JWTAuth::invalidate(JWTAuth::getToken());
        return $this->positiveResponse('success', null, 'logged out successfully');
    }

    public function refresh() {
        return $this->generateToken(JWTAuth::refresh(JWTAuth::getToken()));
    }
}
?>
