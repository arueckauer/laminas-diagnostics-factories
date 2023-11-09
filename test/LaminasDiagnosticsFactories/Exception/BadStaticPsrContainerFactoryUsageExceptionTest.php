<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories\Exception;

use LaminasDiagnosticsFactories\Exception\BadStaticPsrContainerFactoryUsageException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BadStaticPsrContainerFactoryUsageException::class)]
class BadStaticPsrContainerFactoryUsageExceptionTest extends TestCase
{
    public function test_missingContainerArgument(): void
    {
        self::assertSame(
            'The first argument for Foo must be an instance of Psr\\Container\\ContainerInterface.',
            BadStaticPsrContainerFactoryUsageException::missingContainerArgument('Foo')->getMessage()
        );
    }
}
