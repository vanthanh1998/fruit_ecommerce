<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:2000'],
            'image' => ['nullable', 'image'],
            'price' => ['required', 'numeric'],
            'description' => ['nullable', 'string']
        ];
//        $rules = [
//            'category_id' => 'required',
//            'name' => 'required',
//            'slug' => 'required',
//            'price' =>'required',
//        ];
//
//        if ($this->isMethod('patch') || $this->isMethod('put') || $this->has('image')) {
//            $rules['image'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
//        } else {
//            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
//        }
//
//        return $rules;
    }
}
