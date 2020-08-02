<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            // 'name' => ['string', 'max:255'],
            // 'surname' => ['string', 'max:255'],
            // 'username' => ['string', 'max:255'],
            // 'email' => ['string', 'email', 'max:255', 'unique:users'],
        ];
    }
}
