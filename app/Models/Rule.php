<?php

namespace App\Models;

use App\Observers\RuleObaserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[ObservedBy(RuleObaserver::class)]

class Rule extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'period',
        'rule_category_id',
        'file',
    ];


    public function scopeFilterRule(Builder $query, array $filters): void
    {

        $query->when($filters['search'] ?? false, fn ($query, $search) =>

            $query->where('name', 'like', '%' . $search . '%' )
                // ->orWhere('period', 'like', '%' . $search . '%')
        );

        $query->when($filters['category'] ?? false, fn ($query, $category) =>

            $query->whereHas('ruleCategory', fn ($query) => $query->where('slug', $category))
        );

        // $query->when($filters['period'] ?? false, fn ($query, $period) =>

        //     $query->where('period', $period)
        // );

        
    }

    public function scopeFilterRulePeriod(Builder $query, array $filters): void
    {


        $query->when($filters['period'] ?? false, fn ($query, $period) =>

            $query->where('period', $period)
        );

        
    }
    

    public function ruleCategory (): BelongsTo
    {
        return $this->belongsTo(RuleCategory::class);
    }
}
