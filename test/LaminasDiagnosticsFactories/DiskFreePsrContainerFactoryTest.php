<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactoriesTest;

use LaminasDiagnosticsFactories\DiskFreePsrContainerFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

#[CoversClass(DiskFreePsrContainerFactory::class)]
class DiskFreePsrContainerFactoryTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test__invoke()
    {
        $factory = new DiskFreePsrContainerFactory('disk_free');

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
                    'disk_free' => [
                        'label' => 'Disk Free',
                        'size'  => '10M',
                        'path'  => '/tmp',
                    ],
                ],
            ]);

        $check = $factory($container);

        self::assertSame('Disk Free', $check->getLabel());
    }
}
