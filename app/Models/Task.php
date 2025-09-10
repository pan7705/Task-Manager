<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'status',
        'category_id',
    ];

    //table relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
