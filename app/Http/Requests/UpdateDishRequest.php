<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
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
            'name' => ['required', 'max:255'], //nome del piatto
            'img' => ['required', 'image'], //immagine del piatto
            'description' => ['required'], //descrizione del piatto
            'price' => ['required', 'min:0', 'numeric'], //prezzo del piatto
            'is_visible' => ['required', 'boolean'] //visibilità del piatto
        ];
    }
}
