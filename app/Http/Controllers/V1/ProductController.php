<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource as Resource;
use App\Models\Product;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use JsonResponse;

    public function __construct(Product $product)
    {
        $this->products = $product;
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
    public function index()
    {
        $products = Resource::collection($this->products->all());
        return $this->responseWithCondition($products, 'Data successfully retrieved', 'Failed to retrieve data');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->products->getValidationRules());
        
        $product = $this->products->create($request->all());
        return $this->responseWithCondition($product, 'Data successfully stored', 'Failed to store data');
    }

    public function show($id)
    {
        $products = new Resource($this->products->find($id));
        return $this->responseWithCondition($products, 'Data successfully retrieved', 'Failed to retrieve data');
    }

    public function update(Request $request, $id)
    {
        $product_update = $this->products->updateData($request, $id);

        return $this->responseWithCondition($product_update, 'Data successfully updated', 'Failed to update data');
    }

    public function destroy($id)
    {
        $product = $this->products->destroy($id);
        return $this->responseWithCondition($product, 'Data successfully deleted', 'Failed to delete data');
    }
}
