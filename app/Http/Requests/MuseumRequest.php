<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MuseumRequest extends FormRequest
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
            'name' => 'regex:/^([^0-9]*)$/|min:4|max:50|required',
            'location' => 'regex:/^([^0-9]*)$/|min:4|max:50|required',
            'address' => 'min:4|max:50|required',
            'email' => 'min:6|max:50|nullable|email',
        ];
    }
}
