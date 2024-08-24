<?php

namespace App\Models;

use App\Observers\FacultyObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy(FacultyObserver::class)]

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'color',
    ];




    public function aspirations (): HasMany
    {
        return $this->hasMany(Aspiration::class);
    }

    public function recommendations (): HasMany
    {
        return $this->hasMany(Recommendation::class);
    }

}
