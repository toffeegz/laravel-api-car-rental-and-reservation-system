<?php

namespace App\Http\Requests\InclusionType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InclusionTypeRequest extends FormRequest
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
            'name' => ['required', Rule::unique('inclusion_types', 'name')->ignore($this->id)],
            'default_value' => ['required', 'min:1', 'max:255'],
            'description' => ['nullable', 'min:3', 'max:255'],
            'icon_path' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }
}
