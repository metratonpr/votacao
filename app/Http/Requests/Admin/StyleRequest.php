<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StyleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:240'
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
