<?php namespace Codesleeve\Platform\Publish;

use App, Config, DirectoryIterator, Redirect, View;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
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

		require_once("{$base}/../../../routes.php");

		$this->bootAssetPipeline($base);

		$this->bootViews($base);

		$this->bootNavigation($base);

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
		$base = $base . '/../../../assets';

		$asset = $this->app->make('asset');
		$config = $asset->getConfig();

		$config['paths'][] = str_replace($config['base_path'].'/', '', realpath($base . "/javascripts"));
		$config['paths'][] = str_replace($config['base_path'] .'/', '', realpath($base . "/stylesheets"));

		$asset->setConfig($config);
	}

	/**
	 * Create the dynamic navigation bars that come with this package
	 *
	 * @param  string $base
	 * @return void
	 */
	protected function bootNavigation($base)
	{
		$navigation = $this->app['platform.navigation'];

		$navigation->add([
			'title' => 'Pages',
			'icon' => 'fa-file',
			'url' => platform_route('pages.index'),
			'shown' => can('update', 'Page'),
			'active' => 'pages',
		]);

		$navigation->add([
			'title' => 'Menus',
			'icon' => 'fa-link',
			'url' => platform_route('menus.index'),
			'shown' => can('update', 'Menu'),
			'active' => 'menus',
		]);
	}

	protected function bootViews($base)
	{
		View::addNamespace('platform-publish', $base . '/../../../views');
	}
}
