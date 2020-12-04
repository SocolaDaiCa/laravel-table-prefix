# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/socoladaica/laravel-table-prefix.svg?style=flat-square)](https://packagist.org/packages/socoladaica/laravel-table-prefix)
[![Build Status](https://img.shields.io/travis/socoladaica/laravel-table-prefix/master.svg?style=flat-square)](https://travis-ci.org/socoladaica/laravel-table-prefix)
[![Quality Score](https://img.shields.io/scrutinizer/g/socoladaica/laravel-table-prefix.svg?style=flat-square)](https://scrutinizer-ci.com/g/socoladaica/laravel-table-prefix)
[![Total Downloads](https://img.shields.io/packagist/dt/socoladaica/laravel-table-prefix.svg?style=flat-square)](https://packagist.org/packages/socoladaica/laravel-table-prefix)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require socoladaica/laravel-table-prefix
```

## Usage

Using it inside a `Post` model would look like this:

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SocolaDaiCa\LaravelTablePrefix\HasTablePrefix;

class Post extends Model
{
    use HasTablePrefix;

    protected $prefix = 'blog_';

}
```

Using it inside a `CategoryPost` pilot would look like this:

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use SocolaDaiCa\LaravelTablePrefix\HasTablePrefix;

class CategoryPost extends Pivot
{
    use HasTablePrefix;

    protected $prefix = 'blog_';

}
```

However, if someone were to use this approach and had many models with a prefix that had to be updated this could prove to be a pain. We can do better by creating another trait (this trait would theoretically exist in user-land code, not in the core), say something like `BlogPrefix`:

```php
<?php

namespace App;

use SocolaDaiCa\LaravelTablePrefix\HasTablePrefix;

trait BlogPrefix
{
    use HasTablePrefix;

    /**
     * The table prefix associated with the model.
     * 
     * @var string
     */
    protected $prefix = 'blog_';

}
```

The final model might look something like this:

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use BlogPrefix;

}
```

The final pivot might look something like this:

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use SocolaDaiCa\LaravelTablePrefix\HasTablePrefix;

class CategoryPost extends Pivot
{
    use BlogPrefix;

}
```
After that you can using it inside a migration would look like this:

```php

class CreateSocolaCmsBlogDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create((new Post())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create((new Category())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new Post())->getTable());
        Schema::dropIfExists((new Category())->getTable());
    }
}

```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email SocolaDaiCa@gmail.com instead of using the issue tracker.

## Credits

- [Socola Dai ca](https://github.com/socoladaica)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
