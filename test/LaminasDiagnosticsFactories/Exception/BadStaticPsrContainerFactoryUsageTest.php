<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories\Exception;

use LaminasDiagnosticsFactories\Exception\BadStaticPsrContainerFactoryUsage;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BadStaticPsrContainerFactoryUsage::class)]
class BadStaticPsrContainerFactoryUsageTest extends TestCase
{
    public function test_missingContainerArgument(): void
    {
        self::assertSame(
            'The first argument for Foo must be an instance of Psr\\Container\\ContainerInterface.',
            BadStaticPsrContainerFactoryUsage::missingContainerArgument('Foo')->getMessage()
        );
    }
}
