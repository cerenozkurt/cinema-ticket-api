<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cast extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'media_id','description'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'rs_casts_movies', 'cast_id','movie_id');

    }
}
