<?php

namespace App\Observers;

use App\Models\RuleCategory;

class RuleCategoryObserver
{
    public function creating(RuleCategory $ruleCategory): void
    {

        $ruleCategory->slug = str()->slug($ruleCategory->name);
        
    }
    
    public function updating(RuleCategory $ruleCategory): void
    {
        
        $ruleCategory->slug = str()->slug($ruleCategory->name);
    }
}
