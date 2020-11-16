<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Exception;

use Psr\Container\ContainerInterface;
use RuntimeException;

use function sprintf;

final class BadStaticPsrContainerFactoryUsageException extends RuntimeException
{
    public static function missingContainerArgument(string $factoryClassName): self
    {
        return new self(sprintf(
            'The first argument for %s must be an instance of %s.',
            $factoryClassName,
            ContainerInterface::class
        ));
    }
}
