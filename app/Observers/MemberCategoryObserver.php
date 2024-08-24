<?php

namespace App\Observers;

use App\Models\MemberCategory;

class MemberCategoryObserver
{
    public function creating(MemberCategory $memberCategory): void
    {

        $memberCategory->slug = str()->slug($memberCategory->name);
        
    }
    
    public function updating(MemberCategory $memberCategory): void
    {
        
        $memberCategory->slug = str()->slug($memberCategory->name);
    }
}
