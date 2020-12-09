<?php


namespace Socoladaica\LaravelTablePrefix\Tests\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryPost extends Pivot
{
    use Prefix;
    protected $table = 'category_post';
}
