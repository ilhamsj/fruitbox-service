<?php

namespace App\Http\Controllers\V1;

use App\Admin;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\JsonResponse;



class AdminAuthController extends BaseController 
{
    use JsonResponse;
    private $request;

    public function __construct(Request $request, Admin $admin) 
    {
        $this->request = $request;
        $this->admin = $admin;
    }

    public function authenticate() 
    {
        $this->validate($this->request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        return $data = $this->admin->login($this->request);

    }

    public function register() 
    {
        $this->validate($this->request, $this->admin->getValidationRules());
        return $this->admin->storeData($this->request);
    }
}