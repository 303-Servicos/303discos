<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\{Rule, Rules};

class UpdateUserRequest extends FormRequest
{
    /**
     * @return array<string,array<int,string|null>>
     */
    public function rules(): array
    {
        return [
            'name'    => ['required', 'max:255'],
            'email'   => ['required', 'string', 'email', 'max:255', Rule::unique("users", 'email')->ignore($this->route('user'))],
            'role_id' => ['required', 'integer'],
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
            'unique'   => 'O campo ":attribute" já está sendo utilizado!',
        ];
    }

    /**
     * @return array<string>
     */
    public function attributes(): array
    {
        return [
            'name'    => 'Nome',
            'email'   => 'E-mail',
            'role_id' => 'Tipo de usuário',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
