<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin', function ($user) {
            return $user->isAdmin();
        });
        // Populate AdminLTE companies submenu at runtime to avoid DB calls in config files
        try {
            // only proceed if the companies table exists and DB is available
            $companies = Company::orderBy('name')
                ->get(['id', 'name'])
                ->map(function ($c) {
                    return [
                        'text' => $c->name,
                        'url' => 'companies/select/' . $c->id,
                    ];
                })->toArray();

            $menu = config('adminlte.menu', []);

            foreach ($menu as $idx => $item) {
                // target the sidebar entry that contains a submenu placeholder
                if (isset($item['text']) && $item['text'] === 'Empresas' && array_key_exists('submenu', $item)) {
                    $menu[$idx]['submenu'] = $companies;
                    break;
                }
            }

            config(['adminlte.menu' => $menu]);
        } catch (\Throwable $e) {
            // ignore — prevents errors when running artisan commands before DB/migrations are ready
        }
    }
}
