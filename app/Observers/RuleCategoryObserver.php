<?php

namespace App\Observers;

use App\Models\RuleCategory;

class RuleCategoryObserver
{
    public function creating(RuleCategory $ruleCategory): void
    {
        $originalSlug = str()->slug($ruleCategory->name);
        $slug = $originalSlug;
        $count = 1;

        while (RuleCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $ruleCategory->slug = $slug;
        $ruleCategory->slug = str()->slug($ruleCategory->name);
        
    }
    
    public function updating(RuleCategory $ruleCategory): void
    {
        $originalSlug = str()->slug($ruleCategory->name);
        $slug = $originalSlug;
        $count = 1;

        while (RuleCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $ruleCategory->slug = $slug;

    }
}
