<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zones;
use App\Http\Validation\ZoneValidation;



class ZoneController extends Controller
{
    // Voir toutes les zones + filtres
    public function index(Request $request)
    {

        $query = Zones::with('eglises');

        if($request->has('name')){
            $query->where('name','like','%'.$request->name.'%');
        }

        if($request->has('year')){
            $query->where('year',$request->year);
        }

        if($request->has('moderator')){
            $query->where('moderator','like','%'.$request->moderator.'%');
        }

        $zones = $query->get();

        return response()->json($zones);
    }


    // voir une zone
    public function show($id)
    {
        $zone = Zones::with('eglises')->find($id);

        if(!$zone){
            return response()->json(['message'=>'Zone non trouvée'],404);
        }

        return response()->json($zone);
    }


    // créer une zone
    public function store(Request $request, ZoneValidation $validation)
    {

        $validator = validator($request->all(), $validation->rules(), $validation->messages());

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],401);
        }

        $zone = Zones::create([
            'name'=>$request->input('name'),
            'moderator'=>$request->input('moderator'),
            'phone'=>$request->input('phone'),
            'year'=>$request->input('year')
        ]);

        return response()->json($zone);
    }


    // modifier zone
    public function update(Request $request,$id)
    {

        $zone = Zones::find($id);

        if(!$zone){
            return response()->json(['message'=>'Zone non trouvée'],404);
        }

        $zone->update($request->all());

        return response()->json($zone);
    }


    // supprimer zone
    public function destroy($id)
    {

        $zone = Zones::find($id);

        if(!$zone){
            return response()->json(['message'=>'Zone non trouvée'],404);
        }

        $zone->delete();

        return response()->json(['message'=>'Zone supprimée']);
    }
}
