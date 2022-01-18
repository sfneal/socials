<?php

namespace Sfneal\Socials\Providers;

use Illuminate\Support\ServiceProvider;

class SocialsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any Users services.
     *
     * @return void
     */
    public function boot()
    {
        // `Social` migration file
        if (! class_exists('CreateSocialTable')) {
            $this->publishes([
                __DIR__.'/../../database/migrations/create_social_table.php.stub' => database_path(
                    'migrations/'.date('Y_m_d_His', time()).'_create_role_table.php'
                ),
            ], 'migration');
        }
    }
}
