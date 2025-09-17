<?php

namespace App\Models;

use App\Models\User;
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

    public function scopeSearch($query, $search = null)
    {
        $query->when($search, function ($query2) use ($search) {
            if($search){
                $query2->where('title', 'like', "%{$search}%");
                $query2->orWhere('description', 'like', "%{$search}%");
                $query2->orWhere('due_date', 'like', "%{$search}%");
                $query2->orWhere('status', 'like', "%{$search}%");
                $query2->orWhere('category_id', 'like', "%{$search}%");
                $query2->orWhere('project_id', 'like', "%{$search}%");
            }
        });
    }
}
