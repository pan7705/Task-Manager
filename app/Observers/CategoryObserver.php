<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    public function creating(Category $category)
    {
        if(auth()->check()) {
            $category->user_id = auth()->id();
        }
    }
}
