<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'post_id'=>'required|exists:posts,id',
            "titre"=>'required|string|max:255',
            "contenu"=>'required|string|min:30',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048',

        ];
    }
}
