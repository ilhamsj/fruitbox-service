<?php

namespace App\Models;

use App\Helpers\Crud;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title', 'description'
    ];

    public function getValidationRules() {
        return [
            'title' => 'required|min:10',
            'description' => 'required|min:15',
        ];
    }

    public function getById($id) {
        return Crud::findOne($this, 'id', $id);
    }

    public function getAll() {
        return $this->all();
    }

    public function saveData($request) {
        return Crud::save($this, $request->all());
    }

    public function updateData($id, $request) {
        return Crud::update($this, $request->all(), 'id', $id);
    }
 }
