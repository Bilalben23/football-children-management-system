<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "first_name",
        "last_name",
        "birth_date",
        "image_url",
        "user_id"
    ];

     protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->first_name . ' ' . $this->last_name,
        );
    }

  protected function firstName(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::ucfirst(Str::lower($value)),
        );
    }
    protected function lastName(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::ucfirst(Str::lower($value)),
        );
    }
    public function childNotes(): HasMany {
        return $this->hasMany(ChildNote::class);
    }

}