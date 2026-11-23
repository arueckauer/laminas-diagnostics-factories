<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactoriesTest;

use Laminas\Diagnostics\Check\CpuPerformance;
use LaminasDiagnosticsFactories\AbstractPsrContainerFactory;
use LaminasDiagnosticsFactories\CpuPerformancePsrContainerFactory;
use LaminasDiagnosticsFactories\Exception\BadStaticPsrContainerFactoryUsage;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use stdClass;

use function sprintf;

#[CoversClass(AbstractPsrContainerFactory::class)]
#[CoversClass(CpuPerformancePsrContainerFactory::class)]
#[CoversClass(BadStaticPsrContainerFactoryUsage::class)]
final class CpuPerformancePsrContainerFactoryTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test__callStatic(): void
    {
        $container = $this->createMock(ContainerInterface::class);
        $container
            ->expects(self::once())
            ->method('has')
            ->with('config')
            ->willReturn(true);
        $container
            ->expects(self::once())
            ->method('get')
            ->with('config')
            ->willReturn([
                'diagnostics' => [
                    'cpu_performance' => [
                        'label' => 'CPU Performance',
                    ],
                ],
            ]);

        $factory = [CpuPerformancePsrContainerFactory::class, 'cpu_performance'];
        $check   = $factory($container);

        self::assertInstanceOf(CpuPerformance::class, $check);
        self::assertSame('CPU Performance', $check->getLabel());
    }

    public function test__callStaticWithoutArgument(): void
    {
        $factory = [CpuPerformancePsrContainerFactory::class, 'cpu_performance'];

        $this->expectException(BadStaticPsrContainerFactoryUsage::class);
        $this->expectExceptionMessage(sprintf(
            'The first argument for %s::cpu_performance must be an instance of %s.',
            CpuPerformancePsrContainerFactory::class,
            ContainerInterface::class,
        ));

        $factory();
    }

    public function test__callStaticWithNonContainerArgument(): void
    {
        $factory = [CpuPerformancePsrContainerFactory::class, 'cpu_performance'];

        $this->expectException(BadStaticPsrContainerFactoryUsage::class);
        $this->expectExceptionMessage(sprintf(
            'The first argument for %s::cpu_performance must be an instance of %s.',
            CpuPerformancePsrContainerFactory::class,
            ContainerInterface::class,
        ));

        $factory(new stdClass());
    }

    /**
     * @throws Exception
     */
    public function test__invoke(): void
    {
        $factory = new CpuPerformancePsrContainerFactory('cpu_performance');

        $container = $this->createMock(ContainerInterface::class);
        $container
            ->expects(self::once())
            ->method('has')
            ->with('config')
            ->willReturn(true);
        $container
            ->expects(self::once())
            ->method('get')
            ->with('config')
            ->willReturn([
                'diagnostics' => [
                    'cpu_performance' => [
                        'label'          => 'CPU Performance',
                        'minPerformance' => 0.5,
                    ],
                ],
            ]);

        $check = $factory($container);

        self::assertSame('CPU Performance', $check->getLabel());
    }
}
