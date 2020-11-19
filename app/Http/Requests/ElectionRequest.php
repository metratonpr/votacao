<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElectionRequest extends FormRequest
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


            'name' => 'required|min:2|max:240',
            'description' => "max:240",
            'starts_in'=> "required",
            'ends_in'=> "required",
            'image' => "",
            'singers' => "required"

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
