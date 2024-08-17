<?php

namespace App\Observers;

use App\Models\Rule;


class RuleObaserver
{
    public function creating(Rule $rule): void
    {

        $rule->slug = str()->slug($rule->name);
        
    }
    
    public function updating(Rule $rule): void
    {
        
        $rule->slug = str()->slug($rule->name);
    }
}
