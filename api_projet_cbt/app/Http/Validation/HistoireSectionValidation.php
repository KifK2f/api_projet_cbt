<?php

namespace App\Http\Validation;

class HistoireSectionValidation
{
    public function rules(){
        return [
            'order' => ['integer', 'unique:histoire_sections,name'], 
            'title' => ['required', 'string', 'max:150', 'unique:histoire_sections,title'],
            'content' => ['required'],
        ];
    }

    

   public function messages(){
        return [
            'order.integer' => 'L\'ordre doit être un nombre',
            'order.unique' => 'Cet ordre existe déjà',

            'title.required' => 'Vous devez spécifier un titre',
            'title.max' => 'Le titre ne doit pas dépasser 150 caractères',
            'title.unique' => 'Ce titre est déjà utilisé',

            'content.required' => 'Vous devez spécifier le contenu',
        ];
    }
} 
