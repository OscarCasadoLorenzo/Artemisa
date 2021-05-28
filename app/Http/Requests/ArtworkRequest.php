<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtworkRequest extends FormRequest
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
            'title' => 'regex:/^[a-zA-Z- áéíóúÁÉÍÓÚ]+$/u|min:3|max:50|required',
            'movement' => 'regex:/^[a-zA-Z ,áéíóúÁÉÍÓÚ]+$/u|min:3|max:50|required',
            'genre' => 'regex:/^[a-zA-Z áéíóúÁÉÍÓÚ]+$/u|min:3|max:50|required',
            'dimensions' => array('regex:/^([0-9,. ]+(\s)?+(x|×|X)+(\s)?+[0-9., ]+(cm|mm|dm|m|hm|dam|km))|(Desconocido)|(desconocido)+$/'),
            'year' => 'regex:/^[0-9]+$/u|min:4|max:4|required',
            'author_id' => 'required',
            'collection_id' => 'required',

            //'imgRoute' => 'mimes:*.jpeg,*.png,*.jpg'
        ];
    }
}
