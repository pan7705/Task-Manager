<?php

namespace App\Observers;

use App\Models\Task;

class TaskObserver
{
    public function creating(Task $task)
    {
        if(auth()->check()) {
            $task->user_id = auth()->id();
        }
    }
}
