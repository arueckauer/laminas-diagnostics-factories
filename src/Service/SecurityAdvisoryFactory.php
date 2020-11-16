<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Service;

use Laminas\Diagnostics\Check\SecurityAdvisory;
use Psr\Container\ContainerInterface;

final class SecurityAdvisoryFactory
{
    public function __invoke(ContainerInterface $container): SecurityAdvisory
    {
        $params = $container->get('config')['system']['health-check']['params'][SecurityAdvisory::class] ?? [];
        return new SecurityAdvisory(
            $this->getLockFilePath($params)
        );
    }

    private function getLockFilePath(array $params): ?string
    {
        return $params['lockFilePath'] ?? null;
    }
}
