<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories;

use Laminas\Diagnostics\Check\CheckInterface;
use LaminasDiagnosticsFactories\Exception\BadStaticPsrContainerFactoryUsage;
use Psr\Container\ContainerInterface;

use function count;
use function current;

abstract class AbstractPsrContainerFactory
{
    public const CONFIG_KEY = 'diagnostics';

    protected ContainerInterface $container;

    public function __construct(
        protected readonly string $checkName,
    ) {
    }

    abstract public function __invoke(ContainerInterface $container): CheckInterface;

    public static function __callStatic(string $name, array $arguments): CheckInterface
    {
        if (
            count($arguments) === 0
            || ! ($container = current($arguments)) instanceof ContainerInterface
        ) {
            throw BadStaticPsrContainerFactoryUsage::missingContainerArgument($name);
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

    protected function getLabel(array $params): string
    {
        return $params['label'] ?? '';
    }
}
