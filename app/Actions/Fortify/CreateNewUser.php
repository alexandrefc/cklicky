<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Models\Billing;
use Illuminate\Support\Str;
use App\Events\UserRegistered;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    
    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'company_name' => ['string', 'max:255'],
            'gender' => ['string', 'max:255'],
            // 'age' => ['numeric', 'max:120'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'test_email' => ['string', 'email', 'max:255'],
            'uuid' => ['uuid'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        event(new UserRegistered($input['email']));

        Billing::create([
            'company' => $input['company_name'],
            'user_email' => $input['email']
        ]);

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'company_name' => $input['company_name'],
                'test_email' => $input['test_email'],
                'gender' => $input['gender'],
                'age' => $input['age'],
                'password' => Hash::make($input['password']),
                'uuid' => Str::uuid()->toString(),
            ]), function (User $user) {
                $this->createTeam($user);
            });
            
        });

        
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
