<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieValidator;
use App\Models\Categorie;
use Illuminate\Http\Request;

class GestionAdmin extends Controller
{
    public function newcat(){
        return view('categorienew',['categorie'=>new Categorie()]);
    }
    public function savecat(CategorieValidator $request){
        Categorie::create($request->validated());
        return back()->with("success","Categorie créer avec success");
    }
    public function editcat(Categorie $categorie){
        //dd($categorie);
        return view('categorienew',['categorie'=>$categorie]);
    }
    public function updatecat(CategorieValidator $request, Categorie $categorie){
        $categorie->update($request->validated());
        return back()->with("success","Categorie modifiée avec success");
    }
    public function deletcat(Categorie $categorie){
        //dd($categorie);
        $categorie->delete();
        return redirect(route("dashboard") . '#categories')->with("success", "Categorie supprimée avec success");

        //return to_route("dashboard")->with("success","Categorie supprimée avec success");
    }
}
