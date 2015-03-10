<?php namespace Sukohi\Postern;

use Illuminate\Support\ServiceProvider;

class PosternServiceProvider extends ServiceProvider {

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
		$this->package('sukohi/postern');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */

    public function register()
    {
        $this->app['postern'] = $this->app->share(function($app)
        {
            return new Postern;
        });
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('postern');
	}

}
