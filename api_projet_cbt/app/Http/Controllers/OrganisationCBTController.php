<?php

namespace App\Http\Controllers;

use App\Http\Validation\OrganisationCBTValidation;
use App\Models\OrganisationCBT;
use Illuminate\Http\Request;

class OrganisationCBTController extends Controller
{
    // Retourner tous les personnes
     public function index()
    {
        $organisation = OrganisationCBT::orderBy('category')
            ->orderBy('position')
            ->get();

        return response()->json($organisation);
    }


    public function store(Request $request, OrganisationCBTValidation $validation){
        $validator = validator($request->all(), $validation-> rules(), $validation->messages());
        
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $fullFileName = $request->file('url_image')->getClientOriginalName();
        $filename = pathinfo($fullFileName, PATHINFO_FILENAME);  // contiendra le nom sans l'extension  
        $extension = $request->file('url_image')->getClientOriginalExtension(); // contiendra l'extension du fichier
        $file = $filename . '_' . time() . '.' . $extension; // pour éviter les conflits de nom de fichier

        $request->file('url_image')->storeAs('public/organisationCBT', $file); // stocker le fichier dans le dossier storage/app/private/public/organisationCBT
        // Si le dossier n'existe pas, il sera créé automatiquement par Laravel


        // Conversion propre du boolean
        $request->merge([
            'is_main' => filter_var($request->is_main, FILTER_VALIDATE_BOOLEAN)
        ]);
        // is_main: 1 → true
        // is_main: 0 → false

        $lastPosition = OrganisationCBT::where('category', $request->category)->max('position');

        $newPosition = $lastPosition ? $lastPosition + 1 : 1;
        
        $organisation = OrganisationCBT::create([
            'name' => $request->name,
            'role' => $request->role,
            'phone' => $request->phone,
            'type' => $request->type ?? 'blue',
            'category' => $request->category,
            'is_main' => $request->is_main ?? false,
            'position' => $newPosition, // calcul automatique
            'url_image' => $file,
        ]);

        return response()->json($organisation);
    }


}
