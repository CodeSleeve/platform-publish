<?php namespace Codesleeve\PlatformPublish;

use Illuminate\Support\ServiceProvider;
use App, Config, DirectoryIterator, Redirect, View;

class PublishServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$base = __DIR__;

		$this->package('codesleeve/platform-publish');

		$navigation = $this->app['platform.navigation'];

		 //dd($navigation);

		require_once("{$base}/../../routes.php");
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

	/**
	 * Tweak the configuration for asset pipeline for this application
	 * so we can use assets inside of the platform's assets directory
	 *
	 * We do this 'namespacing' so we don't clutter up our
	 * main app/assets directory with assets that belongs
	 * to codesleeve\platform.
	 *
	 * @param  string $base
	 * @return void
	 */
	protected function bootAssetPipeline($base)
	{
		$base = $base . '/../../assets';

		$asset = $this->app->make('asset');
		$config = $asset->getConfig();

		$config['paths'][] = str_replace($config['base_path'].'/', '', realpath($base . "/javascripts"));
		$config['paths'][] = str_replace($config['base_path'] .'/', '', realpath($base . "/stylesheets"));
		$config['paths'][] = str_replace($config['base_path'] .'/', '', realpath($base . "/vendors"));

		$asset->setConfig($config);
	}
}
