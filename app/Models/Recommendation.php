<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recommendation extends Model
{
    use HasFactory;


    protected $fillable = [
        'type_id',
        'name',
        'nim',
        'address',
        'telephone',
        'faculty_id',
        'generation',
        'body',
    ];



    public function faculty (): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }
}
