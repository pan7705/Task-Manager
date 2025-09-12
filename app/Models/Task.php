<?php

namespace App\Models;

use App\Models\Project;
use App\Models\Category;
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
        'project_id',
        'user_id',
    ];

    //table relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
