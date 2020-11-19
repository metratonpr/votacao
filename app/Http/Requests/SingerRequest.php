<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SingerRequest extends FormRequest
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

            'fullName' => 'required|min:2|max:240',
            'nickname' => 'max:240',
            'description' => 'max:240',
            'image' => 'required'
        ];
    }

    public function messages(){
        return [
            'required' => 'Campo obrigatorio',
            'max' => 'O limite maximo de :max caracteres foi atingido!',
            'min' => 'O campo deve possuir o minimo de :min caracteres!',
        ];
    }
}
