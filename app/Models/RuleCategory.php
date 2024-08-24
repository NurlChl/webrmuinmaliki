<?php

namespace App\Models;

use App\Observers\RuleCategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy(RuleCategoryObserver::class)]

class RuleCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];


    public function rules (): HasMany
    {
        return $this->hasMany(Rule::class);
    }
}
