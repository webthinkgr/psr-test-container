<?php

namespace Webthink\Container;

use Psr\Container\NotFoundExceptionInterface;

class NotFoundException extends ContainerException implements NotFoundExceptionInterface
{
}