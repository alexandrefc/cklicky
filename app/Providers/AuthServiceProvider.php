<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin_only', function($user)
        {
            if($user->is_admin == 1)
            {
                return true;
            }
                return false;
        });

        Gate::define('wls_only', function($user)
        {
            if($user->is_wls == 1)
            {
                return true;
            }
                return false;
        });

        Gate::define('manager_only', function($user, $campaign)
        {
            
            if($user->id == $campaign->made_by_id || $campaign->manager_email == $user->email)
            {
                return true;
            }
                return false;
        });

        Gate::define('venue_manager_only', function($user, $campaign)
        {
            
            if($user->id == $campaign->manage_by_id || $campaign->user_id == $user->id)
            {
                return true;
            }
                return false;
        });
    }
}
