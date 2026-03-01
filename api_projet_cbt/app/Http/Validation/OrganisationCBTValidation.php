<?php

namespace App\Http\Validation;

class OrganisationCBTValidation
{
  public function rules(){
        return [
            'name' => ['required', 'string', 'max:150'],
            'role' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'max:50'], //Car il peut avoir plusieurs numéros séparer par un /
            'type' => ['required', 'in:gold,blue'],
            'category' => ['required', 'in:executif,departement,zone'],
            'is_main' => ['boolean'],
            'url_image' => ['required', 'image', 'mimes:jpeg,png,bmp,gif,svg,webp', 'max:2048'], // max:2048 pour limiter la taille de l'image à 2Mo
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Le nom est obligatoire',
            'name.max' => 'Le nom ne doit pas dépasser 150 caractères',
            'role.required' => 'Le rôle est obligatoire',
            'role.max' => 'Le rôle ne doit pas dépasser 150 caractères',
            'phone.required' => 'Le ou les numéros de téléphones est/sont obligatoire(s)',
            'phone.max' => 'Le ou les numéros de téléphones ne doivent pas dépasser 50 caractères',
            'type.required' => 'Le type est obligatoire',
            'type.in' => 'Le type doit être gold ou blue',
            'category.required' => 'La catégorie est obligatoire',
            'category.in' => 'La catégorie doit être executif, departement ou zone',
            'image.required' => 'Vous devez spécifier une image',
            'image.image' => 'Votre format d\'image n\'est pas valide',
            'image.mimes' => ' formats acceptés : jpeg, png, bmp, gif, svg, webp',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 2Mo',
            'image.uploaded' => 'La taille dépasse la limite serveur (2Mo)',
        ];
    }
} 
