<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'pseudo' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'numero_adherent' => ['required', 'string', 'max:255'],
            'date_adhesion' => ['required', 'string', 'max:255'],
            'code_postal' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'prenom' => $input['prenom'],
            'nom' => $input['nom'],
            'pseudo' => $input['pseudo'],
            'telephone' => $input['telephone'],
            'numero_adherent' => $input['numero_adherent'],
            'date_adhesion' => $input['date_adhesion'],
            'code_postal' => $input['code_postal'],
            'ville' => $input['ville'],
            'adresse' => $input['adresse'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
