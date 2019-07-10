<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\model\Role;
use App\model\SmsRegister;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function __construct()
    {



        $this->middleware('throttle:60,3')->only(['register', 'login']);
    }

    public function getPhone()
    {
        if ($this->getCode(request("phone"))){
            return response(["data"=>"code set"]);
        }
    }

    public function checkCode()
    {
        // if code and phone exsist in my database
        $smsExsist=SmsRegister::wherePhone(request("phone"))->whereCode(request("code"))->first();
        if ($smsExsist){
            $user = User::where("phone",request("phone"))->first();
            // if user exist
            if ($user){
                auth('api')->login($user);
               $token=auth('api')->tokenById($user->id);

                if ($token) {
                //if user filled own information
                    if ($user->filled==1){
                        return response(["status"=>"code successful","filled"=>true,"signin"=>true,"token"=>$token,"user"=>auth('api')->user()],202);
                    }else{
                        return response(["status"=>"code successful","filled"=>false,"signin"=>true,"token"=>$token,"user"=>auth('api')->user()],202);
                    }

                //if user not filled own information
                    }else{
                    return response(["status"=>"code successful","filled"=>false,"signin"=>false,"token"=>$token,"user"=>auth('api')->user()],202);
                }

                //if user not singin
           }else{

               return response(["status"=>"code successful","filled"=>false,"signin"=>false],202);
           }

        }else{
            return response(["status"=>"code invalid"],401);
        }

    }

    public function register()
    {


        $validator = Validator::make(request()->all(), [
            "name" => 'required|min:2|max:35',
            "lname" => 'required|min:3|max:35',
            "phone" => 'required|size:11|unique:users',
        ]);

        if ($validator->fails()) {
            return response(['error' => 'input problem', 'field' => $validator->errors()], 403);
        }

//
//        if (User::whereEmail(\request()->email)->first()) {
//            return response(["error" => 'user already existed'], 403);
//        }

        $user = new User([
            "name" => \request()->input('name'),
            "lname" => \request()->input('lname'),
            "phone" => \request()->input('phone'),
            "status" => 1,
            "email" => !empty(request('email'))?request()->input('email'):request('phone').'@hodhod-gift.ir'
        ]);
        Role::find(3)->users()->save($user);
        $token=auth('api')->tokenById($user->id);

        return response(["success" => 'user created',"token"=>$token,"user"=>$user], 201);
    }



    public function update()
    {


        $validator = Validator::make(request()->all(), [
            "email" => Rule::unique('users', 'email')->ignore(auth()->user()),
            "name" => 'required|min:2|max:35',
            "lname" => 'required|min:3|max:35',
//            "phone" => 'required|size:11|unique:users',
            "sex" => 'required',

        ]);
        if ($validator->fails()) {
            return response(['error' => 'input problem', 'field' => $validator->errors()], 403);
        }


        $user=auth()->user();
        $user->name=\request()->input('name');
        $user->lname=\request()->input('lname');
        $user->email=\request()->input('email');
        $user->sex=\request()->input('sex');
        $user->city=\request()->input('city');
        $user->province_id=\request()->input('province_id');
        $user->address=\request()->input('address');
        $user->postal_code=\request()->input('postal_code');



        $user->save();
        return response(["success" => 'user created',"user"=>$user], 201);
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
     * @param  string  $token
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
