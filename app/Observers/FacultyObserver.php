<?php

namespace App\Observers;

use App\Models\Faculty;

class FacultyObserver
{
    public function creating(Faculty $faculty): void
    {

        $originalSlug = str()->slug($faculty->name);
        $slug = $originalSlug;
        $count = 1;

        while (Faculty::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $faculty->slug = $slug;
        
    }
    
    public function updating(Faculty $faculty): void
    {
        
        $originalSlug = str()->slug($faculty->name);
        $slug = $originalSlug;
        $count = 1;

        while (Faculty::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $faculty->slug = $slug;
    }
}
