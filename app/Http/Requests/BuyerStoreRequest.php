<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'nif' => 'required|numeric',
            'email' => 'required|email',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ];
    }
}
