<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostValidator;
use App\Models\Post;
use App\Models\Type;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['type', 'categorie', 'user'])->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $types = Type::all();
        $categories = Categorie::all();
        return view('admin.posts.create', compact('types', 'categories'));
    }

    public function store(PostValidator $request)
    {
        //dd($request->validated());

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = $path;
        }

        $validated['user_id'] = auth()->id();
        
        Post::create($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Article créé avec succès.');
    }

    public function edit(Post $post)
    {
        $types = Type::all();
        $categories = Categorie::all();
        return view('admin.posts.edit', compact('post', 'types', 'categories'));
    }

    public function update(PostValidator $request, Post $post)
    {
       

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = $path;
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Article supprimé avec succès.');
    }
    public function show(Post $post){
        return view('admin.posts.show',compact('post'));
    }
    public function newsection(Post $post){
        return view('admin.posts.newsection',compact('post'));
    }
}