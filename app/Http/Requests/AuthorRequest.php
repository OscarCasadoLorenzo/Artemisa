<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name' => 'regex:/^[a-zA-Z- áéíóúÁÉÍÓÚ]+$/u|min:3|max:50|required',
            'nacionality' => 'regex:/^[a-zA-Z -áéíóúÁÉÍÓÚ]+$/u|min:3|max:50|required',
            'birth_date' => 'regex:/^[0-9]+$/u|min:4|max:4|required',
            'movement' => 'regex:/^[a-zA-Z ,áéíóúÁÉÍÓÚ]+$/u|min:3|max:50|required'
        ];
    }
}
