<?php

namespace Socoladaica\LaravelTablePrefix\Tests\Models;

use Socoladaica\LaravelTablePrefix\HasTablePrefix;

trait Prefix
{
    use HasTablePrefix;

    protected string $prefix = 'socola_cms_blog__';
}
