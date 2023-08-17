<?php

namespace App\Models\Zz;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'zz_categories';

    public $fillable = [
        'parent_id',
        'name'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static array $rules = [
        'parent_id' => 'nullable',
        'name' => 'required|string',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
