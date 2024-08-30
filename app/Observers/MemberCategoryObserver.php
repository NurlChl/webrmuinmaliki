<?php

namespace App\Observers;

use App\Models\MemberCategory;

class MemberCategoryObserver
{
    public function creating(MemberCategory $memberCategory): void
    {
        $originalSlug = str()->slug($memberCategory->name);
        $slug = $originalSlug;
        $count = 1;

        while (MemberCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $memberCategory->slug = $slug;
        
    }
    
    public function updating(MemberCategory $memberCategory): void
    {
        
        $originalSlug = str()->slug($memberCategory->name);
        $slug = $originalSlug;
        $count = 1;

        while (MemberCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $memberCategory->slug = $slug;
    }
}
