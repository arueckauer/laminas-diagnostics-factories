<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Service;

use Laminas\Diagnostics\Check\CpuPerformance;
use Psr\Container\ContainerInterface;

final class CpuPerformancePsrContainerFactory extends AbstractPsrContainerFactory
{
    public function __invoke(ContainerInterface $container): CpuPerformance
    {
        $this->container = $container;
        $params          = $this->getParams();

        return new CpuPerformance(
            $this->getMinPerformance($params),
        );
    }

    private function getMinPerformance(array $params): ?float
    {
        return $params['minPerformance'] ?? null;
    }
}
