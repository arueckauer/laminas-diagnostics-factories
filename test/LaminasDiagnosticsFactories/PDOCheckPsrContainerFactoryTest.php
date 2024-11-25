<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactoriesTest;

use LaminasDiagnosticsFactories\PDOCheckPsrContainerFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

#[CoversClass(PDOCheckPsrContainerFactory::class)]
class PDOCheckPsrContainerFactoryTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test__invoke(): void
    {
        $factory = new PDOCheckPsrContainerFactory('pdo_check');

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
                    'pdo_check' => [
                        'dsn'      => 'mysql:host=localhost;dbname=test',
                        'username' => 'db_user',
                        'password' => 'db_password',
                        'timeout'  => 1,
                    ],
                ],
            ]);

        $check = $factory($container);

        self::assertSame('Check if mysql:host=localhost;dbname=test can be reached', $check->getLabel());
    }
}
