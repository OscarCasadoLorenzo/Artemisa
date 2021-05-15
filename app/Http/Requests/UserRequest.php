<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;

class UserRequest extends FormRequest
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
            'name' => 'min:4|max:50|required',
            'surname1' => 'min:4|max:50|required',
            'surname2' => 'min:4|max:50|required',
            'email' => 'min:6|max:50|required|email',
            'birth_date' => 'date',
            'location' => 'min:3|max:75|required',
            //'password' => ['required', Password::min(8)->mixedCase()->symbols()],
        ];
    }
}
