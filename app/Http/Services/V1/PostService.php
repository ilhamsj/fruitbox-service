<?php 

namespace App\Http\Services\V1;

use App\Helpers\Crud;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostService
{
    public function storeHandle(Request $request, $table)
    {
        if($request->method() == 'POST') {
            return $this->save($request, $table);
        } else {
            return $this->update($request, $table);
        }
    }

    private function save(Request $request, $table)
    {
        $validator = Validator::make($request->all(), [
            'title'          => 'required',
            'description'   => 'required'
        ]);

        // if($validator->fails())
        //     throw ValidationException($validator);

        $request->validate($request, [
            'title'          => 'required',
            'description'   => 'required'
        ]);
        $store = Crud::save($table, $request->all());

        return $store ? $store : false;
    }

    private function update(Request $request, $table)
    {
        $validator = Validator::make($request->all(), [
            'uuid' => 'required'
        ]);

        if($validator->fails())
            throw new ValidationException($validator);
        
        $store = $table->patch($request->all(), $request->uuid);

        return $store ? $store : false;
    }
}