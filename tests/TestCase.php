<?php

namespace Sfneal\Socials\Tests;


use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Sfneal\Socials\Providers\SocialsServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    /**
     * Register package service providers.
     *
     * @param  Application  $app
     * @return array|string
     */
    protected function getPackageProviders($app)
    {
        return [
            SocialsServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Migrate 'Social' table
        include_once __DIR__.'/../database/migrations/create_social_table.php.stub';
        (new \CreateSocialTable())->up();
    }
}
