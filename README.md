# A Simple PSR Container for Testing.

[![Build Status](https://travis-ci.org/webthinkgr/psr-test-container.svg?branch=master)](https://travis-ci.org/webthinkgr/psr-test-container)

A PSR container implementation to be used only for testing purposes.

## Goal

The goal of this package is be used for testing purposes where a simple container will just do the job.
Sometimes while writing unit tests you might need a container that does one simple thing. Keeping entries of services.
The current packages serves this goal.

## Install

Via Composer

    $ composer require-dev webthink/psr-test-container

## Usage

```
$container = new Webthink\Container\SimpleContaner([
    'service1' => new \stdClass(),
]);
$service = $container->get('service1');
```

## Credits

- [George Mponos](https://github.com/gmponos)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.