<?php 
namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VerifyIdRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id_type' => ['required', 'max:255'],
            'front_image' => ['required', 'image', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg'],
            'back_image' => ['required', 'image', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg'],
        ];
    }

}
