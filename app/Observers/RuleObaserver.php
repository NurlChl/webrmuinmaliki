<?php

namespace App\Observers;

use App\Models\Rule;


class RuleObaserver
{
    public function creating(Rule $rule): void
    {
        $originalSlug = str()->slug($rule->name);
        $slug = $originalSlug;
        $count = 1;

        while (Rule::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $rule->slug = $slug;
        
    }
    
    public function updating(Rule $rule): void
    {
        
        $originalSlug = str()->slug($rule->name);
        $slug = $originalSlug;
        $count = 1;

        while (Rule::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $rule->slug = $slug;
    }
}
