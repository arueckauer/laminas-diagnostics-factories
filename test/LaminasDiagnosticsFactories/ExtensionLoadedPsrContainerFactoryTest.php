<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactoriesTest;

use LaminasDiagnosticsFactories\ExtensionLoadedPsrContainerFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

#[CoversClass(ExtensionLoadedPsrContainerFactory::class)]
class ExtensionLoadedPsrContainerFactoryTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test__invoke(): void
    {
        $factory = new ExtensionLoadedPsrContainerFactory('extension_loaded');

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
                    'extension_loaded' => [
                        'label'         => 'Extension Loaded',
                        'extensionName' => 'pdo_mysql',
                    ],
                ],
            ]);

        $check = $factory($container);

        self::assertSame('Extension Loaded', $check->getLabel());
    }
}
