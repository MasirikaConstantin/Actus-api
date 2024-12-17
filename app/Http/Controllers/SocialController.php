<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
      //  $socials = Social::paginate(10);
        //return view('admin.socials.index', compact('socials'));

    }

    public function create()
    {
        return view('admin.socials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        Social::create($validated);
        return redirect(route("dashboard") . '#socials')->with('success', "Réseau social ajouté avec succès");

        //return redirect()->route('admin.socials.index')
          //  ->with('success', 'Réseau social ajouté avec succès');
    }

    public function edit(Social $social)
    {
        return view('admin.socials.edit', compact('social'));
    }

    public function update(Request $request, Social $social)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $social->update($validated);

        return redirect(route("dashboard") . '#socials')->with('success', "Réseau social modifié avec succès");

        //return redirect()->route('admin.socials.index')
          //  ->with('success', 'Réseau social modifié avec succès');
    }

    public function destroy(Social $social)
    {
        $social->delete();
        return redirect(route("dashboard") . '#socials')->with('success', "Réseau social supprimé avec succès");

        //return redirect()->route('admin.socials.index')
          //  ->with('success', 'Réseau social supprimé avec succès');
    }
}