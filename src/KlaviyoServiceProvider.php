<?php

namespace onefasteuro\Klaviyo;



use Illuminate\Support\ServiceProvider;

class KlaviyoServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
    	$this->app->bind(KlaviyoService::class, function($app){
    		$params = [
				    'api_key' => env('KLAVIYO_API'),
				    'endpoint' => env('KLAVIYO_ENDPOINT')
				    ];
    		return new KlaviyoService($params);
	    });
    }



    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['klaviyo'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {

    }
}
