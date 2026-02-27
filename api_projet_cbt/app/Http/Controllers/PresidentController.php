<?php

namespace App\Http\Controllers;

use App\Http\Validation\PresidentValidation;
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


    public function store(Request $request, PresidentValidation $validation){
        $validator = validator($request->all(), $validation-> rules(), $validation->messages());
        
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $fullFileName = $request->file('url_image')->getClientOriginalName();
        $filename = pathinfo($fullFileName, PATHINFO_FILENAME);  // contiendra le nom sans l'extension  
        $extension = $request->file('url_image')->getClientOriginalExtension(); // contiendra l'extension du fichier
        $file = $filename . '_' . time() . '.' . $extension; // pour éviter les conflits de nom de fichier

        $request->file('url_image')->storeAs('public/presidents', $file); // stocker le fichier dans le dossier storage/app/private/public/presidents
        // Si le dossier n'existe pas, il sera créé automatiquement par Laravel

        $president = President::create([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'message' => $request->input('message'),
            'url_image' => $file,
        ]);
        
        return response()->json($president);

    }

}
