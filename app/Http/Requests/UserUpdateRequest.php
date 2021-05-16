<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;

class UserUpdateRequest extends FormRequest
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
            'name' => 'regex:/^[a-zA-Z]+$/u|min:3|max:50|required',
            'surname1' => 'regex:/^[a-zA-Z]+$/u|min:3|max:50|required',
            'surname2' => 'regex:/^[a-zA-Z]+$/u|min:3|max:50|required',
            'email' => 'required',
            'birth_date' => 'date',
            'location' => 'regex:/^[a-zA-Z]+$/u|min:3|max:75|required',
            //'password' => ['required', Password::min(8)->mixedCase()->symbols()],
        ];
    }
}
