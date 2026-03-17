<?php

namespace App\Http\Validation;

class DateUtileValidation
{
    public function rules(){
        return [

            'title' => ['required','string','max:200'],

            'label' => ['required','string','max:50'],

            'event_date' => ['nullable','date'],

            'year' => ['required','integer','digits:4']

        ];
    }

    public function messages(){

        return [

            'title.required' => "Le titre de l'événement est requis.",
            'title.string' => "Le titre doit être une chaîne de caractères.",
            'title.max' => "Le titre ne doit pas dépasser 200 caractères.",

            'label.required' => "Le label de la date est requis (ex: 25 Janv).",
            'label.string' => "Le label doit être une chaîne de caractères.",
            'label.max' => "Le label ne doit pas dépasser 50 caractères.",

            'event_date.date' => "La date de l'événement doit être une date valide.",

            'year.required' => "L'année est requise.",
            'year.integer' => "L'année doit être un entier.",
            'year.digits' => "L'année doit comporter exactement 4 chiffres."

        ];
    }
}