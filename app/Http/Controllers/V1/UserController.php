<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\JsonResponse;

class UserController extends Controller
{
    use JsonResponse;

    public function __construct(User $user)
    {
        $this->users = $user;
    }
    
    public function index()
    {
        $data = $this->users->all();
        return $this->responseWithCondition($data, 'Data successfully retrieved', 'Failed to retrieve data');
    }
}
