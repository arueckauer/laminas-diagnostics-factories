<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Service;

use Laminas\Diagnostics\Check\CpuPerformance;
use Psr\Container\ContainerInterface;

class CpuPerformanceFactory
{
    public function __invoke(ContainerInterface $container): CpuPerformance
    {
        $params = $container->get('config')['system']['health-check']['params'][CpuPerformance::class] ?? [];
        return new CpuPerformance(
            $this->getMinPerformance($params),
        );
    }

    private function getMinPerformance(array $params): ?float
    {
        return $params['minPerformance'] ?? null;
    }
}
