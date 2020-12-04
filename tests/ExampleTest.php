<?php

namespace SocolaDaiCa\LaravelTablePrefix\Tests;

use Orchestra\Testbench\TestCase;
use SocolaDaiCa\LaravelTablePrefix\LaravelTablePrefixServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelTablePrefixServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
