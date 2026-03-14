<?php

namespace App\Http\Validation;

class ZoneValidation
{
    public function rules(){
        return [
            'name' => ['required', 'string', 'max:150', 'unique:zones,name'], 
            'moderator' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'max:50'], //Car il peut avoir plusieurs numéros séparer par un /
            'year' => ['required', 'integer', 'digits:4'],
        ];
    }

    

   public function messages(){
        return [
            'name.required' => 'Le nom de la zone est requis.',
            'name.string' => 'Le nom de la zone doit être une chaîne de caractères.',
            'name.max' => 'Le nom de la zone ne doit pas dépasser 150 caractères.',
            'name.unique' => 'Le nom de la zone doit être unique.',
            'moderator.required' => 'Le nom du modérateur est requis.',
            'moderator.string' => 'Le nom du modérateur doit être une chaîne de caractères.',
            'moderator.max' => 'Le nom du modérateur ne doit pas dépasser 150 caractères.',
            'phone.required' => 'Le numéro de téléphone est requis.',
            'phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'phone.max' => 'Le numéro de téléphone ne doit pas dépasser 50 caractères.',
            'year.required' => "L'année d'établissement de la zone est requise.",
            'year.integer' => "L'année d'établissement de la zone doit être un entier.",
            'year.digits' => "L'année d'établissement de la zone doit comporter exactement 4 chiffres.",
        ];
    }
} 
