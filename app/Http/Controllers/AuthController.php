<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormat;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userService;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Register user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        try {
            $user = $this->userService->register($request);

            if (!$user) {
                return ResponseFormat::validationResponse("Failed to load.");
            }

            return ResponseFormat::successResponse($user);
        } catch (Exception $err) {
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(["username", "password"]);

        if (!($token = auth()->attempt($credentials))) {
            return ResponseFormat::unauthorizedResponse("Unauthorized.");
        }

        return ResponseFormat::successResponse($this->respondWithToken($token));
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return ResponseFormat::successResponse(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(["message" => "Successfully logged out"]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return ResponseFormat::successResponse(
            $this->respondWithToken(auth()->refresh())
        );
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return [
            "access_token" => $token,
            "token_type" => "bearer",
            "expires_in" =>
                auth()
                    ->factory()
                    ->getTTL() * 60,
        ];
    }
}
