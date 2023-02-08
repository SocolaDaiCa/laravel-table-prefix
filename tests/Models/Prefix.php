<?php


namespace Socoladaica\LaravelTablePrefix\Tests\Models;

use Socoladaica\LaravelTablePrefix\HasTablePrefix;

trait Prefix
{
    use HasTablePrefix;

    public string $prefix = 'socola_cms_blog__';
}
