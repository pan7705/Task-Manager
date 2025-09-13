<?php

namespace App\Observers;

use App\Models\Project;

class ProjectObserver
{
    public function creating(Project $project)
    {
        if(auth()->check()) {
            $project->user_id = auth()->id();
        }
    }
}
