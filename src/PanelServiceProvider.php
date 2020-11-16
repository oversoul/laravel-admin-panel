<?php

namespace Aecodes\LaravelAdminPanel;

use Aecodes\AdminPanel\Dashboard;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class PanelServiceProvider extends ServiceProvider
{

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		Dashboard::setup(config('panel'));
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../config/panel.php' => config_path('panel.php'),
			__DIR__ . '/../views'            => resource_path('views/vendor/panel'),
		]);

		$this->loadViewsFrom(dirname(__DIR__) . '/views', 'panel');
	}
}
