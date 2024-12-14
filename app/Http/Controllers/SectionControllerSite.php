<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class SectionControllerSite extends Controller
{
    public function create(Post $post)
    {
        return view('admin.sections.create', compact('post'));
    }

    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'contenu' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('sections', 'public');
            $validated['image'] = $path;
        }

        $post->sections()->create($validated);

        return redirect()->route('admin.posts.edit', $post)
            ->with('success', 'Section ajoutée avec succès.');
    }

    public function edit(Post $post, Section $section)
    {
        return view('admin.sections.edit', compact('post', 'section'));
    }

    public function update(Request $request, Post $post, Section $section)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'contenu' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($section->image) {
                Storage::disk('public')->delete($section->image);
            }
            $path = $request->file('image')->store('sections', 'public');
            $validated['image'] = $path;
        }

        $section->update($validated);

        return redirect()->route('admin.posts.edit', $post)
            ->with('success', 'Section mise à jour avec succès.');
    }

    public function destroy(Post $post, Section $section)
    {
        if ($section->image) {
            Storage::disk('public')->delete($section->image);
        }

        $section->delete();

        return redirect()->route('admin.posts.edit', $post)
            ->with('success', 'Section supprimée avec succès.');
    }
}
