<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use App\Traits\JsonResponse;
use Illuminate\Support\Facades\Auth;

class Admin extends Model
{
    use JsonResponse;

    protected $fillable = [
        'name', 'email',
    ];

    protected $hidden = [
        'password',
    ];

    public function getValidationRules() {
        return [
            'name' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required',
        ];
    }

    protected function jwt($admin) {
        $payload = [
            'iss' => "lumen-jwt",
            'sub' => $admin->id,
            'iat' => time(), 
            'exp' => time() + 60*60
        ];
        
        return JWT::encode($payload, env('JWT_SECRET'));
    } 

    public function login(Request $request) {
        $admin = $this->where('email', $request->email)->first();

        if (!$admin) {
            return response()->json([
                'error' => 'Email does not exist.'
            ], 400);
        }

        if (Hash::check($request->password, $admin->password)) {
            return response()->json([
                'token' => $this->jwt($admin),
                'token_type' => 'bearer',
                'expires_in' => Auth::factory()->getTTL() * 60
            ], 200);
    
        }

        return response()->json([
            'error' => 'Email or password is wrong.'
        ], 400);
    }

    public function storeData(Request $request) 
    {
        $this->name = $request->input('name');
        $this->email = $request->input('email');
        $this->password = app('hash')->make($request->input('password'));
        
        return $this->responseWithCondition($this->save(), 'Admin successfully registered', 'Failed to register admin');
    }
}
