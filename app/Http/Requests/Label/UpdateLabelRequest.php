<?php

namespace App\Http\Requests\Label;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLabelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                Rule::unique("labels")->ignore($this->route('label')),
            ],
            'logo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
            ],
            'discogs' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }

    /**
     * @return array<string>
     */
    public function messages(): array
    {
        return [
            'required' => 'O campo ":attribute" é obrigatório!',
            'max'      => 'O campo ":attribute" deve ter no máximo :max caracteres!',
            'min'      => 'O campo ":attribute" deve ter no mínimo :min caracteres!',
            'unique'   => 'O campo ":attribute" já está sendo utilizado!',
            'image'    => 'O arquivo deve ser uma imagem!',
            'mimes'    => 'O arquivo deve ser do tipo jpeg, png ou jpg!',
            'logo.max' => 'O arquivo deve ter no máximo 2MB!',
        ];
    }

    /**
     * @return array<string>
     */
    public function attributes(): array
    {
        return [
            'name'    => 'Nome',
            'slug'    => 'Slug',
            'logo'    => 'Logo',
            'discogs' => 'Discogs',
        ];
    }
}
