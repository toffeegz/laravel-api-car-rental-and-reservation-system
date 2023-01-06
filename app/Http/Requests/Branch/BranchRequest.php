<?php

namespace App\Http\Requests\Branch;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BranchRequest extends FormRequest
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
            'name' => ['required', Rule::unique('branches', 'name')->ignore($this->name)],
            'location' => ['required', 'min:6', 'max:255'],
            'description' => ['nullable', 'min:6', 'max:255'],
        ];
    }
}
