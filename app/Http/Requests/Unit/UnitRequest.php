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
            'brand_id' => ['required', 'exists:brands,id', 'numeric', 'max:255'],
            'unit_classification_id' => ['required', 'exists:unit_classifications,id', 'numeric', 'max:255'],
            'range_from' => ['required', 'numeric'],
            'range_to' => ['required', 'numeric', 'gte:range_from'],
            'inclusions' => ['nullable', 'array', 'max:5'],
            'inclusions.*.unit_inclusion_id' => ['required', 'numeric', 'max:255'],
            'inclusions.*.value' => ['nullable', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }
}
