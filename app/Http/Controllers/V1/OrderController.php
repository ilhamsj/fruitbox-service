<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource as Resource;
use App\Models\Order;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use JsonResponse;

    public function __construct(Order $data)
    {
        $this->data = $data;
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
    public function index()
    {
        $data = Resource::collection($this->data->all());
        return $this->responseWithCondition($data, 'Data successfully retrieved', 'Failed to retrieve data');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->data->getValidationRules());
        
        $data = $this->data->create($request->all());
        return $this->responseWithCondition($data, 'Data successfully stored', 'Failed to store data');
    }

    public function show($id)
    {
        $data = new Resource($this->data->find($id));
        return $this->responseWithCondition($data, 'Data successfully retrieved', 'Failed to retrieve data');
    }

    public function update(Request $request, $id)
    {
        $data_update = $this->data->updateData($request, $id);

        return $this->responseWithCondition($data_update, 'Data successfully updated', 'Failed to update data');
    }

    public function destroy($id)
    {
        $data = $this->data->destroy($id);
        return $this->responseWithCondition($data, 'Data successfully deleted', 'Failed to delete data');
    }
}
