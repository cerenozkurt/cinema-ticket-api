<?php

namespace App\Http\Requests\Movie;

use Illuminate\Foundation\Http\FormRequest;

class MovieUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'max:500',
            'description' => 'max:3000',
            'duration_min' => 'integer',
            'language_id' => 'exists:movie_languages,id',
            'movie_warnings' => 'array',
            'trailer_url' => 'max:300',
            'casts' => 'array',
            'movie_genres' => 'array'
        ];
    }
}
