<?php

namespace App\Models;

use App\Observers\MemberCategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy(MemberCategoryObserver::class)]

class MemberCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];


    public function members (): HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function posts (): HasMany
    {
        return $this->hasMany(Post::class);
    }


}
