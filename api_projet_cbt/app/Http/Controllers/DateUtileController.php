<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DateUtile;
use App\Http\Validation\DateUtileValidation;

class DateUtileController extends Controller
{

    // Voir toutes les dates utiles + filtres
    public function index(Request $request)
    {

        $query = DateUtile::query();

        if($request->has('year')){
            $query->where('year',$request->year);
        }

        if($request->has('title')){
            $query->where('title','like','%'.$request->title.'%');
        }

        $dates = $query->orderBy('event_date','asc')->get();

        return response()->json($dates);
    }


    // voir une date
    public function show($id)
    {

        $date = DateUtile::find($id);

        if(!$date){
            return response()->json(['message'=>'Date utile non trouvée'],404);
        }

        return response()->json($date);
    }


    // créer une date utile
    public function store(Request $request, DateUtileValidation $validation)
    {

        $validator = validator($request->all(), $validation->rules(), $validation->messages());

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],401);
        }

        $date = DateUtile::create([

            'title'=>$request->input('title'),
            'label'=>$request->input('label'),
            'event_date'=>$request->input('event_date'),
            'year'=>$request->input('year')

        ]);

        return response()->json($date);
    }


    // modifier date utile
    public function update(Request $request,$id)
    {

        $date = DateUtile::find($id);

        if(!$date){
            return response()->json(['message'=>'Date utile non trouvée'],404);
        }

        $date->update($request->all());

        return response()->json($date);
    }


    // supprimer date utile
    public function destroy($id)
    {

        $date = DateUtile::find($id);

        if(!$date){
            return response()->json(['message'=>'Date utile non trouvée'],404);
        }

        $date->delete();

        return response()->json(['message'=>'Date utile supprimée']);
    }

}