<?php namespace shivergard\Clusterpoint;

use Config;
use Illuminate\Support\ServiceProvider;
use shivergard\Clusterpoint\Connectors\ClusterConnector as Connector;

class ClusterpointServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// Extend the connections with pdo-via-oci8 drivers by using a yajra\pdo\oci8 connector
		foreach (Config::get('database.connections') as $conn => $config)
		{
			// Only use configurations that feature a "clusterpoint" driver
			if ( ! isset($config['driver']) || ! in_array($config['driver'], ['clusterpoint']))
			{
				continue;
			}

			$this->app->resolving('db', function ($db)
			{
				$db->extend('clusterpoint', function ($config)
				{

					return new ClusterpointConnection($config);
				});
			});
		}
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return string[]
	 */
	public function provides()
	{
		return [];
	}

}
