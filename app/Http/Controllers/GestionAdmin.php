<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieValidator;
use App\Models\Categorie;
use App\Models\Post;
use App\Models\User;
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

    public function toggleRole(User $user)
    {
        // Empêcher la modification de son propre rôle
        if (auth()->id() === $user->id) {
            return redirect(route("dashboard") . '#utilisateur')->with('error', 'Vous ne pouvez pas modifier votre propre rôle.');
        }

        // Basculer le rôle (0 pour admin, 1 pour utilisateur normal)
        $user->role = $user->role === 0 ? 1 : 0;
        $user->save();

        $roleText = $user->role === 0 ? 'administrateur' : 'utilisateur';
        return redirect(route("dashboard") . '#utilisateur')->with('success', "Le rôle de {$user->name} a été changé en {$roleText}.");
    }

    public function deleteUser(User $user)
    {
        // Empêcher la suppression de son propre compte
        if (auth()->id() === $user->id) {
            return redirect(route("dashboard") . '#utilisateur')->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        $userName = $user->name;
        $user->delete();

        return redirect(route("dashboard") . '#utilisateur')->with('success', "L'utilisateur {$userName} a été supprimé avec succès.");
    }

    public function toggleStatus($id)
    {
        $user = Post::findOrFail($id);
        $user->status = $user->status === 0 ? 1 : 0; // Basculer entre actif (0) et inactif (1)
        $user->save();
    
        return redirect()->back()->with('success', 'État du Post mis à jour.');
    }
}
