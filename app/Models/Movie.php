<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'description', 'duration_min', 'director_id', 'media_id', 'language_id', 'movie_warnings', 'trailer_url'
    ];

    public function director()
    {
        return $this->hasOne(Director::class, 'id','director_id');
    }

    public function casts()
    {
        return $this->belongsToMany(Cast::class, 'rs_casts_movies', 'movie_id', 'cast_id');

    }

    public function genres()
    {
        return $this->belongsToMany(MovieGenres::class, 'rs_movies_genres', 'movie_id', 'genre_id');

    }
}
