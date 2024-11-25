<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactoriesTest;

use LaminasDiagnosticsFactories\PhpVersionPsrContainerFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

#[CoversClass(PhpVersionPsrContainerFactory::class)]
class PhpVersionPsrContainerFactoryTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test__invoke(): void
    {
        $factory = new PhpVersionPsrContainerFactory('php_version');

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
                    'php_version' => [
                        'label'           => 'PHP version',
                        'expectedVersion' => '7.4',
                        'operator'        => '>=',
                    ],
                ],
            ]);

        $check = $factory($container);

        self::assertSame('PHP version', $check->getLabel());
    }
}
