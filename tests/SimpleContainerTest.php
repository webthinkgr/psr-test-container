<?php

namespace Webthink\Container\Test;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
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
                'array' => array('value_1', 'value_2')
            )
        );
    }

    public function testInitializeTheContainerWithANonStringKeyForAService()
    {
        $this->setExpectedException('Psr\Container\ContainerExceptionInterface');
        new SimpleContainer(array(1 => new \stdClass()));
    }

    public function testGetServiceFromContainerWithANonStringValue()
    {
        $this->setExpectedException('Psr\Container\ContainerExceptionInterface');
        $this->container->get(1);
    }
    
    public function testGetEntryFromContainer()
    {
        $this->assertInstanceOf('stdClass', $this->container->get('service1'));
        $this->assertInstanceOf('Exception', $this->container->get('service2'));
        $this->assertSame('value1', $this->container->get('parameter1'));
        $this->assertSame(array('value_1', 'value_2'), $this->container->get('array'));
    }

    public function testHasEntryFromContainer()
    {
        $this->assertTrue($this->container->has('service1'));
        $this->assertTrue($this->container->has('service2'));
        $this->assertTrue($this->container->has('parameter1'));
        $this->assertTrue($this->container->has('array'));
    }

    public function testThatContainerReturnsFalseWhenEntryDoesNotExist()
    {
        $this->assertFalse($this->container->has('not_exists'));
    }

    public function testThatDoesNotExist()
    {
        $this->setExpectedException('Psr\Container\NotFoundExceptionInterface');
        $this->container->get('service_does_not_exist');
    }
}