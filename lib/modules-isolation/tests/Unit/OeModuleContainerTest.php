<?php
declare(strict_types=1);

namespace Zerai\ModulesIsolation\Test\Unit;

use PHPUnit\Framework\TestCase;
use Psr\Container\NotFoundExceptionInterface;
use Zerai\ModulesIsolation\Container\OeModuleContainer;
use Zerai\ModulesIsolation\Container\OeModuleContainerException;
use Zerai\ModulesIsolation\Container\OeModuleContainerNotFoundException;

class OeModuleContainerTest extends TestCase
{
    /**
     * @test
     * @dataProvider  list_of_fake_service_names
     */
    public function get_method_throw_exception_if_requested_service_doesnt_exist(string $serviceName, string $exceptionMessage): void
    {
        $this->expectException(OeModuleContainerNotFoundException::class);
        $this->expectExceptionMessage($exceptionMessage);
        $this->expectException(NotFoundExceptionInterface::class);

        $container = new OeModuleContainer();

        self::assertFalse($container->get($serviceName));
    }

    /**
     * @test
     * @dataProvider  list_of_invalid_service_names
     */
    public function get_method_throw_exception_if_argument_is_invalid($serviceName, string $exceptionMessage): void
    {
        $this->expectException(OeModuleContainerException::class);
        $this->expectExceptionMessage($exceptionMessage);

        $container = new OeModuleContainer();

        self::assertFalse($container->get($serviceName));
    }

    /**
     * @test
     * @dataProvider  list_of_fake_service_names
     */
    public function has_method_return_false_if_requested_service_doesnt_exist(string $serviceName): void
    {
        $container = new OeModuleContainer();

        self::assertFalse($container->has($serviceName));
    }

    /**
     * @return \Generator <array>
     */
    public function list_of_fake_service_names(): \Generator
    {
        return [
            yield ['_service', 'Service _service doesn\'t exist'],
            yield ['foo', 'Service foo doesn\'t exist'],
            yield ['foo_service', 'Service foo_service doesn\'t exist'],
            yield ['$%()=?&"!', 'Service $%()=?&"! doesn\'t exist'],
            yield ['$%()=?&"!_service', 'Service $%()=?&"!_service doesn\'t exist'],
        ];
    }

    /**
     * @return \Generator <array>
     */
    public function list_of_invalid_service_names(): \Generator
    {
        return [
            yield ['', 'You should specify a valid service id for the requested service.'],
            yield [null, 'You should specify a valid service id for the requested service.'],
            yield [0, 'You should specify a valid service id for the requested service.'],
            yield [[], 'You should specify a valid service id for the requested service.'],
        ];
    }


    /** @test */
    public function can_return_a_sevice_by_name(): void
    {
        $container = new DummyOeModuleContainer();

        self::assertNotNull($container->get('foo_notifier'));
        self::assertIsString($container->get('foo_notifier'));
    }
}
