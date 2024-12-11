<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\V1\SectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(SectionRequest $request)
    {

       $post =Section::create($this->extractData(new Section(), $request));

       

        return response()->json($post, 201);
    }


    private function extractData(Section $section, SectionRequest $request){
        $data=$request->validated();
        //dd($data);
        /**
        * @var UploadedFile $image
         */
        $image=$request->validated('image');
        if($image==null || $image->getError()){
            return $data;
        }
        if($section->image){
            Storage::disk('public')->delete($section->image);
        }
            $data['image']=$image->store("imagePost",'public');
        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }
}
