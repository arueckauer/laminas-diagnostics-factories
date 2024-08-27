<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactoriesTest;

use LaminasDiagnosticsFactories\CpuPerformancePsrContainerFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

#[CoversClass(CpuPerformancePsrContainerFactory::class)]
class CpuPerformancePsrContainerFactoryTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test__invoke()
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
