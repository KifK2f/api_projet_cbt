<?php

namespace App\Http\Validation;

class EgliseValidation
{
    public function rules(){
        return [
            'zone_id' => ['required', 'exists:zones,id'], // Assurez-vous que la zone existe
            'name' => ['required', 'string', 'max:150'], 
            'pastor' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'max:50'], //Car il peut avoir plusieurs numéros séparer par un /
        ];
    }

    

   public function messages(){
        return [
            'zone_id.required' => 'L\'ID de la zone est requis.',
            'zone_id.exists' => 'La zone spécifiée n\'existe pas.',
            'name.required' => 'Le nom de l\'église est requis.',
            'name.string' => 'Le nom de l\'église doit être une chaîne de caractères.',
            'name.max' => 'Le nom de l\'église ne doit pas dépasser 150 caractères.',
            'name.unique' => 'Le nom de l\'église doit être unique.',
            'pastor.required' => 'Le nom du pasteur est requis.',
            'pastor.string' => 'Le nom du pasteur doit être une chaîne de caractères.',
            'phone.required' => 'Le numéro de téléphone est requis.',
            'phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'phone.max' => 'Le numéro de téléphone ne doit pas dépasser 50 caractères.',
        ];
    }
} 
