<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Validator;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title', 'description'
    ];

    public function getAll() {
        return $this->all();
    }

    public function saveData($request) {
        return $this->create($request->all());
    }
 }
