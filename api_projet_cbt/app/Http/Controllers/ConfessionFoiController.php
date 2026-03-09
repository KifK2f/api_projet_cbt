<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Validation\ConfessionFoiValidation;
use App\Models\ConfessionFoi;

class ConfessionFoiController extends Controller
{
    //Récupérer tout le contenu de la table
    public function index()
    {
        $confession = ConfessionFoi::all(); // Récupérer tous les éléments de la table confession-foi
        return response()->json($confession); // Retourner les données sous forme de JSON
    }


    public function store(Request $request, ConfessionFoiValidation $validation){
        $validator = validator($request->all(), $validation-> rules(), $validation->messages());
        
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $confession = ConfessionFoi::create([
            'content' => $request->input('content'),
            'verses' => $request->input('verses'),
        ]);
        
        return response()->json($confession);

    }
}
