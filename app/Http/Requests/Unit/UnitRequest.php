<?php

namespace App\Http\Requests\Unit;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UnitRequest extends FormRequest
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
            'description' => ['nullable', 'min:6', 'max:255'],
            'model' => ['required', 'min:6', 'max:255'],
            'brand_id' => ['required', 'numeric', 'max:255'],
            'unit_classification_id' => ['required', 'numeric', 'max:255'],
            'created_by' => ['required', 'numeric', 'max:255'],
            'inclusions' => ['nullable', 'array'],
            'inclusions.*.unit_id' => ['required', 'numeric', 'max:255'],
            'inclusions.*.unit_inclusion_id' => ['required', 'numeric', 'max:255'],
            'inclusions.*.value' => ['nullable', 'max:255'],
        ];
    }
}
