<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories;

use Laminas\Diagnostics\Check\DiskFree;
use LaminasDiagnosticsFactories\Exception\InvalidConfiguration;
use Psr\Container\ContainerInterface;

use function sprintf;

final class DiskFreePsrContainerFactory extends AbstractPsrContainerFactory
{
    public function __invoke(ContainerInterface $container): DiskFree
    {
        $this->container = $container;
        $params          = $this->getParams();

        $check = new DiskFree(
            $this->getSize($params),
            $this->getPath($params)
        );
        $check->setLabel($this->getLabel($params));

        return $check;
    }

    private function getSize(array $params): string|int
    {
        if (! isset($params['size'])) {
            throw new InvalidConfiguration(sprintf(
                'Missing "size" key in diagnostics config for %s (%s).',
                $this->checkName,
                self::class,
            ));
        }

        return $params['size'];
    }

    private function getPath(array $params): string
    {
        if (! isset($params['path'])) {
            throw new InvalidConfiguration(sprintf(
                'Missing "path" key in diagnostics config for %s (%s).',
                $this->checkName,
                self::class,
            ));
        }

        return $params['path'];
    }
}
