<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'name',
        'major',
        'position',
        'member_category_id',
        'image',
    ];

    public function scopeFilter(Builder $query, array $filters): void
    {

        $query->when($filters['search'] ?? false, fn ($query, $search) =>

            $query->where('name', 'like', '%' . $search . '%' )
                // ->orWhere('nim', 'like', '%' . $search . '%')
                // ->orWhere('major', 'like', '%' . $search . '%')
                // ->orWhere('position', 'like', '%' . $search . '%')
        );

        $query->when($filters['category'] ?? false, fn ($query, $category) =>

            $query->whereHas('memberCategory', fn ($query) => $query->where('slug', $category))
        );
    }


    public function memberCategory (): BelongsTo
    {
        return $this->belongsTo(MemberCategory::class);
    }
    

}
