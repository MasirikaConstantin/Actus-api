<?php

namespace App\Http\Requests;

use Carbon\Carbon;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
class PostValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'titre' => 'required|string|min:5',
                'introduction' => 'required|string|min:5',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF,svg,SVG|max:4048',
                'slug'=>['required'],
                'temps' => 'nullable|numeric',
                'type_id' => 'required|exists:types,id',
                'nature_id' => 'required|exists:natures,id',
                'categorie_id' => 'required|exists:categories,id',
                'status' => 'boolean'
            ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('titre') . '-' . Carbon::now()->format('i-s'))
    
            ]);
    }
}
