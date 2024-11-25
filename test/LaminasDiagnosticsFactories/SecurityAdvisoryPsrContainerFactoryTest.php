<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactoriesTest;

use LaminasDiagnosticsFactories\SecurityAdvisoryPsrContainerFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

#[CoversClass(SecurityAdvisoryPsrContainerFactory::class)]
class SecurityAdvisoryPsrContainerFactoryTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test__invoke(): void
    {
        $factory = new SecurityAdvisoryPsrContainerFactory('security_advisory');

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
                    'security_advisory' => [
                        'label'        => 'Security Advisory',
                        'lockFilePath' => 'composer.lock',
                    ],
                ],
            ]);

        $check = $factory($container);

        self::assertSame('Security Advisory', $check->getLabel());
    }
}
