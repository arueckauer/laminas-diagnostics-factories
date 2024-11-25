<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactoriesTest;

use LaminasDiagnosticsFactories\DirWritablePsrContainerFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

#[CoversClass(DirWritablePsrContainerFactory::class)]
class DirWritablePsrContainerFactoryTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test__invoke(): void
    {
        $factory = new DirWritablePsrContainerFactory('dir_writable');

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
                    'dir_writable' => [
                        'label' => 'Dir Writable',
                        'path'  => '/tmp',
                    ],
                ],
            ]);

        $check = $factory($container);

        self::assertSame('Dir Writable', $check->getLabel());
    }
}
