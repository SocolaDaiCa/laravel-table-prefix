<?php

namespace Socoladaica\LaravelTablePrefix\Tests\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Prefix;

    protected $table = 'categories';
}
