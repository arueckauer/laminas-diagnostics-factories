<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories;

use Laminas\Diagnostics\Check\SecurityAdvisory;
use Psr\Container\ContainerInterface;

final class SecurityAdvisoryPsrContainerFactory extends AbstractPsrContainerFactory
{
    public function __invoke(ContainerInterface $container): SecurityAdvisory
    {
        $this->container = $container;
        $params          = $this->getParams();

        $check = new SecurityAdvisory(
            $this->getLockFilePath($params)
        );
        $check->setLabel($this->getLabel($params));

        return $check;
    }

    private function getLockFilePath(array $params): ?string
    {
        return $params['lockFilePath'] ?? null;
    }
}
