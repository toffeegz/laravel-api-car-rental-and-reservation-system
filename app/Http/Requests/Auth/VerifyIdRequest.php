<?php 

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VerifyIdRequest extends FormRequest
{
    public function rules()
    {
        $ids = $this->input('ids', []);
        $idTypes = array_column($ids, 'id_type');

        $rules = [
            'ids' => 'required|array',
            'ids.*.id_type' => [
                'required',
                Rule::in($idTypes),
            ],
        ];

        foreach ($idTypes as $idType) {
            $rules['ids.' . $idType . '.front_image'] = ['required', 'image', 'dimensions:min_width=500,min_height=500', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg'];
            $rules['ids.' . $idType . '.back_image'] =  ['required', 'image', 'dimensions:min_width=500,min_height=500', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'ids.required' => 'The IDs field is required.',
            'ids.array' => 'The IDs field must be an array.',
            'ids.*.id_type.required' => 'The ID type field is required for all IDs.',
            'ids.*.id_type.in' => 'The selected ID type is invalid.',
            'ids.*.front_image.required' => 'The front image is required for all IDs.',
            'ids.*.front_image.image' => 'The front image must be a valid image file.',
            'ids.*.back_image.required' => 'The back image is required for all IDs.',
            'ids.*.back_image.image' => 'The back image must be a valid image file.',
        ];
    }
}
