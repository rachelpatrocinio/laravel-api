<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'project_title'=>'required|max:255',
            'project_description'=>'required|max:255',
            'github_url'=>'required',
            'type_id'=>'required|exists:types,id',
            'technologies'=>'exists:technologies,id'
        ];
    }
}
