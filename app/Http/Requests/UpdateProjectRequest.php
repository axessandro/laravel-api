<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'type_id' => ['nullable', 'exists:types,id'],
            'name' => ['required', 'max:50', Rule::unique('projects')->ignore($this->project)],
            'description' => ['nullable'],
            'img' => ['nullable', 'max:512', 'image'],
            'technologies' => ['exists:technologies,id']
        ];
    }
}
