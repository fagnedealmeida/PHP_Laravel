<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'nome' => 'required|min:3|max:15',
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo nome é obrigatório',
            'nome.min' => 'o campo nome deve ter pelo menos 3 letras',
            'nome.max' => 'o campo nome deve ter no máximo 20 letras'
        ];
    }
}
