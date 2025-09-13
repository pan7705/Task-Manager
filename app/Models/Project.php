<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable =
    [
        'name',
        'description',
        'user_id'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
