<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:60',
            'subtitle' => 'required|string|max:120',
            'content' => 'required|string'
        ];
    }

    public function messages() {
        return [

            'title.required' => 'O campo de título é necessário',
            'title.string' => 'O campo de título precisa ser do tipo string',
            'title.max' => 'O campo de título aceita no máximo :max caracteres',

            'subtitle.required' => 'O campo de subtítulo é necessário',
            'subtitle.string' => 'O campo de subtítulo precisa ser do tipo string',
            'subtitle.max' => 'O campo de subtítulo aceita no máximo :max caracteres',

            'content.required' => 'O campo de texto é necessário',
            'content.string' => 'O campo de texto precisa ser do tipo string',
        ];
    }
}
