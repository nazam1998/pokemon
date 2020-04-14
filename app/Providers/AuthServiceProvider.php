<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('hasPoke',function($user,$pokeball){
            return $user->pokeballs->where('id',$pokeball->id)->count()!=0;
        });
        Gate::define('isDresseur',function($user){
            return $user->id_role==2;
        });
        Gate::define('isOwn',function($user,$pokemon){
            return $pokemon->id_user==$user->id;
        });
    }
}
