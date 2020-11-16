<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Service;

use Laminas\Diagnostics\Check\DiskFree;
use Psr\Container\ContainerInterface;

final class DiskFreePsrContainerFactory extends AbstractPsrContainerFactory
{
    public function __invoke(ContainerInterface $container): DiskFree
    {
        $this->container = $container;
        $params          = $this->getParams();

        return new DiskFree(
            $this->getSize($params),
            $this->getPath($params)
        );
    }

    private function getSize(array $params): ?string
    {
        return $params['size'] ?? null;
    }

    private function getPath(array $params): ?string
    {
        return $params['path'] ?? null;
    }
}
