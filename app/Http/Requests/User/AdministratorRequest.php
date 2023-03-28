<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AdministratorRequest extends FormRequest
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
            'branch_id' => ['required', 'numeric', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'contact_no' => ['nullable', 'max:255'],
            'role_id' => ['required', 'max:255'],
            'notify_email_verification' => ['required', 'boolean'],
        ];
    }
}
