<?php

namespace App\Http\Controllers;

use App\Models\Eglises;
use Illuminate\Http\Request;
use App\Http\Validation\EgliseValidation;


class EgliseController extends Controller
{
    // voir toutes les églises + filtres
    public function index(Request $request)
    {

        $query = Eglises::with('zone');

        if($request->has('zone_id')){
            $query->where('zone_id',$request->zone_id);
        }

        if($request->has('name')){
            $query->where('name','like','%'.$request->name.'%');
        }

        $eglises = $query->get();

        return response()->json($eglises);
    }


    // voir une église
    public function show($id)
    {

        $eglise = Eglises::with('zone')->find($id);

        if(!$eglise){
            return response()->json(['message'=>'Eglise non trouvée'],404);
        }

        return response()->json($eglise);
    }


    // créer église
    public function store(Request $request, EgliseValidation $validation)
    {

        $validator = validator($request->all(), $validation->rules(), $validation->messages());

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],401);
        }

        $eglise = Eglises::create([
            'zone_id'=>$request->input('zone_id'),
            'name'=>$request->input('name'),
            'pastor'=>$request->input('pastor'),
            'phone'=>$request->input('phone')
        ]);

        return response()->json($eglise);
    }


    // modifier église
    public function update(Request $request,$id)
    {

        $eglise = Eglises::find($id);

        if(!$eglise){
            return response()->json(['message'=>'Eglise non trouvée'],404);
        }

        $eglise->update($request->all());

        return response()->json($eglise);
    }


    // supprimer église
    public function destroy($id)
    {

        $eglise = Eglises::find($id);

        if(!$eglise){
            return response()->json(['message'=>'Eglise non trouvée'],404);
        }

        $eglise->delete();

        return response()->json(['message'=>'Eglise supprimée']);
    }

}
