<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories\Exception;

use PHPUnit\Framework\TestCase;

class BadStaticPsrContainerFactoryUsageExceptionTest extends TestCase
{
    /**
     * @covers \LaminasDiagnosticsFactories\Exception\BadStaticPsrContainerFactoryUsageException::missingContainerArgument
     */
    public function test_missingContainerArgument(): void
    {
        self::assertSame(
            'The first argument for Foo must be an instance of Psr\\Container\\ContainerInterface.',
            BadStaticPsrContainerFactoryUsageException::missingContainerArgument('Foo')->getMessage()
        );
    }
}
