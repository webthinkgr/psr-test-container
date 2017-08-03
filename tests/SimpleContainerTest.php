<?php

namespace Webthink\Container\Test;

use Webthink\Container\NotFoundException;
use Webthink\Container\SimpleContainer;

class SimpleContainerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Psr\Container\ContainerInterface
     */
    private $container;

    public function setUp()
    {
        parent::setUp();
        $this->container = new SimpleContainer(
            array(
                'service1' => new \stdClass(),
                'parameter1' => 'value1',
                'service2' => new \Exception(),
            )
        );
    }

    public function testGetEntryFromContainer()
    {
        $this->assertInstanceOf(\stdClass::class, $this->container->get('service1'));
        $this->assertInstanceOf(\Exception::class, $this->container->get('service2'));
        $this->assertSame('value1', $this->container->get('parameter1'));
    }

    public function testThatDoesNotExist()
    {
        $this->setExpectedException(NotFoundException::class);
        $this->container->get('service_does_not_exist');
    }
}