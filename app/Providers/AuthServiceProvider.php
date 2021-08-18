<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* //
        Gate::define('manage-users', function (User $user) {
            return $user->role_id == 1;
        }); */

        // $permisos = Permission::findAll();

        // foreach ($permisos as $permiso){
        //     Gate::define($permiso->name, function(User $user, $permiso){
        //         return $user->role_id == $permiso->id;
        //     });
        // }
/*         $permisos = Permission::findAll();
        /* $permisos = Permission::findAll();

        foreach ($permisos as $permiso){
            Gate::define($permiso->name, function(User $user, $permiso){
                return $user->role_id == $permiso->id;
            });
        } */
    }
}
