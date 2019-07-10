<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class abcController extends Controller
{
    public function register()
    {
        $validator=Validator::make(\request()->all(),[
            "email"=>'required|email|max:100',
            "name"=>'required|min:2|max:35',
            "lname"=>'required|min:3|max:35',
            "phone"=>'required|size:11|unique:users',
            "password"=>'required|min:6|max:35',
        ]);

        if($validator->fails())
            return response(['error'=>'input problem','field'=>$validator->errors()],403);



        if(User::whereEmail(\request()->email)->first())
            return response(["error"=>'user already existed'],403);

        User::create([
            "name"=>\request()->input('name'),
            "lname"=>\request()->input('lname'),
            "phone"=>\request()->input('phone'),
            "email"=>\request()->input('email'),
            "password"=>bcrypt(\request()->input('password')),
        ]);
        return response(["success"=>'user created'],201);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {

        $validator=Validator::make(\request()->all(),[
            "email"=>'required|email',
            "password"=>'required',
        ]);

        if($validator->fails())
            return response(['error'=>'input problem','field'=>$validator->errors()],403);

        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response(['error' => 'Unauthorized'], 401);
        }
        return response([
            'token' => $token,
            'user'=> auth('api')->user(),
            'expires' => auth('api')->factory()->getTTL() * 5000000000,
        ],200);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
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
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
