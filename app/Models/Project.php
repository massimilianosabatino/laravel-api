<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    //Slug is created from title on controller
    protected $guarded = ['slug'];

    //Changes the behavior of the model. Use slug instead of id for search
    public function getRouteKeyName()
    {
       return 'slug';
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class)->withTimestamps();
    }

    // Return correct path for images.
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
