<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\JsonResponse;

class AuthController extends Controller
{
    use JsonResponse;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

   /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $plainPassword = $request->input('password');
        $user->password = app('hash')->make($plainPassword);
        $user->save();

        return $this->responseWithCondition($user, 'User successfully registered', 'Failed to register user');
    }


    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
}
