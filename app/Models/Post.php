<?php

namespace App\Models;

use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[ObservedBy(PostObserver::class)]

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'member_category_id',
        'tittle',
        'slug',
        'image',
        'excerpt',
        'body',
    ];

    public function user (): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function member_category (): BelongsTo
    {
        return $this->belongsTo(MemberCategory::class);
    }
}
