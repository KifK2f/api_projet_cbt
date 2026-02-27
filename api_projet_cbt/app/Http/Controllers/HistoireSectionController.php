<?php

namespace App\Http\Controllers;

use App\Http\Validation\HistoireSectionValidation;
use App\Models\HistoireSection;
use Illuminate\Http\Request;

class HistoireSectionController extends Controller
{
    //Récupérer tout le contenu de la table
    public function index()
    {
        // $histoire = HistoireSection::all(); // Récupérer tous les éléments de la table mais ne garantit pas l'ordre
        $histoire = HistoireSection::orderBy('order')->get();
        return response()->json($histoire); // Retourner les données sous forme de JSON
    }


    public function store(Request $request, HistoireSectionValidation $validation){
        $validator = validator($request->all(), $validation-> rules(), $validation->messages());
        
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $nextOrder = HistoireSection::max('order') + 1; //Le order ne doit pas eter siais dans le formulaire


        $histoire = HistoireSection::create([
            'order' => $nextOrder,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        
        return response()->json($histoire);

    }
}
