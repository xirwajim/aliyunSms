<?php

namespace Arnale\AliyunSms;

use EasyWeChat\Foundation\Application;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * 延迟加载.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Boot the provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__ . '/config.php');

        $this->publishes([
            $source => config_path('arnale.php'),
        ]);

        $this->mergeConfigFrom($source, 'arnale');
    }

    /**
     * Register the provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(['Arnale\\AliyunSms\\AliyunSms' => 'aliyunSms'], function ($app) {
            $app = new Application(config('arnale'));

            return $app;
        });
    }

    /**
     * 提供的服务
     *
     * @return array
     */
    public function provides()
    {
        return ['aliyunSms', 'Arnale\\AliyunSms\\AliyunSms'];

    }
}
