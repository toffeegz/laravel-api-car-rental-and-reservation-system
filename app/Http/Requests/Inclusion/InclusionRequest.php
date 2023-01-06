<?php

namespace App\Http\Requests\Inclusion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InclusionRequest extends FormRequest
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
            'unit_id' => ['required', 'numeric', 'max:255'],
            'unit_inclusion_id' => ['required', 'numeric', 'max:255'],
            'value' => ['nullable', 'max:255'],
        ];
    }
}
