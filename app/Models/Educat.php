<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Educat extends Model
{
    use HasFactory;

    use Sluggable;


    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'education_level'
            ]
        ];
    }
}
