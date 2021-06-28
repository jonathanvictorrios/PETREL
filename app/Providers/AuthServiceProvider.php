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
        $user = $this->user;
        $permisos = Permission::All();
        $roles = Role::get($user->id)->toArray();

        foreach ($permisos as $permiso){
            foreach ($roles as $role){
                Gate::define($permiso->name, function($permiso, $role){                
                    return $role->id == $permiso->role_id;        
                });  
            }            
        }
    }
}
