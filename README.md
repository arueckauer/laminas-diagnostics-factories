# laminas-diagnostics-factories

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Configuration-based PSR-11 factories for [laminas-diagnostics](https://docs.laminas.dev/laminas-diagnostics/)

## Install

Via Composer

``` bash
$ composer require arueckauer/laminas-diagnostics-factories
```

## Usage

``` php
$skeleton = new Package\Skeleton();
echo $skeleton->echoPhrase('Hello World!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](doc/CONTRIBUTING.md) and [CODE_OF_CONDUCT](doc/CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email arueckauer@gmail.com instead of using the issue tracker.

## Credits

- [Andi Rückauer][link-author]
- [All Contributors][link-contributors]

## Copyright

Andi Rückauer

[ico-version]: https://img.shields.io/packagist/v/arueckauer/laminas-diagnostics-factories.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-BSD3-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/arueckauer/laminas-diagnostics-factories/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/arueckauer/laminas-diagnostics-factories.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/arueckauer/laminas-diagnostics-factories.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/arueckauer/laminas-diagnostics-factories.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/arueckauer/laminas-diagnostics-factories
[link-travis]: https://travis-ci.org/arueckauer/laminas-diagnostics-factories
[link-scrutinizer]: https://scrutinizer-ci.com/g/arueckauer/laminas-diagnostics-factories/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/arueckauer/laminas-diagnostics-factories
[link-downloads]: https://packagist.org/packages/arueckauer/laminas-diagnostics-factories
[link-author]: https://github.com/arueckauer
[link-contributors]: ../../contributors
