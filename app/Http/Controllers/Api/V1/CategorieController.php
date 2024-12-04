<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\CategorieValidator;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Categorie::orderBy('created_at', 'desc')->get();

         return response()->json([
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategorieValidator $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieValidator     $request)
    {
        $category = Categorie::create($request->validated());
        return response()->json(["category"=>$category], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
