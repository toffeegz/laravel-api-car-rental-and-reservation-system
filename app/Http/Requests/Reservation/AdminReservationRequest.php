<?php

namespace App\Http\Requests\Reservation;

use Illuminate\Foundation\Http\FormRequest;

class AdminReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'user_id' => ['required', 'numeric', 'max:255'],
            'status' => ['required', 'numeric', 'max:10'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'pickup_location' => ['required', 'min:3', 'max:255'],
            'destination' => ['required', 'min:3', 'max:255'],
        ];
    }
}
