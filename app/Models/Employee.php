<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function languages(): HasMany
    {
        return $this->hasMany(Languages::class, 'employee_id', 'id');
    }


    public function getNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function getLanguagesKnownList()
    {
        $languagesKnown = $this->languages->pluck('language')->toArray();
       return implode(', ', $languagesKnown);
    }
}
