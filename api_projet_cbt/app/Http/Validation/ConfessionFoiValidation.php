<?php

namespace App\Http\Validation;

class ConfessionFoiValidation
{
    public function rules(){
        return [
            'content' => ['required', 'string'],
            'verses' => ['required', 'string'],
        ];
    }

    

   public function messages(){
        return [
            'content.required' => 'Vous devez spécifier le contenu',
            'verses.required' => 'Vous devez spécifier les versets',
        ];
    }
} 
