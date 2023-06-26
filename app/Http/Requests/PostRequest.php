<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name' => 'required|min:5|max:255',
            'description' => 'required|min:20',
            'technologies' => 'required',
            'start' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Inserisci il nome',
            'name.min' => 'Il nome deve avere almeno 5 caratteri',
            'name.max' => 'Il nome non può avere più di 255 caratteri',
            'description.required' => 'Inserisci una descrizione',
            'description.min' => 'La descrizione deve avere almeno 20 caratteri',
            'technologies.required' => 'Inserisci le tecnologie usate',
            'start.required' => 'Inserisci la data di inizio'
        ];
    }
}
