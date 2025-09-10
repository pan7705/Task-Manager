<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable =
    [
        'name',
        'description'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
