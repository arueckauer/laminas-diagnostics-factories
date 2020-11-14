<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Service;

use Laminas\Diagnostics\Check\DiskFree;
use Psr\Container\ContainerInterface;

class DiskFreeFactory
{
    public function __invoke(ContainerInterface $container): DiskFree
    {
        $params = $container->get('config')['system']['health-check']['params'][DiskFree::class] ?? [];
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
