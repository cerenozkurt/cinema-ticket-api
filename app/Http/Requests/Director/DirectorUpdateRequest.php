<?php

namespace App\Http\Requests\Director;

use Illuminate\Foundation\Http\FormRequest;

class DirectorUpdateRequest extends FormRequest
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
            'name' => 'max:150',
            'description' => 'max:1000',
        ];
    }
}
