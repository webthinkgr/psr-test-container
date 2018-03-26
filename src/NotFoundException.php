<?php

namespace Webthink\Container;

use Psr\Container\NotFoundExceptionInterface;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
class NotFoundException extends ContainerException implements NotFoundExceptionInterface
{
}