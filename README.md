# A PSR Container for testing

[![Build Status](https://travis-ci.org/webthinkgr/psr-test-container.svg?branch=master)](https://travis-ci.org/webthinkgr/psr-test-container)

A PSR container implementation to be used only for testing

## Goal

The goal of this package is not to be used as an actual PSR-Container
but mainly for testing purposes.

## Install

Via Composer

    $ composer require webthink/psr-test-container

## Usage

```
$container = new Webthink\Container\SimpleContaner(
    array(
        'service1' => new \stdClass(),
    )
);
$service = $container->get('service1');
```

## Credits

- [George Mponos](https://github.com/gmponos)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.