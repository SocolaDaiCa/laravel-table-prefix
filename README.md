# Laravel Table Prefix

[![Latest Version on Packagist](https://img.shields.io/packagist/v/Socoladaica/laravel-table-prefix.svg?style=flat-square)](https://packagist.org/packages/Socoladaica/laravel-table-prefix)
[![Build Status](https://img.shields.io/travis/Socoladaica/laravel-table-prefix/master.svg?style=flat-square)](https://travis-ci.org/Socoladaica/laravel-table-prefix)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/Socoladaica/laravel-table-prefix/run-tests?label=tests)](https://github.com/Socoladaica/laravel-table-prefix/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Quality Score](https://img.shields.io/scrutinizer/g/Socoladaica/laravel-table-prefix.svg?style=flat-square)](https://scrutinizer-ci.com/g/Socoladaica/laravel-table-prefix)
[![Total Downloads](https://img.shields.io/packagist/dt/Socoladaica/laravel-table-prefix.svg?style=flat-square)](https://packagist.org/packages/Socoladaica/laravel-table-prefix)

Allows you to use a table prefix with standard Laravel models.

Have inspiration from ideas [\[Proposal\] Prefixed Eloquent Models](https://github.com/laravel/ideas/issues/151)
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
use Socoladaica\LaravelTablePrefix\HasTablePrefix;

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
use Socoladaica\LaravelTablePrefix\HasTablePrefix;

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

use Socoladaica\LaravelTablePrefix\HasTablePrefix;

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
use Socoladaica\LaravelTablePrefix\HasTablePrefix;

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

        Schema::create(Post::getTableName(), function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create(Category::getTableName(), function (Blueprint $table) {
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
        Schema::dropIfExists(Post::getTableName());
        Schema::dropIfExists(Category::getTableName());
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

If you discover any security related issues, please email Socoladaica@gmail.com instead of using the issue tracker.

## Credits

- [Socola Dai ca](https://github.com/Socoladaica)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
