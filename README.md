# A PSR Container for testing

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