<?php

namespace App\Http\Resources;

use App\Models\Director;
use App\Models\Media;
use App\Models\MovieGenres;
use App\Models\MovieLanguage;
use App\Models\MovieWarning;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $movie_warnings = collect();
        foreach (json_decode($this->movie_warnings) as $warning_id ){
            $movie_warnings->push(new MovieWarningResource(MovieWarning::find($warning_id)));
        }

        return[
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'duration_min' => $this->duration_min,
            'media' => $this->media == null ? null : new MediaResource(Media::find($this->media_id)),
            'director' => new DirectorResource($this->director),
            'casts' => CastResource::collection($this->casts),
            'genres' => MovieGenresResource::collection($this->genres),
            'language' => MovieLanguage::find($this->language_id)->title,
            'trailer_url' => $this->trailer_url,
            'movie_warnings' => $movie_warnings
            
        ];


    }

   
}
