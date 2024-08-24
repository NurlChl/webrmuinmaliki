<?php

namespace App\Observers;

use App\Models\Faculty;

class FacultyObserver
{
    public function creating(Faculty $faculty): void
    {

        $faculty->slug = str()->slug($faculty->name);
        
    }
    
    public function updating(Faculty $faculty): void
    {
        
        $faculty->slug = str()->slug($faculty->name);
    }
}
