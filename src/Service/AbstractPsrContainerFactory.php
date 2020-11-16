<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Service;

use arueckauer\LaminasDiagnosticsFactories\Exception\BadStaticPsrContainerFactoryUsageException;
use Laminas\Diagnostics\Check\CheckInterface;
use Psr\Container\ContainerInterface;

use function count;
use function current;

abstract class AbstractPsrContainerFactory
{
    public const CONFIG_KEY = 'diagnostics';

    private string $checkName;

    protected ContainerInterface $container;

    public function __construct(string $checkName)
    {
        $this->checkName = $checkName;
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
