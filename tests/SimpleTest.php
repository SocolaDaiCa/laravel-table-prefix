<?php

namespace Socoladaica\LaravelTablePrefix\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Metadata\CoversTrait;
use Socoladaica\LaravelTablePrefix\HasTablePrefix;
use Socoladaica\LaravelTablePrefix\Tests\Models\Category;
use Socoladaica\LaravelTablePrefix\Tests\Models\CategoryPost;
use Socoladaica\LaravelTablePrefix\Tests\Models\Post;

class SimpleTest extends TestCase
{
    #[CoversTrait(HasTablePrefix::class)]
    public function testTrueIsTrue()
    {
        static::assertTrue(true);

        $category = new Category();
        static::assertEquals('socola_cms_blog__categories', $category->getTable());
        static::assertEquals($category->getTable(), Category::getTableName());

        $post = new Post();
        static::assertEquals('socola_cms_blog__posts', $post->getTable());
        static::assertEquals($post->getTable(), Post::getTableName());

        $categoryPost = new CategoryPost();
        static::assertEquals('socola_cms_blog__category_post', $categoryPost->getTable());
        static::assertEquals($categoryPost->getTable(), CategoryPost::getTableName());
    }
}
