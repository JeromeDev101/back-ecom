<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'role' => [
                'required',
                Rule::in(['Administrator', 'Dean', 'Chairperson', 'Faculty']),
                // Custom validation rule for Administrator role
                function ($attribute, $value, $fail) {
                    if ($value === 'Administrator' && User::role('Administrator')->exists()) {
                        $fail('An Administrator is already registered.');
                    }
                },
            ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'program_id' => ['required_unless:role,Administrator'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'program_id' => $input['program_id'] ?? null,
            'password' => Hash::make($input['password']),
        ]);

        // Assigning role
        $user->assignRole($input['role']);

        return $user;
    }
}
