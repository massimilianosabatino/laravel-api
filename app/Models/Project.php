<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['slug'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class)->withTimestamps();
    }

    protected function cover(): Attribute
    {
        return Attribute::make(
            get: function (string|null $value) {
                if ($value !== null AND Str::startsWith($value, 'upload')){
                    return asset('storage/' . $value);
                }
                if ($value !== null AND Str::startsWith($value, 'http')) {
                    return $value;
                }
                return null;
            }
        );
    }
}
