

# Laravel Unavatar

[![Latest Version](http://img.shields.io/packagist/v/astrotomic/laravel-unavatar.svg?label=Release&style=for-the-badge)](https://packagist.org/packages/astrotomic/laravel-unavatar)
[![MIT License](https://img.shields.io/github/license/Astrotomic/laravel-unavatar.svg?label=License&color=blue&style=for-the-badge)](https://github.com/Astrotomic/laravel-unavatar/blob/master/LICENSE)
[![Offset Earth](https://img.shields.io/badge/Treeware-%F0%9F%8C%B3-green?style=for-the-badge)](https://plant.treeware.earth/Astrotomic/laravel-unavatar)

[![GitHub Workflow Status](https://img.shields.io/github/workflow/status/Astrotomic/laravel-unavatar/run-tests?style=flat-square&logoColor=white&logo=github&label=Tests)](https://github.com/Astrotomic/laravel-unavatar/actions?query=workflow%3Arun-tests)
[![StyleCI](https://styleci.io/repos/242217544/shield)](https://styleci.io/repos/242217544)
[![Total Downloads](https://img.shields.io/packagist/dt/astrotomic/laravel-unavatar.svg?label=Downloads&style=flat-square)](https://packagist.org/packages/astrotomic/laravel-unavatar)

This package provides a Laravel wrapper for [unavatar](https://unavatar.now.sh).

## Installation

You can install the package via composer:

```bash
composer require astrotomic/laravel-unavatar
php artisan vendor:publish --provider="Astrotomic\LaravelUnavatar\UnavatarServiceProvider" --tag=config
```

## Usage

Most of the logic and possibilities is inherited from the [astrotomic/php-unavatar](https://github.com/Astrotomic/php-unavatar) base package.
On top this package adds some Laravel specific possibilities.
The `\Astrotomic\LaravelUnavatar\Unavatar` class implements several interfaces:
* `\Illuminate\Contracts\Support\Renderable`
* `\Illuminate\Contracts\Support\Responsable`
* `\Illuminate\Contracts\Support\Htmlable`
* `\Illuminate\Contracts\Support\Jsonable`
* `\JsonSerializable`
* `\Illuminate\Contracts\Support\Arrayable`

So you can use the use your `Unavatar` instances in your controllers as response but for sure also in your views.
The last three ones will use the [unavatar](https://unavatar.now.sh) JSON API - so they will start a HTTP request.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.## Contributing

Please see [CONTRIBUTING](https://github.com/Astrotomic/.github/blob/master/CONTRIBUTING.md) for details. You could also be interested in [CODE OF CONDUCT](https://github.com/Astrotomic/.github/blob/master/CODE_OF_CONDUCT.md).### Security

If you discover any security related issues, please email dev.gummibeer@gmail.com instead of using the issue tracker.

## Credits

- [Tom Witkowski](https://github.com/Gummibeer)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.## Treeware

You're free to use this package, but if it makes it to your production environment I would highly appreciate you buying the world a tree.

It’s now common knowledge that one of the best tools to tackle the climate crisis and keep our temperatures from rising above 1.5C is to [plant trees](https://www.bbc.co.uk/news/science-environment-48870920). If you contribute to my forest you’ll be creating employment for local families and restoring wildlife habitats.

You can buy trees at [offset.earth/treeware](https://plant.treeware.earth/Astrotomic/laravel-unavatar)

Read more about Treeware at [treeware.earth](https://treeware.earth)
