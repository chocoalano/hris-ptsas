<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\User::class => \App\Policies\UserPolicy::class,
        \App\Models\Config\Role::class => \App\Policies\RolePolicy::class,
        \App\Models\Config\Permission::class => \App\Policies\PermissionPolicy::class,
        \App\Models\Config\Team::class => \App\Policies\TeamPolicy::class,

        \App\Models\Master\Branch::class => \App\Policies\Master\BranchPolicy::class,
        \App\Models\Master\ClassEmp::class => \App\Policies\Master\ClassEmpPolicy::class,
        \App\Models\Master\Company::class => \App\Policies\Master\CompanyPolicy::class,
        \App\Models\Master\Grade::class => \App\Policies\Master\GradePolicy::class,
        \App\Models\Master\JobPosition::class => \App\Policies\Master\JobPositionPolicy::class,
        \App\Models\Master\Organization::class => \App\Policies\Master\OrganizationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
