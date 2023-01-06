<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionRequest extends FormRequest
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
            'reservation_id' => ['required', 'numeric', 'max:255'],
            'transaction_status_id' => ['required', 'numeric', 'max:255'],
            'created_by' => ['required', 'numeric', 'max:255'],
            'description' => ['nullable', 'min:6', 'max:255'],
        ];
    }
}
