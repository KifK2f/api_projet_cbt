<?php

namespace App\Http\Controllers;

use App\Models\President;
use Illuminate\Http\Request;


class PresidentController extends Controller
{
    //Récupérer tout le contenu de la table photos
    public function index()
    {
        $president = President::all(); // Récupérer tous les éléments de la table president
        return response()->json($president); // Retourner les données sous forme de JSON
    }
}
