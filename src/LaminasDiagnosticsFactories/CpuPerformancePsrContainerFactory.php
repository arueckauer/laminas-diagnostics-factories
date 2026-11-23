<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories;

use Laminas\Diagnostics\Check\CpuPerformance;
use Override;
use Psr\Container\ContainerInterface;

final class CpuPerformancePsrContainerFactory extends AbstractPsrContainerFactory
{
    #[Override]
    public function __invoke(ContainerInterface $container): CpuPerformance
    {
        $this->container = $container;
        $params          = $this->getParams();

        $check = new CpuPerformance(
            $this->getMinPerformance($params),
        );
        $check->setLabel($this->getLabel($params));

        return $check;
    }

    private function getMinPerformance(array $params): float
    {
        return $params['minPerformance'] ?? 0.5;
    }
}
