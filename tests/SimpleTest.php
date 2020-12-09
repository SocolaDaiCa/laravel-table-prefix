<?php

namespace Socoladaica\LaravelTablePrefix\Tests;

use PHPUnit\Framework\TestCase;
use Socoladaica\LaravelTablePrefix\Tests\Models\Category;
use Socoladaica\LaravelTablePrefix\Tests\Models\CategoryPost;
use Socoladaica\LaravelTablePrefix\Tests\Models\Post;

class SimpleTest extends TestCase
{
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);

        $category = new Category();
        $this->assertEquals('socola_cms_blog__categories', $category->getTable());

        $item = new Post();
        $this->assertEquals('socola_cms_blog__posts', $item->getTable());

        $item = new CategoryPost();
        $this->assertEquals('socola_cms_blog__category_post', $item->getTable());
    }
}
