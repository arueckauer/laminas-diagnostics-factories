<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories;

use Laminas\Diagnostics\Check\CheckInterface;
use LaminasDiagnosticsFactories\Exception\BadStaticPsrContainerFactoryUsageException;
use Psr\Container\ContainerInterface;

use function count;
use function current;

abstract class AbstractPsrContainerFactory
{
    public const CONFIG_KEY = 'diagnostics';

    protected ContainerInterface $container;

    public function __construct(
        private string $checkName,
    ) {
    }

    public static function __callStatic(string $name, array $arguments): CheckInterface
    {
        if (
            0 === count($arguments)
            || ! ($container = current($arguments)) instanceof ContainerInterface
        ) {
            throw BadStaticPsrContainerFactoryUsageException::missingContainerArgument($name);
        }

        return (new static($name))->__invoke($container);
    }

    protected function getParams(): array
    {
        $config = [];

        if ($this->container->has('config')) {
            $config = $this->container->get('config');
        }
        return $config[self::CONFIG_KEY][$this->checkName] ?? [];
    }
}
