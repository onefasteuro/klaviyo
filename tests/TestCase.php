<?php

namespace onefasteuro\Klaviyo\Tests;

use onefasteuro\Klaviyo\KlaviyoServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
	
class TestCase extends BaseTestCase
{
		
	protected function getPackageProviders($app)
	{
		return [ KlaviyoServiceProvider::class ];
	}


    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {


    }
}
