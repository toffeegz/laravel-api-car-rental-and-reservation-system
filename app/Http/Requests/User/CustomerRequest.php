<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Foundation\Http\JsonRequest;

class CustomerRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'branch_id' => ['nullable', 'numeric', 'max:255'],
            'validid_verified_at' => ['nullable', 'date', 'before_or_equal:now'],
            'email' => ['nullable', 'email', 'required_without_all:contact_no', 'max:255'],
            'contact_no' => ['nullable', 'required_without_all:email', 'max:255'],
            'notify_email_verification' => ['required', 'boolean'],
        ];
    }
}
