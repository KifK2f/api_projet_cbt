<?php

namespace App\Http\Validation;

class PresidentValidation
{
    public function rules(){
        return [
            'name' => ['required', 'string', 'max:150', 'unique:presidents,name'], // unique:presidents,name pour éviter les name en double dans la table presidents
            'title' => ['required', 'string', 'max:150', 'unique:presidents,title'], // unique:presidents,title pour éviter les titres en double dans la table presidents
            'message' => ['required'],
            'url_image' => ['required', 'image', 'mimes:jpeg,png,bmp,gif,svg,webp', 'max:2048'], // max:2048 pour limiter la taille de l'image à 2Mo
        ];
    }

    

    public function messages(){
        return [
            'name.required' => 'Vous devez spécifier le nom du président',
            'name.max' => 'Le nom du président ne doit pas dépasser 150 caractères',
            'name.unique' => 'Ce nom est déjà utilisé',
            'title.required' => 'Vous devez spécifier un titre',
            'title.max' => 'Le titre ne doit pas dépasser 150 caractères',
            'title.unique' => 'Ce titre est déjà utilisé',
            'message.required' => 'Vous devez spécifier un message',
            'image.required' => 'Vous devez spécifier une image',
            'image.image' => 'Votre format d\'image n\'est pas valide',
            'image.mimes' => ' formats acceptés : jpeg, png, bmp, gif, svg, webp',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 2Mo',
            'image.uploaded' => 'La taille dépasse la limite serveur (2Mo)',
        ];
    }
} 
