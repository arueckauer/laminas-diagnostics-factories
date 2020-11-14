<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Service;

use Laminas\Diagnostics\Check\DirWritable;
use Psr\Container\ContainerInterface;

class DirWritableFactory
{
    public function __invoke(ContainerInterface $container): DirWritable
    {
        $params = $container->get('config')['system']['health-check']['params'][DirWritable::class] ?? [];
        return new DirWritable(
            $this->getPath($params),
        );
    }

    private function getPath(array $params): ?string
    {
        return $params['path'] ?? null;
    }
}
