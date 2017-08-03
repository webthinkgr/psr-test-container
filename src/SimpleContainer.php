<?php

namespace Webthink\Container;

use Psr\Container\ContainerInterface;

/**
 * Class SimpleContainer
 *
 * A simple container implementation.
 * This package container is meant to be used only for testing purposes.
 *
 * @author George Mponos <gmponos@gmail.com>
 */
class SimpleContainer implements ContainerInterface
{
    /**
     * @var array
     */
    private $entries;

    /**
     * SimpleContainer constructor.
     *
     * @param array $entries An array containing entries for the container.
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function __construct(array $entries)
    {
        foreach ($entries as $key => $entry) {
            if (!is_string($key)) {
                throw new ContainerException('All entries of the container must have a string key');
            }
        }

        $this->entries = $entries;
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @throws \Psr\Container\NotFoundExceptionInterface  No entry was found for **this** identifier.
     * @throws \Psr\Container\ContainerExceptionInterface Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get($id)
    {
        if (!is_string($id)) {
            throw new ContainerException('Id must be a string');
        }

        if (!$this->has($id)) {
            throw new NotFoundException();
        }

        return $this->entries[$id];
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
    public function has($id)
    {
        return isset($this->entries[$id]);
    }
}