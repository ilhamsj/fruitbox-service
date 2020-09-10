<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use JsonResponse;

    public function __construct(Post $post)
    {
        $this->posts = $post;
    }
    
    public function index()
    {
        $posts = $this->posts->getAll();
        return $this->responseWithCondition($posts, 'Data successfully retrieved', 'Failed to retrieve data');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->posts->getValidationRules());
        
        $post = $this->posts->saveData($request);
        return $this->responseWithCondition($post, 'Data successfully stored', 'Failed to store data');
    }

    public function show($id)
    {
        $posts = $this->posts->find($id);
        return $this->responseWithCondition($posts, 'Data successfully retrieved', 'Failed to retrieve data');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->posts->getValidationRules());
        $post_update = $this->posts->updateData($id, $request);

        return $this->responseWithCondition($post_update, 'Data successfully updated', 'Failed to update data');
    }

    public function destroy($id)
    {
        $post = $this->posts->destroy($id);
        return $this->responseWithCondition($post, 'Data successfully deleted', 'Failed to delete data');
    }
}
